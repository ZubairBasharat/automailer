<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\SeoAdministrator;
use App\Models\User;
use App\Models\Admin\SeoText;
use Illuminate\Http\Request;
use App\Http\Requests\AdministratorStoreRequest;
use App\Http\Requests\AdministratorUpdateRequest;
use App\Http\Requests\AdminTagsRequest;
use App\Http\Resources\AdministratorResource;
class AdminController extends Controller
{
    public function dashboard() {
        $data = (object) [
            'admins' => SeoAdministrator::count(),
            'users' => User::count()
        ];
        return view('admin.index', compact('data'));
    }

    public function index() {
        $admins = AdministratorResource::collection(SeoAdministrator::orderBy('idadministrador', 'DESC')->paginate(10));
        return view('admin.administrators.administrators-list', compact('admins'));
    }

    public function addAdminPage(Request $request) {
        $admin = false;
        if($request->query('type') == 'edit' && $request->query('admin')) {
            $admin = SeoAdministrator::where('idadministrador', $request->query('admin'))->first();
            if(!$admin) {
                return redirect()->route('admin.administrators')->with('error', 'Admin not found');
            }
        }
        return view('admin.administrators.add-administrator', compact('admin'));
    }

    public function store(AdministratorStoreRequest $request, SeoAdministrator $admin) {
       $data = $request->toArray();
       $admin->create($data);
       return redirect()->route('admin.administrators')->with('message', 'Admin has been added successfully');
    }

    public function update(AdministratorUpdateRequest $request, SeoAdministrator $admin) {
        $data = $request->except(['_token', 'password_confirmation']);
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $admin->update($data);
        return redirect()->route('admin.administrators')->with('message', 'Admin has been updated successfully');
    }

    public function destroy(Request $request, SeoAdministrator $idadministrador) {
        $idadministrador->delete();
        return redirect()->route('admin.administrators')->with('message', 'Admin has been deleted successfully');
    }

    public function showTags(Request $request) {
        $tags = SeoText::where('tipo', 3)->select('idtexto', 'titulo', 'seccion')->get();
        return view('admin.tags.tags-list', compact('tags'));
    }

    public function editTags(Request $request, SeoText $tag) {
        if($tag) {
            $tag = (object) $tag->only('idtexto', 'titulo', 'meta_titulo', 'descripcion');
            return view('admin.tags.add-tags', compact('tag'));
        }
        else {
            return redirect()->route('admin.tags')->with('error', 'Tag not found');
        }
    }

    public function updateTag(AdminTagsRequest $request, SeoText $tag) {
        $tag->update($request->only('titulo', 'meta_titulo', 'descripcion'));
        return redirect()->route('admin.tags')->with('message', 'Tag has been added successfully');
    }
}
