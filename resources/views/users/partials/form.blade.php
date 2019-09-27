    <div class="form-group @if ($errors->has('name')) has-danger @endif">
        {!! Form::label('imputNames', 'Nombres del usuario', ['class' => '']) !!}
        {!! Form::text('name', null,['class'=>'form-control', 'placeholder' => 'Nombres del Usuario', 'id'=>'imputNames']) !!}
        @if ($errors->has('name'))
            @foreach ($errors->get('name') as $error)
                <div class="form-control-feedback">{{ $error }}</div>
            @endforeach
        @endif
    </div>
    <div class="form-group @if ($errors->has('last_name')) has-danger @endif">
        {!! Form::label('imputLastNames', 'Ingrese los apellidos del usuario', ['class' => '']) !!}
        {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder' => 'Ingrese los apellidos', 'id'=>'imputLastNames']) !!}
        @if ($errors->has('last_name'))
            @foreach ($errors->get('last_name') as $error)
                <div class="form-control-feedback">{{ $error }}</div>
            @endforeach
        @endif
    </div>
    <div class="form-group @if ($errors->has('email')) has-danger @endif">
        {!! Form::label('exampleInputEmail1', 'Em@il', ['class' => '']) !!}
        {!! Form::email('email', null,['class'=>'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'id'=>'exampleInputEmail1']) !!}
        @if ($errors->has('email'))
            @foreach ($errors->get('email') as $error)
                <div class="form-control-feedback">{{ $error }}</div>
            @endforeach
        @endif
    </div>
    <div class="form-group @if ($errors->has('user_type')) has-danger @endif">
            <h5 class="m-t-30 m-b-10">Cargo en la empresa </h5>

                    {!! Form::select('user_type', $user_types, null,['placeholder' => 'elija una opcion', 'class' => 'selectpicker', 'data-style'=>'form-control btn-secondary']) !!}

        @if ($errors->has('user_type'))
        @foreach ($errors->get('user_type') as $error)
            <div class="form-control-feedback">{{ $error }}</div>
        @endforeach
    @endif
    </div>
    <div class="form-group @if ($errors->has('password')) has-danger @endif">
        {!! Form::label('exampleInputPassword1', 'Password', ['class' => '']) !!}
        {!! Form::password('password',['class'=>'form-control', 'placeholder' => 'Ingrese el password',  'id'=>'exampleInputPassword1']) !!}
    @if ($errors->has('password'))
        @foreach ($errors->get('password') as $error)
            <div class="form-control-feedback">{{ $error }}</div>
        @endforeach
    @endif
    </div>
    <div class="form-group @if ($errors->has('password_confirmation')) has-danger @endif">
            {!! Form::label('exampleInputPassword1', 'Confirmar Password', ['class' => '']) !!}
            {!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder' => 'Conmfirme el password', 'id'=>'confirmInputPassword1']) !!}
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
                            <input type="file" id="avtr" class="dropify" data-default-file="../assets/node_modules/dropify/src/images/test-image-1.jpg" />
            </div>
        </div>
                {{-- </div> --}}

    </div>

    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="btn-nw-usr">Registrar Usuario</button>
