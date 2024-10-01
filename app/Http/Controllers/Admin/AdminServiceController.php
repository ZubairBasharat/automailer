<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\sectionResource;
use App\Http\Requests\ServiceRequest;
use App\Models\Section;
use App\Library\ImageService;

class AdminServiceController extends Controller
{
    public function index() {
        $services = sectionResource::collection(Section::where('tipo', 3)->orderBy('orden', 'ASC')->paginate(10));
        return view('admin.service.service-list', compact('services'));
    }

    public function add(Request $request) {
        $ser = null;
        if($request->query('type') == 'edit' && $request->query('service')) {
            $ser = Section::where('idseccion', $request->query('service'))->first();
            if(!$ser) {
                return redirect()->route('admin.services')->with('error', 'Service not found');
            }
        }
        return view('admin.service.add-service', compact('ser'));
    }

    public function store(ServiceRequest $request, Section $service) {
        $data = $request->all();
        if($request->hasFile('foto')) {
            $filename = ImageService::uploadProfileImage($request->file('foto'),'services');
            $data['foto'] = $filename;
        }
        if(!$data['orden']) {
            $data['orden'] = 1;
        }
        $data['tipo'] = 3;
        $service->create($data);
        return redirect()->route('admin.services')->with('message', 'Services has been added successfully');
    }

    public function update(ServiceRequest $request, Section $service) {
        $data = $request->all();
        if($request->hasFile('foto')) {
            $filename = ImageService::uploadProfileImage($request->file('foto'),'services', 'services/'.$service->foto);
            $data['foto'] = $filename;
        }
        $service->update($data);
        return redirect()->route('admin.services')->with('message', 'Services has been updated successfully');
    }

    public function destroy(Request $request, Section $service) {
        $service->delete();
        return redirect()->back()->with('message', 'Service has been deleted successfully');
    }
}
