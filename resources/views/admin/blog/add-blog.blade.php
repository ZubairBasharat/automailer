@extends('admin.layouts.default')
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/libraries/rich-editor/richtexteditor/rte_theme_default.css')}}" />
@endpush
@section('content')
    @php
        $route_condition = request()->get('blog') && request()->get('type') == 'edit';
        $route = $route_condition
            ? route('admin.blogs.update', ['blog' => request()->get('blog')])
            : route('admin.blogs.store')
    @endphp
    <form class="card mb-4 overflow-hidden add-data-form" method="POST" action="{{$route}}" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>{{$route_condition? 'Edit' : 'Add'}} Blog</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Title<sup class="text-danger">*<sup></label>
                    <input type="text" name="titulo" value="{{old('titulo', $blog?->titulo)}}" class='form-control w-100' placeholder="Enter title" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Slug url<sup class="text-danger">*<sup></label>
                    <input type="text" name="seourl" value="{{old('seourl', $blog?->seourl)}}" class='form-control w-100' placeholder="Enter url" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Picture</label>
                    <input type="file" name="archivo" class='form-control w-100' accept="image/*" placeholder="Enter order" />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Status<sup class="text-danger">*<sup></label>
                    <select class="form-select" value="{{old('estado', $blog?->estado)}}" required name="estado">
                        <option value="" disabled hidden>Select Status</option>
                        <option value="SI">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label class="mb-2">Meta Title</label>
                    <input type="text" name="meta_titulo" value="{{old('estado', $blog?->meta_titulo)}}" class='form-control w-100' placeholder="Meta title" />
                </div>
                <div class="col-12 mb-3">
                    <label class="mb-2">Meta Description</label>
                    <textarea name="meta_descripcion" class='form-control w-100' placeholder="Meta description">{{old('meta_descripcion', $blog?->meta_descripcion)}}</textarea>
                </div>
                <div class="col-12 mb-3">
                    <label class="mb-2">Summary<sup class="text-danger">*<sup></label>
                    <textarea class='form-control w-100' placeholder="Summary" name="resumen" required>{{old('resumen', $blog?->resumen)}}</textarea>
                </div>
                <div class="col-12">
                    <label class="mb-2">Details<sup class="text-danger">*<sup></label>
                    <div id="div_editor1">
                        {!! old('detalle', $blog?->detalle) !!}
                    </div>
                    <input type="hidden" name="detalle" value="{{old('detalle', $blog?->detalle)}}" id="details" />
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.blogs') }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('assets/libraries/rich-editor/richtexteditor/rte.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/libraries/rich-editor/richtexteditor/plugins/all_plugins.js')}}"></script>
    <script>
        var editor1cfg = {
            toolbar_mytoolbar: "{bold,italic}|{fontname,fontsize}|{forecolor,backcolor}|removeformat"
            + "#{undo,redo,fullscreenenter,fullscreenexit,togglemore}",
            toolbar: "mytoolbar",
            showFloatParagraph: false,
            showPlusButton: false,
            showTagList: false,
            editorResizeMode: "height"
        }
        var editor1 = new RichTextEditor("#div_editor1", editor1cfg);
        editor1.attachEvent("change", function () {
            var textCount = editor1.getHTMLCode().trim();
            const parser = new DOMParser();
            const doc = parser.parseFromString(textCount, "text/html");
            document.getElementById('details').value = doc.body.textContent ? textCount : '';
        });
    </script>
@endpush