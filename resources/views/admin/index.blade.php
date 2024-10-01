@extends('admin.layouts.default')
@section('content')
  <div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
      <div class="card text-white bg-primary">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{$data->users}}<span class="fs-6 fw-normal"></div>
            <div>Users</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart1" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-xl-3">
      <div class="card text-white bg-info">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">12<span class="fs-6 fw-normal"></div>
            <div>Patients</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart2" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-xl-3">
      <div class="card text-white bg-warning">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
              <div class="fs-4 fw-semibold">{{$data->admins}}<span class="fs-6 fw-normal"></div>
            <div>Admimistrators</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3" style="height:70px;">
          <canvas class="chart" id="card-chart3" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-xl-3">
      <div class="card text-white bg-danger">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">$6,500<span class="fs-6 fw-normal"></div>
            <div>Income</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div>
          <h4 class="card-title mb-0">Revenue</h4>
          <div class="small text-body-secondary">January - July 2023</div>
        </div>
        <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
          <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
            <input class="btn-check" id="option1" type="radio" name="options" autocomplete="off">
            <label class="btn btn-outline-secondary"> Day</label>
            <input class="btn-check" id="option2" type="radio" name="options" autocomplete="off" checked="">
            <label class="btn btn-outline-secondary active"> Month</label>
            <input class="btn-check" id="option3" type="radio" name="options" autocomplete="off">
            <label class="btn btn-outline-secondary"> Year</label>
          </div>
        </div>
      </div>
      <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
        <canvas class="chart" id="main-chart" height="300"></canvas>
      </div>
    </div>
  </div>
@endsection