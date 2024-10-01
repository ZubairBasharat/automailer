@extends('admin.layouts.default')
@section('content')
    @php
        $route_condition = request()->get('user') && request()->get('type') == 'edit';
        $route = $route_condition
        ? route('admin.users.update', ['user' => request()->get('user')])
        : route('admin.users.store');
    @endphp
    <form class="card mb-4 overflow-hidden add-data-form" method="POST" action="{{ $route }}">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>{{$route_condition? 'Edit' : 'Add'}} User</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">First Name<sup class="text-danger">*<sup></label>
                    <input type="text" name="nombre" value="{{old('nombre', $user?->nombre)}}" class='form-control w-100' placeholder="Enter first name" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Last name<sup class="text-danger">*<sup></label>
                    <input type="text" name="apellido" value="{{old('apellidos', $user?->apellido)}}" class='form-control w-100' placeholder="Enter last name" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Email<sup class="text-danger">*<sup></label>
                    <input type="email" name="email" value="{{old('email', $user?->email)}}" class='form-control w-100' placeholder="Enter email" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Telephone<sup class="text-danger">*<sup></label>
                    <input type="number" name="telefono" value="{{old('telefono', $user?->telefono)}}" class='form-control w-100' placeholder="Enter telephone" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Address</label>
                    <input type="text" name="direccion" value="{{old('direccion', $user?->direccion)}}" class='form-control w-100' placeholder="Enter address" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Commune</label>
                    <input type="text" name="comuna" value="{{old('comuna', $user?->comuna)}}" class='form-control w-100' placeholder="Enter commune" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Insurer</label>
                    <input type="text" name="asegurador" value="{{old('asegurador', $user?->asegurador)}}" class='form-control w-100' placeholder="Enter insurer" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Status<sup class="text-danger">*<sup></label>
                    <select class="form-select" required name="estado" value="{{old('estado', $user?->estado)}}">
                        <option value="" disabled hidden>Select Status</option>
                        <option value="activo">Active</option>
                        <option value="inactivo">Inactive</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Password @if(!$route_condition)<sup class="text-danger">*<sup>@endif</label>
                    <input type="password" name="password" class='form-control w-100' placeholder="Enter password" {!! !$route_condition ? 'required' : '' !!} />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Confirm password @if(!$route_condition)<sup class="text-danger">*<sup>@endif</label>
                    <input type="password" name="password_confirmation" class='form-control w-100' placeholder="Enter confirm password" {!! !$route_condition ? 'required' : '' !!} />
                </div>
                <div class="col-lg-6">
                    <label class="mb-2">IP Address<sup class="text-danger">*<sup></label>
                    <input type="text" name="rut" value="{{$ip}}" readonly class='form-control w-100' placeholder="Enter IP Address" required />
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.users') }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection