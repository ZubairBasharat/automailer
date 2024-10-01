@extends('admin.layouts.default')
@section('content')
    @php
        $route_condition = request()->get('admin') && request()->get('type') == 'edit';
        $route = $route_condition
            ? route('admin.administrators.update', ['idadministrador' => request()->get('admin')])
            : route('admin.administrators.store');
    @endphp
    <form class="card mb-4 overflow-hidden add-data-form" method="POST" 
        action="{{$route}}"
    >
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>{{$route_condition? 'Edit' : 'Add'}} Administrators</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Name<sup class="text-danger">*<sup></label>
                    <input type="text" name="nombres" value="{{old('nombres', $admin? $admin->nombres : '')}}" class='form-control w-100' placeholder="Enter name" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Surname<sup class="text-danger">*<sup></label>
                    <input type="text" value="{{old('apellidos', $admin? $admin->apellidos : '')}}" name="apellidos" class='form-control w-100' placeholder="Enter surname" required />
                </div>
                 <div class="col-lg-6 mb-3">
                    <label class="mb-2">Username<sup class="text-danger">*<sup></label>
                    <input type="text" name="usuario" value="{{old('usuario', $admin? $admin->usuario : '')}}" class='form-control w-100' placeholder="Enter name" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Email<sup class="text-danger">*<sup></label>
                    <input type="email" value="{{old('email', $admin? $admin->email : '')}}" name="email" class='form-control w-100' placeholder="Enter email" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Password<sup class="text-danger">*<sup></label>
                    <input name="password" type="password" class='form-control w-100' placeholder="Enter password" {!! !$route_condition ? 'required' : '' !!} />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Confirm password<sup class="text-danger">*<sup></label>
                    <input type="password" name="password_confirmation" class='form-control w-100' placeholder="Enter confirm password" {!! !$route_condition ? 'required' : '' !!} />
                </div>
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <label class="mb-2">Status<sup class="text-danger">*<sup></label>
                    <select class="form-select" value="{{old('estadoadm', $admin? $admin->estadoadm : '')}}" name="estadoadm" required>
                        <option value=""  disabled hidden>Select Status</option>
                        <option value="SI">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.administrators') }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection