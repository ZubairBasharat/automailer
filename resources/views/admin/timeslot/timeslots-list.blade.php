@extends('admin.layouts.default')
@section('content')
    <div class="card mb-4 overflow-hidden">
        <div class="card-header py-3 justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>TimeSlots</h5>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle border-end text-center" style="width: 50px;">#</th>
                        <th scope="col" class="align-middle">Day</th>
                        <th scope="col" class="align-middle text-end" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($days as $key=>$day)
                        <tr>
                            <td colspan="1" class="align-middle border-end text-center">{{$key+1}}</td>
                            <td class="align-middle text-capitalize">{{$day}}</td>
                            <td colspan="1" class="align-middle text-end">
                                <div class='d-flex align-items-center justify-content-end'>
                                    <a class="text-decoration-none me-3 text-secondary fs-5" href="{{route('admin.slots', ['day' => $day])}}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="View Slots">
                                        <i class="cil-clock"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection