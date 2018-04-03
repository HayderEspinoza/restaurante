@extends('layouts.base')

@section('content')
	<section class="content-header">
    <h1>
      Usuarios
      <small>(Crear usuario)</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-cog"></i> Configuracion</li>
      <li><a href="{{ route('users.index') }}"> Usuario</a></li>
      <li class="active">Crear usuario</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
     
      <div class="box-body">
        {!! Form::open(['route' => 'users.store', 'class' => 'form']) !!}
          <div class="row">
            <div class="form-group col-md-4 {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Nombre</label>
                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" >
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-4 {{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="control-label">Apellido</label>
                <input id="lastname" type="lastname" class="form-control" name="lastname" value="{{ old('lastname') }}" >
                @if ($errors->has('lastname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-4 {{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="control-label">Nombre Usuario</label>
                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" >
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Correo</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-4 {{ $errors->has('role_id') ? ' has-error' : '' }}">
                <label for="role_id" class="control-label">Correo</label>
                {{ Form::select('role_id', $roles, old('email'), ['class' => 'form-control']) }}
                @if ($errors->has('role_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_id') }}</strong>
                    </span>
                @endif
            </div>
          </div>
          <div class="col-md-12">
            {{ Form::submit('Guardar', ['class' => 'btn btn-success pull-right']) }}
          </div>
        {!! Form::close() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
@endsection