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
                            <div class="form-group @if ($errors->has('names')) has-danger @endif">
                                <label for="imputNames">Nombres</label>
                            <input type="text" name="names" class="form-control" id="imputNames" placeholder="Ingrese los nombres" value="{{ old('names') }}">
                                @if ($errors->has('names'))
                                    @foreach ($errors->get('names') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->has('lastNames')) has-danger @endif">
                                <label for="imputLastNames">Apellidos</label>
                                <input type="text" name="lastNames" class="form-control" id="imputLastNames" placeholder="Ingrese los apellidos" value="{{ old('lastNames') }}" >
                                @if ($errors->has('lastNames'))
                                    @foreach ($errors->get('lastNames') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->has('email')) has-danger @endif">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Igrese email" value="{{old('email')}}" >
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group @if ($errors->has('userType')) has-danger @endif">
                                {{-- <div class="col-md-4"> --}}
                                    <h5 class="m-t-30 m-b-10">Perfil de usuario</h5>
                                            <select name="userType" class="selectpicker" data-style="form-control btn-secondary">
                                            <option value="">Seleccione</option>
                                            @foreach ($user_types as $user_type)
                                            <option value="{{$user_type->id}}">{{$user_type->user_type}}</option>
                                            @endforeach
                                            </select>
                                {{-- </div> --}}
                                @if ($errors->has('userType'))
                                @foreach ($errors->get('userType') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                            </div>
                            <div class="form-group @if ($errors->has('password')) has-danger @endif">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                            </div>
                            <div class="form-group @if ($errors->has('password_confirmation')) has-danger @endif">
                                <label for="exampleInputPassword1">Confirmar Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="confirmInputPassword1" placeholder="Confirmar Password">
                            @if ($errors->has('password_confirmation'))
                                @foreach ($errors->get('password_confirmation') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                            </div>
                            <div class="form-group">
                                    {{-- <div class="col-lg-6 col-md-6"> --}}
                                <div class="card">
                                    <div class="card-body">
                                                    <h4 class="card-title">Foto de perfil</h4>
                                                    <label for="input-file-now-custom-1">Seleccione un archivo en formato .JPG</label>
                                                    <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="../assets/node_modules/dropify/src/images/test-image-1.jpg" />
                                    </div>
                                </div>
                                        {{-- </div> --}}

                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="btn-nw-usr">Registrar Usuario</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>   
    </div>
</div>
@endsection
