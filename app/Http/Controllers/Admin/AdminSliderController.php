<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SeoBanner;
use Illuminate\Http\Request;
use App\Http\Resources\AdminHomeResource;
use App\Http\Requests\AdminHomeRequest;
use App\Library\ImageService;

class AdminSliderController extends Controller
{
    public function index() {
        $slides = AdminHomeResource::collection(SeoBanner::where('tipo',1)->orderBy('idbanner','desc')->paginate(10));
        return view('admin.home.slider-list', compact('slides'));
    }
    
    public function store(AdminHomeRequest $request, SeoBanner $banner) {
        $data = $request->toArray();
        if($request->hasFile('foto')) {
            $filename = ImageService::uploadProfileImage($request->file('foto'),'home');
            $data['foto'] = $filename;
        }
        $data['tipo'] = 1;
        $banner->create($data);
        return redirect()->route('admin.home.slider');
    }

    public function add() {
        return view('admin.home.add-slider');
    }
}
