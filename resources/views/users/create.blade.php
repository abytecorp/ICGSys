@extends('layouts.app')

@section('content')

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

@include('layouts.title')
<div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h3 class="box-title m-b-0">Datos Del Usuario</h3>
                <p class="text-muted m-b-30 font-13"> Formulario de ingreso para nuevos usuarios </p>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                    {!! Form::open([ 'route' => ['users.store'],'method' => 'POST']) !!}
                    @include('users.partials.form')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>   
                                 

</div>
</div>

@endsection
