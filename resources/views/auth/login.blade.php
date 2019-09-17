<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>{{ config('app.name', 'ICGSys') }}</title>

    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/login-register-lock.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    
</head>


<body class="skin-blue card-no-border">
    <div id="log-in">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ __('Login') }}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(https://images.pexels.com/photos/2422293/pexels-photo-2422293.jpeg?cs=srgb&dl=adult-business-computer-2422293.jpg&fm=jpg);">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                <a href="javascript:void(0)" class="text-center db"><img src="https://res-3.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco/v1491019028/ixlievthjuonrdzgrh4g.png" alt="Home" /><br/></a>
                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck1">{{ __('Recuerdame') }}</label>
                            <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right">
                                <i class="fa fa-lock m-r-5"></i> {{ __('Olvidaste tu contraseña?') }}
                            </a> 
                        </div>     
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>

            </form>    
            </div>
            </div>
        </div>
    </section>
    </div>


    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- Bootstrap tether Core JavaScript -->
    {{-- <script src="../assets/node_modules/popper/popper.min.js"></script> --}}
    {{-- <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script> --}}
    <!--Custom JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">

        // $(document).ready(function() {
        //     alert('mijito')
        // });
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html> 