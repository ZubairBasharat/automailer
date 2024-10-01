@extends('admin.layouts.default')
@section('content')
    <form class="card mb-4 overflow-hidden add-data-form" action="{{route('admin.home.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>Add Slide</h5>
        </div>
        <div class='card-body py-4'>
            @if($errors->any())
                <div class="alert-danger alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Title<sup class="text-danger">*<sup></label>
                    <input type="text" name="titulo" class='form-control w-100' placeholder="Enter title" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Order<sup class="text-danger">*<sup></label>
                    <input type="number" class='form-control w-100' placeholder="Enter order" required name="orden" />
                </div>
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <label class="mb-2">Status<sup class="text-danger">*<sup></label>
                    <select class="form-select" required name="estado">
                        <option selected value="" disabled hidden>Select Status</option>
                        <option value="SI">Active</option>
                        <option value="NO">Inactive</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Picture<sup class="text-danger">*<sup></label>
                    <input type="file" name="foto" class='form-control w-100' accept="image/*" placeholder="Enter order" required />
                </div>
                <div class="col-12">
                    <label class="mb-2">Summary<sup class="text-danger">*<sup></label>
                    <textarea class='form-control w-100' placeholder="Summary"></textarea>
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.home.slider') }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection