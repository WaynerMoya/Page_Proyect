
@extends('welcome')
@section('content')
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
<div class="login">
	<h1>Iniciar Sesión</h1>
    <form action="{{asset('admin/loged')}}" method="POST" id="logForm">
        {{ csrf_field() }}
    	<input type="text" name="username" placeholder="Correo" required="required" />
        <input type="password" name="password" placeholder="Clave" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Ingresar</button>
    </form>
</div>


@endsection