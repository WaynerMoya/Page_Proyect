@extends('welcome')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

        @if(count($imagenes)>1)
            @foreach( $imagenes as $imagen )
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        @endif

    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach( $imagenes as $imagen )
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div>
                <img class="d-block" src="/images/{{$imagen->imagen}}" style="width: 100%; height: 450px" alt="">
            </div>
        </div>
        @endforeach
    </div>
    
</div>

@endsection