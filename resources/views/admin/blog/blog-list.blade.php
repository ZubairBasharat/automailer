@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>Blogs List</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.blogs.add') }}" role="button">
                    <i class='cil-plus me-2'></i>Add Blog
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Title</th>
                        <th scope="col" class="align-middle">Blog Image</th>
                        <th scope="col" class="align-middle">Date</th>
                        <th scope="col" class="align-middle">Status</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td class="align-middle">{{$blog->titulo}}</td>
                        <td class="align-middle">
                            <a class="text-decoration-none" target="_blank" href="{{ asset('/storage/blogs/' . $blog->archivo) }}">
                                <img alt="futuro-blog" src="{{ asset('/storage/blogs/' . $blog->archivo) }}" alt="img" width="40px" height="40px" class="rounded-circle border" />
                            </a>
                        </td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($blog->fecha_publicacion)->format('Y-m-d') }}</td>
                        <td class="align-middle">
                            <div class="form-check form-switch">
                                <input {!! $blog->estado == "SI" ? 'checked' : '' !!} class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.blogs.add', ['type' => 'edit', 'blog' => $blog->id]) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                 <a class="text-decoration-none text-danger fs-5" href="{{route('admin.blogs.delete', ['blog' => $blog->id])}}" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
                                    <i class="cil-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <x-admin.not-found-tr :cols="5" :items="$blogs" />
                </tbody>
            </table>
        </div>
        <div class='card-footer border-top-0'>
            <x-admin.pagination-summary :items="$blogs" />
        </div>
    </div>
@endsection