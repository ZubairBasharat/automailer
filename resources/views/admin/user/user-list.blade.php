@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>Users List</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.users.add') }}" role="button">
                    <i class='cil-plus me-2'></i>Add User
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Name</th>
                        <th scope="col" class="align-middle">Email</th>
                        <th scope="col" class="align-middle">Telephone</th>
                        <th scope="col" class="align-middle">Insurer</th>
                        <th scope="col" class="align-middle">Status</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="align-middle">{{$user->nombre}} {{$user->apellido}}</td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->telefono}}</td>
                        <td class="align-middle">{{$user->asegurador ? $user->asegurador : '---'}}</td>
                        <td class="align-middle">
                            <div class="form-check form-switch">
                                <input {!! $user->estado == "activo" ? 'checked' : '' !!} class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.users.add', ['type' => 'edit', 'user' => $user->id]) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                 <a class="text-decoration-none text-danger fs-5" href="{{ route('admin.users.delete', ['user' => $user->id]) }}" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
                                    <i class="cil-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <x-admin.not-found-tr :cols="6" :items="$users" />
                </tbody>
            </table>
        </div>
        <div class='card-footer border-top-0'>
            <x-admin.pagination-summary :items="$users" />
        </div>
    </div>
@endsection