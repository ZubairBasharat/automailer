@extends('admin.layouts.default')
@section('content')
    <form class="card mb-4 overflow-hidden add-data-form" method="POST" action="{{ route('admin.tags.update', ['tag'=>  $tag->idtexto]) }}">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>Edit Tag</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Title<sup class="text-danger">*<sup></label>
                    <input type="text" value="{{ old('titulo', $tag->titulo) }}" name="titulo" class='form-control w-100' placeholder="Title" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Meta Title<sup class="text-danger">*<sup></label>
                    <input type="text" value="{{ old('meta_titulo', $tag->meta_titulo) }}" name="meta_titulo" class='form-control w-100' placeholder="Meta title" required />
                </div>
                <div class="col-12">
                    <label class="mb-2">Meta Description<sup class="text-danger">*<sup></label>
                    <textarea class='form-control w-100' name="descripcion" placeholder="Meta description">{{ old('descripcion', $tag->descripcion) }}</textarea>
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.tags') }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection