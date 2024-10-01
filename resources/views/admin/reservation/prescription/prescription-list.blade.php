@extends('admin.layouts.default')
@section('content')
    <x-admin.response-message />
    <div class="card mb-4 overflow-hidden">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h5 class='mb-0'>Prescription</h5>
            <div class='d-flex align-items-center'>
                <input type="text" class="form-control me-3" placeholder="Search...">    
                <a class="btn btn-primary flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.prescription.add', ['pres' => $presId]) }}" role="button">
                    <i class='cil-plus me-2'></i>Add Prescription
                </a>  
            </div>
        </div>
        <div class='card-body p-0'>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">#</th>
                        <th scope="col" class="align-middle">Created At</th>
                        <th scope="col" class="align-middle">Updated At</th>
                        <th scope="col" class="align-middle text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescriptions as $key=>$pres)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="align-middle">
                          {{ \Carbon\Carbon::parse($pres->fecha_add)->format('Y-m-d H:i:s') }}
                        </td>
                        <td class="align-middle">
                           {{ \Carbon\Carbon::parse($pres->fecha_upd)->format('Y-m-d H:i:s') }}
                        </td>
                        <td colspan="2" class="align-middle">
                            <div class='d-flex align-items-center justify-content-center'>
                                <a class="text-decoration-none me-3 text-secondary fs-5" target="_blank" href="{{route('admin.prescription.pdf', ['pres' => $pres->id] )}}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Print">
                                    <i class="cil-print"></i>
                                </a>
                                <a class="text-decoration-none me-3 text-secondary fs-5" href="{{ route('admin.prescription.add', ['type' => 'edit', 'pres' => $pres->id]) }}"  data-coreui-toggle="tooltip" data-coreui-placement="top" title="Edit">
                                    <i class="cil-pencil"></i>
                                </a>
                                <a class="text-decoration-none text-danger fs-5" href="{{route('admin.prescription.delete', $pres->id)}}" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Delete">
                                    <i class="cil-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <x-admin.not-found-tr :cols="4" :items="$prescriptions" />
                </tbody>
            </table>
        </div>
        <div class='card-footer border-top-0'>
           <x-admin.pagination-summary :items="$prescriptions" />
        </div>
    </div>
@endsection