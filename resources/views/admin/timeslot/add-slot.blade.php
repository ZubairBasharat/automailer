@extends('admin.layouts.default')
@section('content')
    @php
        $route_condition = request()->get('slot') && request()->get('type') == 'edit';
        $route = $route_condition
            ? route('admin.slots.update', ['slot' => request()->get('slot')])
            : route('admin.slots.store')
    @endphp
    <form class="card mb-4 overflow-hidden add-data-form" action="{{$route}}" method="POST">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>{{$route_condition? 'Edit' : 'Add'}} Time Slot</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Day<sup class="text-danger">*</sup></label>
                    <select class="form-select" required name="day">
                        <option disabled value="" hidden>Select Day</option>
                        @foreach($days as $d)
                            <option value="{{$d}}" {{ (old('day', $slot?->day) == $d || $d == $day) ? 'selected' : '' }}>
                                {{ ucfirst($d) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Time<sup class="text-danger">*<sup></label>
                    <input type="text" name="texto" value="{{ old('texto', $slot?->texto) }}" name="titulo" class='form-control w-100' placeholder="Time" required />
                </div>
                <div class="col-lg-6">
                    <label class="mb-2">Status<sup class="text-danger">*<sup></label>
                    <select class="form-select" required name="estado" value="{{old('estado', $slot?->estado)}}">
                        <option disabled hidden>Select Status</option>
                        <option value="SI">Yes</option>
                        <option value="NO">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{route('admin.slots', ['day' => $day])}}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
    </form>
@endsection