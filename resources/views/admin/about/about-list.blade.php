@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>About List</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.about.add') }}" role="button">
                    <i class='cil-plus me-2'></i>Add About
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Order</th>
                        <th scope="col" class="align-middle">Title</th>
                        <th scope="col" class="align-middle">Image</th>
                        <th scope="col" class="align-middle">Status</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($about as $ab)
                    <tr>
                        <td class="align-middle">{{$ab->orden}}</td>
                        <td class="align-middle">{{$ab->titulo}}</td>
                        <td class="align-middle">
                            <a class="text-decoration-none" target="_blank" href="{{ asset('/storage/about/' . $ab->foto) }}">
                                <img src="{{ asset('/storage/about/' . $ab->foto) }}" alt="{{$ab->titulo}}" width="40px" height="40px" class="rounded-circle border" />
                            </a>
                        </td>
                        <td class="align-middle">
                            <div class="form-check form-switch">
                                <input {!! $ab->estado == "SI" ? 'checked' : '' !!} class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.about.add', ['type' => 'edit', 'item' => $ab->idseccion]) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                 <a class="text-decoration-none text-danger fs-5" href="{{ route('admin.about.delete', ['item' => $ab->idseccion]) }}" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
                                    <i class="cil-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class='card-footer border-top-0'>
            <x-admin.pagination-summary :items="$about" />
        </div>
    </div>
@endsection