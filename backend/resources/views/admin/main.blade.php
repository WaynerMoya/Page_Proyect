@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            <h2 class="text-center">Imagenes</h2>
            <br><br>
        </div>
        @foreach( $imagenes as $imagen )
        <div class="col-md-3">
            <div>
                <img src="/images/bg/{{$imagen->name}}" style="width: 100%; height: 150px;border-radius: 15px" alt="">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="/admin/addImage/{{$imagen->id}}" class="btn btn-primary btn-sm">Editar</a>
                </div>
                <div class="col-md-6">
                    <form action="/admin/deleteImage/{{$imagen->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <a href="/admin/addImage" class="col-md-3">
            <div class="add-img">
                <i class="fa fa-plus fa-4x add-icon" aria-hidden="true"></i> <br>
                <small style="color: black;">Agregar imagen</small>
            </div>
        </a>
    </div>
</div>
@endsection