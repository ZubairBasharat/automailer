@extends('admin.layouts.default')
@section('content')
    <div class="card mb-4 overflow-hidden">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>Slides List</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.home.add.slider') }}" role="button">
                    <i class='cil-plus me-2'></i>Add Slide
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Title</th>
                        <th scope="col" class="align-middle">Slide Image</th>
                        <th scope="col" class="align-middle">Status</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                    <tr>
                        <td class="align-middle">{{ $slide->titulo }}</td>
                        <td class="align-middle">
                            <a class="text-decoration-none" target="_blank" href="{{ asset('/storage/home/' . $slide->foto) }}">
                                <img src="{{ asset('/storage/home/' . $slide->foto) }}" alt="futuor-slide" width="40px" height="40px" class="rounded-circle border" />
                            </a>
                        </td>
                        <td class="align-middle">
                            <div class="form-check form-switch">
                                <input checked class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.home.add.slider', ['type' => 'edit']) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                 <a class="text-decoration-none text-danger fs-5" href="#" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
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
            <x-admin.pagination-summary :items="$slides" />
        </div>
    </div>
@endsection