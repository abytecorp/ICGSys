@extends('layouts.app')
@section('content')

<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

@include('layouts.title')



<div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Usuarios </h4>
                <h6 class="card-subtitle">En esta tabla podra encontrar el listado de usuarios.</h6>
                <div class="table-responsive table-hover">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Permisos</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr data-id="{{$user->id}}">
                            <td>
                                
                                <a href="{{ route('users.show', '$user->id') }}">{{$user->name}} {{$user->last_name}}</a>
                                
                            </td>
                            <td>
                                <span class="text-muted"><i class="fa fa-clock-o"></i> {{$user->email}}</span>
                            </td>

                            <td>
                                    {!! Form::open(['route' => ['users.show', $user->id], 'method' => 'GET']) !!}
                                <button type="submit"  class="btn waves-effect waves-light btn-sm btn-success" >Ver</button>
                                    {!! Form::close() !!}
                            </td>
                            <td>
                                    {!! Form::open(['route' => ['users.edit', $user->id], 'method' => 'GET']) !!}
                                <button type="submit" class="btn waves-effect waves-light btn-sm btn-success" >Editar</button>
                                    {!! Form::close() !!}
                            </td>
                            <td>
                                <permisions :user={{ $user->id }}></permisions>
                            </td>
                        @endforeach
                                
                            </tr>

                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
    <!-- column -->

</div>
</div>
@endsection

