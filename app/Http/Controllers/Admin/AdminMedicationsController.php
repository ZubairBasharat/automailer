<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AdminMedications;
use App\Http\Requests\AdminMedicationRequest;
use App\Models\Admin\Medication;
use App\Models\Admin\MedicationDosage;

class AdminMedicationsController extends Controller
{
    public function index() {
        $medications = AdminMedications::collection(Medication::orderBy('id', 'DESC')->paginate(10));
        return view('admin.medications.medications-list', compact('medications'));
    }

    public function add(Request $request) {
        $med = null;
        if($request->query('type') == 'edit' && $request->query('medication')) {
            $med = Medication::where('id', $request->query('medication'))->first();
            if(!$med) {
                return redirect()->route('admin.users')->with('error', 'User not found');
            }
        }
        return view('admin.medications.add-medication', compact('med'));
    }

    public function store(AdminMedicationRequest $request, Medication $medication) {
        $medication->create($request->all());
        return redirect()->route('admin.medications')->with('message', 'Medication has been added successfully');
    }

    public function update(AdminMedicationRequest $request, Medication $medication) {
        if(!$medication) {
            return redirect()->route('admin.medications')->with('message', 'Medication not found');
        }
        $medication->update($request->all());
        return redirect()->route('admin.medications')->with('message', 'Medication has been updated successfully');
    }

    public function destroy(Request $request, Medication $medication) {
        $dos = $medication->with('dosage')->where('id', $medication->id)->first();
        if ($dos && $dos->dosage) {
            foreach ($dos->dosage as $dosage) {
                $dosage->delete();
            }
        }
        $medication->delete();
        return redirect()->route('admin.medications')->with('message', 'Medication has been deleted successfully');
    }

    public function showDosage(Request $request) {
        $dosage = AdminMedications::collection(
            MedicationDosage::where('idmedicamento', $request->idmedicamento)->orderBy('id', 'DESC')->paginate(10)
        );
        $medication = $request->idmedicamento;
        return view('admin.medications.dosage.dosage-list', compact('dosage', 'medication'));
    }

    public function addDosage(Request $request) {
        $dos = null;
        $medication = $request->idmedicamento;
        if($request->query('type') == 'edit' && $request->query('dosage')) {
            $dos = MedicationDosage::where('id', $request->query('dosage'))->first();
            if(!$dos) {
                return redirect()->route('admin.medications.dosage', 
                    ['idmedicamento' => $medication])->with('error', 'Medication dosage not found'
                );
            }
        }
        return view('admin.medications.dosage.add-dosage', compact('dos', 'medication'));
    }

    public function storeDosage(AdminMedicationRequest $request, MedicationDosage $dosage) {
        if($request->idmedicamento) {
            $dosage->create($request->all());
            $med = Medication::where('id',$request->idmedicamento)->first();
            if(!$med) {
                return redirect()->back()->with('error', 'Medication not found');
            }
            else {
                return redirect()->route('admin.medications.dosage', 
                    ['idmedicamento' => $request->idmedicamento])->with('message', 'Medication dosage has been added successfully'
                );
            }
        }
    }

    public function updateDosage(AdminMedicationRequest $request, MedicationDosage $dosage) {
        if(!$dosage) {
            return redirect()->back()->with('error', 'Medication dosage not found');
        }
        $dosage->update($request->all());
        return redirect()->route('admin.medications.dosage', 
            ['idmedicamento' => $dosage->idmedicamento])->with('message', 'Medication dosage has been added successfully'
        );
    }

    public function dosageDestroy(Request $request, MedicationDosage $dosage) {
        $dosage->delete();
        return redirect()->back()->with('message', 'Medication Dosage has been deleted successfully');
    }
}
