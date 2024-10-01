@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>Administrators List</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.administrators.add') }}" role="button">
                    <i class='cil-plus me-2'></i>Add Admin
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Name</th>
                        <th scope="col" class="align-middle">Surname</th>
                        <th scope="col" class="align-middle">Username</th>
                        <th scope="col" class="align-middle">Email</th>
                        <th scope="col" class="align-middle">Date</th>
                        <th scope="col" class="align-middle">Status</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td class="align-middle">{{$admin->nombres}}</td>
                        <td class="align-middle">
                           {{$admin->apellidos}}
                        </td>
                        <td class="align-middle">
                           {{$admin->usuario}}
                        </td>
                        <td class="align-middle">{{$admin->email}}</td>
                        <td class="align-middle">{{$admin->registrado}}</td>
                        <td class="align-middle">
                            <div class="form-check form-switch">
                                <input {!! $admin->estadoadm == "SI" ? 'checked' : '' !!} class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.administrators.add', ['type' => 'edit', 'admin'=> $admin->idadministrador]) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                 <a class="text-decoration-none text-danger fs-5" href="{{ route('admin.administrators.delete', ['idadministrador' => $admin->idadministrador]) }}" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
                                    <i class="cil-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <x-admin.not-found-tr :cols="7" :items="$admins" />
                </tbody>
            </table>
        </div>
        <div class='card-footer border-top-0'>
            <x-admin.pagination-summary :items="$admins" />
            <!-- <ul class="pagination mb-0">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul> -->
        </div>
    </div>
@endsection