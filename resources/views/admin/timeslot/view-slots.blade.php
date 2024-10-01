@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header py-3 justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>TimeSlots</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.slots.add', ['day' => $day]) }}" role="button">
                    <i class='cil-plus me-2'></i>Add Time Slot
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle border-end text-center" style="width: 50px;">#</th>
                        <th scope="col" class="align-middle">Day</th>
                        <th scope="col" class="align-middle">Time</th>
                        <th scope="col" class="align-middle">Status</th>
                        <th scope="col" class="align-middle text-end" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slots as $key=>$slot)
                        <tr>
                            <td class="align-middle text-capitalize border-end text-center">{{$slots->firstItem() + $key}}</td>
                            <th scope="col" class="align-middle text-capitalize">{{$slot->day}}</th>
                            <th scope="col" class="align-middle text-capitalize">{{$slot->texto}}</th>
                            <td class="align-middle">
                                <div class="form-check form-switch">
                                    <input {!! $slot->estado == "SI" ? 'checked' : '' !!} class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td colspan="1" class="align-middle text-end">
                                <div class='d-flex align-items-center justify-content-end'>
                                    <a class="text-decoration-none me-3 text-secondary fs-5" href="{{route('admin.slots.add', ['day' => $day, 'type' => 'edit', 'slot'=>$slot->id ])}}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                        <i class="cil-pencil"></i>
                                    </a>
                                    <a class="text-decoration-none text-danger fs-5" href="{{route('admin.slots.destroy', ['slot' => $slot->id])}}" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
                                        <i class="cil-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <x-admin.not-found-tr cols="5" :items="$slots" />
                </tbody>
            </table>
        </div>
        <div class='card-footer border-top-0'>
            <x-admin.pagination-summary :items="$slots" />
        </div>
    </div>
@endsection