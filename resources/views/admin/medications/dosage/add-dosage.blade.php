@extends('admin.layouts.default')
@section('content')
    @php
        $route_condition = request()->get('dosage') && request()->get('type') == 'edit';
        $route = $route_condition
            ? route('admin.medications.dosage.update', ['dosage' => request()->get('dosage')])
            : route('admin.medications.dosage.store', ['idmedicamento' => $medication])
    @endphp
    <form class="card mb-4 overflow-hidden add-data-form" method="POST" action="{{$route}}">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>{{$route_condition? 'Edit' : 'Add'}} Dosage</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Title<sup class="text-danger">*<sup></label>
                    <input type="text" name="tipo" value="{{old('tipo', $dos?->tipo)}}" class='form-control w-100' placeholder="Title" required />
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Status<sup class="text-danger">*<sup></label>
                    <select class="form-select" name="estado" value="{{old('estado', $dos?->estado)}}" required>
                        <option value="" disabled hidden>Select Status</option>
                        <option value="SI">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <input type="hidden" name="idmedicamento" value="{{$medication}}" />
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.medications.dosage', ['idmedicamento' => $medication]) }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection