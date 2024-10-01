<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Futuro Administrator | Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('assets/libraries/coreui/icons/css/all.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/libraries/coreui/coreui.css')}}" rel="stylesheet" />
    </head>
    <body>
        <div class="bg-body-tertiary p-3 min-vh-100 d-flex flex-row align-items-center">
            <div class="container">
                <div class="row mx-0 justify-content-center">
                    <div class="col-lg-8">
                        @if(session()->has("message"))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session("message")}}
                                <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-group d-block d-md-flex row">
                            <div class="card col-md-5 text-white bg-dark py-5">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div>
                                        <img src="/assets/img/logo-site.png" alt="Futuro Logo" />
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-7 p-4 mb-0">
                                <form class="card-body" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <h2>Login</h2>
                                    <p class="text-body-secondary">Sign In to your account</p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="cil-user"></i>
                                        </span>
                                        <input class="form-control" name="usuario" type="text" placeholder="Enter username" required />
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <i class="cil-lock-locked"></i>
                                        </span>
                                        <input class="form-control" name="password" type="password" placeholder="Enter password" required minLength="4" />
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn w-100 btn-primary px-4" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('assets/libraries/coreui/coreui.bundle.min.js')}}"></script>
    </body>
</html>