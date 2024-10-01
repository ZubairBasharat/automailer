<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\RegisterUpdateRequest;
class AdminUserController extends Controller
{
    public function index() {
        $users = UsersResource::collection(User::orderBy('id', 'DESC')->paginate(10));
        return view('admin.user.user-list', compact('users'));
    }

    public function add(Request $request) {
        $user = null;
        $ip = $request->ip();
        if($request->query('type') == 'edit' && $request->query('user')) {
            $user = User::where('id', $request->query('user'))->first();
            if(!$user) {
                return redirect()->route('admin.users')->with('error', 'User not found');
            }
            else {
                $ip = $user->rut;
            }
        }
        return view('admin.user.add-user', compact('ip','user'));
    }
    
    public function store(RegisterUserRequest $request, User $user) {
        $data = $request->toArray();
        $data['rut'] = $request->ip();
        $user->create($data);
        return redirect()->route('admin.users')->with('message', 'User has been added successfully');
    }

    public function update(RegisterUpdateRequest $request, User $user) {
        $data = $request->except(['_token', 'password_confirmation']);
        $data['ip'] = $request->ip();
        $user->update($data);
        return redirect()->route('admin.users')->with('message', 'User has been updated successfully');
    }
    
    public function destroy(Request $request, User $user) {
        $user->delete();
        return redirect()->route('admin.users')->with('message', 'User has been deleted successfully');
    }
}
