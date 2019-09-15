@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard 1</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard 1</li>
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
        <!-- Row -->
            <!-- column -->
            
            <!-- Card -->
            @can('affiliations.index')
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <img class="card-img-top img-responsive" src="{{ Storage::disk('public')->url('images/big/afiliaciones.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Afiliaciones</h4>
                        <p class="card-text">Explicación detallada de este modulo de afiliaciones, que exprese literalmente lo que significa</p>
                    <a href="{{ route('affiliations.index') }}" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
            </div>
            @endcan
            <!-- Card -->
            <!-- Card -->
            @can('guild-argumentation.index')
            <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{ Storage::disk('public')->url('images/big/argumentaciongremial.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Argumentación Gremial</h4>
                            <p class="card-text">Explicación detallada de este modulo de afiliaciones, que exprese literalmente lo que significa</p>
                            <a href="{{ route('trade_union_argumentation.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
            </div>
            @endcan
            <!-- Card -->
            <!-- Card -->
            @can('business-str.index')
            <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{ Storage::disk('public')->url('images/big/fortalecimientoempresarial.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Fortalecimiento Empresarial</h4>
                            <p class="card-text">Explicación detallada de este modulo de afiliaciones, que exprese literalmente lo que significa</p>
                            <a href="{{ route('business-str.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
            </div>
            @endcan
            <!-- Card -->
            <!-- Card -->
            @can('divulgation.index')
            <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{ Storage::disk('public')->url('images/big/divulgacion.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                                <h4 class="card-title">Divulgación</h4>
                                <p class="card-text">Explicación detallada de este modulo de afiliaciones, que exprese literalmente lo que significa</p>
                                <a href="{{ route('divulgation.index') }}" class="btn btn-primary">Ingresar</a>
                            </div>
                    </div>
            </div>
            @endcan
            <!-- Card -->
            <!-- Card -->
            @can('logistical-support.index')
            <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{ Storage::disk('public')->url('images/big/apoyologistico.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Apoyo Logistico</h4>
                            <p class="card-text">Explicación detallada de este modulo de afiliaciones, que exprese literalmente lo que significa</p>
                            <a href="{{ route('logistical-support.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
            </div>
            @endcan
            <!-- Card -->
            <!-- Card -->
            @can('users.index')
            <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{ Storage::disk('public')->url('images/big/users.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-text">Explicación detallada de este modulo de afiliaciones, que exprese literalmente lo que significa</p>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
            </div>
            @endcan
            <!-- Card -->

        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
{{-- <!-- End Page wrapper  --> sistema operativo de gestion colfecar --}}
<!-- ============================================================== -->
@endsection