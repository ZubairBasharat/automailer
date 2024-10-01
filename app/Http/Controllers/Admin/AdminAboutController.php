<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\sectionResource;
use App\Http\Requests\AdminAboutRequest;
use App\Library\ImageService;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function index() {
        $about = sectionResource::collection(Section::where('tipo', 6)->orderBy('orden', 'ASC')->paginate(10));
        return view('admin.about.about-list', compact('about'));
    }
    
    public function add(Request $request) {
        $about = null;
        if($request->query('type') == 'edit' && $request->query('item')) {
            $about = Section::where('idseccion', $request->query('item'))->first();
            if(!$about) {
                return redirect()->route('admin.about')->with('error', 'About item not found');
            }
        }
        return view('admin.about.add-about', compact('about'));
    }

    public function store(AdminAboutRequest $request, Section $item) {
        $data = $request->all();
        if($request->hasFile('foto')) {
            $filename = ImageService::uploadProfileImage($request->file('foto'),'about');
            $data['foto'] = $filename;
        }
        if(!$data['orden']) {
            $data['orden'] = 1;
        }
        $data['tipo'] = 6;
        $item->create($data);
        return redirect()->route('admin.about')->with('message', 'About item has been added successfully');
    }

    public function update(AdminAboutRequest $request, Section $item) {
        $data = $request->all();
        if($request->hasFile('foto')) {
            $filename = ImageService::uploadProfileImage($request->file('foto'),'about', 'about/'.$item->foto);
            $data['foto'] = $filename;
        }
        $item->update($data);
        return redirect()->route('admin.about')->with('message', 'About item has been updated successfully');
    }

    public function destroy(Request $request, Section $item) {
        $item->delete();
        return redirect()->route('admin.about')->with('message', 'About item has been deleted successfully');
    }
}
