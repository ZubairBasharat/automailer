@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header py-3 justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>Google Tags</h5>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Title</th>
                        <th scope="col" class="align-middle">Section</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td class="align-middle">{{$tag->titulo}}</td>
                        <td class="align-middle">
                           {{$tag->seccion}}
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.tags.edit', ['tag' => $tag->idtexto]) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <x-admin.not-found-tr cols="3" :items="$tags" />
                </tbody>
            </table>
        </div>
    </div>
@endsection