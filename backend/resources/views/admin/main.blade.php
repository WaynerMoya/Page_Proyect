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
                <img  src="/images/{{$imagen->imagen}}" style="width: 100%; height: 125px;border-radius: 15px" alt="">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection