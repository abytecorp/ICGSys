@extends('layouts.app')
@section('content')

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

@include('layouts.title')



                <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="{{ Storage::disk('public')->url($user->avtr) }}" class="img-circle" width="150" />
                                        <h4 class="card-title m-t-10">{{ $user->name }} {{ $user->last_name }}</h4>
                                        <h6 class="card-subtitle">{{ $user->user_type['user_type'] }}</h6>
                                        <div class="row text-center justify-content-md-center">
                                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                        </div>
                                    </center>
                                </div>
                                <div>
                                    <hr> </div>
                                <div class="card-body"> <small class="text-muted">Correo Electronico </small>
                                    <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Celular</small>
                                    <h6>No registra</h6> <small class="text-muted p-t-30 db">Direccion</small>
                                    <h6>No registra</h6>
                                    <div class="map-box">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.5335443790664!2d-74.13149868534985!3d4.676907343165927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9c835cf50921%3A0xed5075e65ea84756!2sColfecar+Business+Center!5e0!3m2!1ses!2sco!4v1535465035200" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div> <small class="text-muted p-t-30 db">Perfil Social</small>
                                    <br/>
                                    <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                    <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                    <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#permits" role="tab">Permisos</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#historial" role="tab">Historial</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Opciones</a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="permits" role="tabpanel">
                                        <div class="card-body">
                                            <div class="profiletimeline">
                                                    <div class="form-group">
                                                            <ul class="list-unstyled">
                                                                @foreach($roles as $role)
                                                                <li>
                                                                    <label>
                                                                        {{ Form::checkbox('roles[]', $role->id, null) }}
                                                                        {{ $role->name }}
                                                                        <em>({{ $role->description ?: 'Este rol no cuenta con una descripcion' }})</em>
                                                                    </label>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                    </div>
                                                    <div class="form-group">
                                                            {{ Form::button('Guardar', ['class' => 'btn waves-effect waves-light btn-rounded btn-primary btn-sm', 'type'=>'submit']) }}
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--second tab-->
                                    <div class="tab-pane" id="historial" role="tabpanel">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="table-responsive table-hover">
                                                        <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Descripcion</th>
                                                            <th>Fecha</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach( $changes as $change )
                                                        <tr>
                                                            <td> {{ $change->description }} </td>
                                                            <td> {{ $change->created_at }} </td>
                                                        </tr>
                                                    @endforeach
                                                </tr>
                                                    </table>
                                                    </tbody>
                                                    {{ $changes->render() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="card-body">
                                            settings
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->


                </div>

                    
                    
                    
                    
    </div>
</div>
            
                    
                    
                    
@endsection