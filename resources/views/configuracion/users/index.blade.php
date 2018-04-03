@extends('layouts.base')

@section('content')
	<section class="content-header">
    <h1>
      Usuarios
      <small>(Lista de usuarios)</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-cog"></i> Configuracion</li>
      <li class="active">Usuarios</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class=" text-right">
        	<a href="{{ route('users.create') }}" class="btn btn-primary">
        		<i class="fa fa-plus-circle"></i>
        		Crear
        	</a>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <tbody>
         		<tr>
              <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Username</th>
                <th>Email</th>
                <th>Opciones</th>
            </tr>
            @foreach ($users as $index => $user)
	            <tr>
	            	<td>{{ $index + 1 }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<div class="btn-group btn-sm">
	                  <button type="button" class="btn btn-default">Opciones</button>
	                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	                    <span class="caret"></span>
	                  </button>
	                  <ul class="dropdown-menu" role="menu">
	                    <li>
                        <a href="{{ route('users.destroy', [$user->id]) }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="Esta seguro?">Eliminar</a>
                        <a href="{{ route('users.edit', [$user->id]) }}" >Editar</a>
                      </li>
	                  </ul>
	                </div>
								</td>
	            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @if (session('status'))
	    <div class="wrap-notificacion">
	    	<div class="alert alert-success alert-dismissible">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		      <h4>Notificación</h4>
		      {{ session('status') }}
		    </div>
	    </div>
		@endif
    

  </section>
@endsection