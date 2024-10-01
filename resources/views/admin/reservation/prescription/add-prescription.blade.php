@extends('admin.layouts.default')
@section('content')
    @php
        $route_condition = request()->get('type') == 'edit';
        $route = $route_condition
            ? route('admin.prescription.update', ['pres' => $data->prescription->id])
            : route('admin.prescription.store', ['pres' => $data->prescription->id])
    @endphp
    <form class="card mb-4 overflow-hidden add-data-form" method="POST" action="{{$route}}">
        @csrf
        <div class="card-header py-3 d-flex align-items-center">
            <h5 class='mb-0'>{{$route_condition? 'Edit' : 'Add'}} Prescription</h5>
        </div>
        <div class='card-body py-4'>
            <x-admin.response-message />
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <p>
                        <span class="d-block mb-2"><b>Paciente: </b>{{$data->prescription->user->nombre}} {{$data->prescription->user->apellido}}</span>
                        <span class="d-block mb-2"><b>Email: </b>{{$data->prescription->user->email}}</span>
                        <span class="d-block"><b>Teléfono: </b>{{$data->prescription->user->telefono}}</span>
                    </p>
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="mb-2">Medication</label>
                    <div class="w-100 d-flex">
                        <div class="flex-1 me-2">
                            <select class="form-select"  id="medicine-selector">
                                <option selected value=""disabled hidden>Select Medication</option>
                                @foreach($medicines as $med)
                                <option value="{{$med->id}}">{{$med->tipo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="align-self-end">
                            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" id="add-btn" type="button">
                                <i class='cil-plus me-2'></i>Add
                            </button>
                        </div>
                    </div>
                </div>
         
                <div class="col-12 mb-3" id="medicine-container">
                    @foreach($data->detail as $dt)
                        <div class="bg-light mb-3" style="border-radius: 8px;" id="medicine-item-{{$dt->id}}">
                            <div class="d-flex pe-3 align-items-center">
                                <div class="row flex-1 mx-0 py-3">
                                    <div class="col-lg-6">
                                        <input class="form-control text-primary" readonly value="{{$dt['medicationDosage']?->tipo}}" />
                                        <input type="hidden" name="idtipo[]" readonly value="{{$dt?->idtipo}}" />
                                        <input type="hidden" name="idmedicamento[]" readonly value="{{$dt?->idmedicamento}}" />
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control text-primary" required name="dosis[]" value="{{$dt->dosis}}" placeholder="Enter Dose" />
                                    </div>
                                </div>
                                <div>
                                    <button data-id="medicine-item-{{$dt->id}}" class="delete-item-btn btn btn-danger px-2 text-white d-flex align-items-center justify-content-center" type="button">
                                        <i class='cil-x'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="old_detail[]" value="{{$dt->id}}" />
                    @endforeach
                </div>
                <div class="col-12">
                    <label class="mb-2">Annotations</label>
                    <textarea class='form-control w-100' name="anotaciones" placeholder="Annotations" rows="5">{{old('anotaciones', $data->prescription->anotaciones)}}</textarea>
                </div>
            </div>
        </div>
        <div class='card-footer border-top-0 py-3 d-flex justify-content-end align-items-center'>
            <a class="btn btn-secondary px-4 me-3 flex-shrink-0 d-inline-flex align-items-center" href="{{ route('admin.prescriptions', $route_condition? $data->prescription->idreserva : $data->prescription->id) }}" role="button">
                Cancel
            </a>
            <button class="btn btn-primary px-4 flex-shrink-0 d-inline-flex align-items-center" type="submit">
                Submit
            </button>
        </div>
        <input type="hidden" name="idusuario" value="{{$data->prescription->user->id}}" />
    </form>
    <input type="hidden" id="medicines" value="{{$medicines}}" />
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const medicines = JSON.parse($('#medicines').val()) || [];
        $('#add-btn').click(function() {
            const medSelector = $('#medicine-selector');
            const medItem = medicines.find((x) => x.id == medSelector.val());
            if(medSelector.val() && medItem) {
                const randomString = (Math.random() + 1).toString(36).substring(7);
                $("#medicine-container").append(`
                    <div class="bg-light mb-3" style="border-radius: 8px;" id="medicine-item-${randomString}">
                        <div class="d-flex pe-3 align-items-center">
                            <div class="row flex-1 mx-0 py-3">
                                <div class="col-lg-6">
                                    <input class="form-control text-primary" readonly value="${medItem.tipo}" />
                                    <input type="hidden" name="idtipo[]" readonly value="${medItem.id}" />
                                    <input type="hidden" name="idmedicamento[]" readonly value="${medItem.idmedicamento}" />
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control text-primary" required placeholder="Enter Dose" name="dosis[]" />
                                </div>
                            </div>
                            <div>
                                <button data-id="medicine-item-${randomString}" 
                                    class="delete-item-btn btn btn-danger px-2 text-white d-flex align-items-center justify-content-center" type="button">
                                    <i class='cil-x'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `)
            }
            medSelector.val('');
        });
    });
    $(document).on('click', '.delete-item-btn',  function() {
        $(`#${$(this).attr('data-id')}`).remove();
    })
</script>
@endpush