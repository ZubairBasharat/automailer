<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\MedicationDosage;
use App\Models\Reservation;
use App\Models\Admin\Prescription;
use App\Models\Admin\PrescriptionDetail;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\PrescriptionResource;
use App\Http\Requests\AdminReservationRequest;
use Illuminate\Http\Request;
use PDF;

class AdminReservation extends Controller
{
    public function index() {
        $reservations = ReservationResource::collection(Reservation::with('user')->orderBy('id', 'DESC')->paginate(10));
        return view('admin.reservation.reservation-list', ['reservations' => $reservations]);
    }

    public function prescription(Request $request, $prescription) {
        $prescriptions = PrescriptionResource::collection(Prescription::where('idreserva', $prescription)->orderBy('id', 'DESC')->paginate(10));
        return view('admin.reservation.prescription.prescription-list', ['prescriptions' => $prescriptions, 'presId' =>  $prescription]);
    }
    
    public function addPrescription(Request $request, $pres) {
        $data = null;
        if($request->query('type') == 'edit') {
            $prescription = Prescription::where('id', $pres)->with('user')->first();
            $detail = PrescriptionDetail::where('idreceta', $pres)->with('medicationDosage','medication')->get();
            $data=(object) [
                'prescription' => $prescription,
                'detail' => (object)$detail
            ];
        }
        else {
            $data = (object) [
                'prescription' => Reservation::where('id', $pres)->with('user')->first(),
                'detail' => []
            ];
        }
        $medicines = MedicationDosage::get();
        return view('admin.reservation.prescription.add-prescription', ['data' => $data, 'medicines' => $medicines]);
    }

    public function store(AdminReservationRequest $request, Reservation $pres) {
        $presData = $request->only(['idusuario', 'anotaciones']);
        $presData['idreserva'] = $pres->id;
        $prescription = Prescription::create($presData);
        if($request->idtipo) {
            $count = count($request->idtipo);
            for ($i = 0; $i < $count; $i++) {
                PrescriptionDetail::create([
                    'idtipo' => $request['idtipo'][$i],
                    'idmedicamento' => $request['idmedicamento'][$i],
                    'dosis' => $request['dosis'][$i],
                    'idreceta' => $prescription->id
                ]);
            }
        }
        return redirect()->route('admin.prescriptions', ['pres' => $pres->id])->with('message', 'Prescription has been added successfully');
    }

    public function update(AdminReservationRequest $request, Prescription $pres) {
        $pres->update([
            'anotaciones' => $request->anotaciones
        ]);
        if(count($request->old_detail) > 0) {
            PrescriptionDetail::whereIn('id', $request->old_detail)->delete();
        }
        if($request->idtipo) {
            $count = count($request->idtipo);
            for ($i = 0; $i < $count; $i++) {
                PrescriptionDetail::create([
                    'idtipo' => $request['idtipo'][$i],
                    'idmedicamento' => $request['idmedicamento'][$i],
                    'dosis' => $request['dosis'][$i],
                    'idreceta' => $pres->id
                ]);
            }
        }
        return redirect()->route('admin.prescriptions', ['pres' => $pres->idreserva])->with('message', 'Prescription has been updated successfully');
    }

    public function deletePrescription(Request $request, Prescription $pres) {
        PrescriptionDetail::where('idreceta', $pres->id)->delete();
        $pres->delete();
        return redirect()->back()->with('message', 'Prescription has been deleted successfully');
    }

    public function prescriptionPdf(Request $request, $pres) {
        $prescription = Prescription::where('id', $pres)->with('user')->first();
        $detail = PrescriptionDetail::where('idreceta', $pres)->with('medicationDosage','medication')->get();
        $pdf = PDF::loadView('admin.templates.reservation', compact('detail', 'prescription'));
        return $pdf->stream('prescription_' . $pres . '.pdf');
    }

    public function destroy(Request $request, Reservation $res) {
        $pres = Prescription::where('idreserva', $res->id)->get();
        if($pres) { 
            $presCount = count($pres);
            for ($i = 0; $i < $presCount; $i++) {  
                $detail = PrescriptionDetail::where('idreceta', $pres[$i]['id'])->delete();
                $pres[$i]->delete();
            }
        }
        $res->delete();
        return redirect()->route('admin.reservations')->with('message', 'Reservation has been deleted successfully');
    }
}
