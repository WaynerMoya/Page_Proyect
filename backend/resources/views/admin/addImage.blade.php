@extends('welcome')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            <h2 class="text-center">Agregar nueva imagen</h2>
            <br><br>
        </div>
        <div class="col-md-6">
            <form action="{{asset('admin/uploadedImage')}}" method="POST" id="imageForm" enctype="multipart/form-data">

            {{ csrf_field() }}

                <div class="form-group text-center">
                    <h5 class="text-center">Imagen</h5>
                    <input type="file" id="image" name="image" class="btn btn-primary " accept="image/*" onchange="imageChange()">
                </div>
                <input type="text" name="id" value="{{$item->id ? $item->id : 0}}" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center">Fuente</h5>
                    </div>
                    <div class="col-md-4" style="padding-right: 0;">
                        <select class="form-control" style="font-size: 14px;" name="font" id="fontSelect" onchange="fontChange()">
                            <option {{ ($item->font == '"Poppins", sans-serif') ? 'selected' : '' }} value='"Poppins", sans-serif'>Poppins (Defecto)</option>
                            <option {{ ($item->font == 'Arial, Helvetica, sans-serif') ? 'selected' : '' }}  value="Arial, Helvetica, sans-serif">Arial</option>
                            <option {{ ($item->font == '"Comic Sans MS", cursive, sans-serif') ? 'selected' : '' }}  value='"Comic Sans MS", cursive, sans-serif'>Comic Sans</option>
                            <option {{ ($item->font == '"Courier New", Courier, monospace') ? 'selected' : '' }}  value='"Courier New", Courier, monospace'>Courier New</option>
                            <option {{ ($item->font == 'Georgia, serif') ? 'selected' : '' }}  value="Georgia, serif">Georgia</option>
                            <option {{ ($item->font == 'Helvetica, Arial, sans-serif') ? 'selected' : '' }}  value="Helvetica, Arial, sans-serif">Helvetica</option>
                            <option {{ ($item->font == '"Lucida Console", Monaco, monospace') ? 'selected' : '' }}  value='"Lucida Console", Monaco, monospace'>Lucida Console</option>
                            <option {{ ($item->font == '"Palatino Linotype", "Book Antiqua", Palatino, serif') ? 'selected' : '' }}  value='"Palatino Linotype", "Book Antiqua", Palatino, serif'>Palatino Linotype</option>
                            <option {{ ($item->font == 'Tahoma, Geneva, sans-serif') ? 'selected' : '' }}  value="Tahoma, Geneva, sans-serif">Tahoma</option>
                            <option {{ ($item->font == '"Times New Roman", Times, serif') ? 'selected' : '' }}  value='"Times New Roman", Times, serif'>Times New Roman</option>
                            <option {{ ($item->font == '') ? 'selected' : 'Verdana, Geneva, sans-serif' }}  value="Verdana, Geneva, sans-serif">Verdana</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="padding-right: 0;">
                        <select class="form-control" style="font-size: 14px;" name="size" id="sizeSelect" onchange="sizeChange()">
                            <option  {{ ($item->sizeText == '18') ? 'selected' : '' }} value="18">18</option>
                            <option {{ ($item->sizeText == '24') ? 'selected' : '' }} value="24">24</option>
                            <option {{ ($item->sizeText == '32') ? 'selected' : '' }} value="32">32</option>
                            <option {{ ($item->sizeText == '38') ? 'selected' : '' }} value="38">38</option>
                            <option {{ ($item->sizeText == '46') ? 'selected' : '' }} value="46">46</option>
                            <option {{ ($item->sizeText == '52') ? 'selected' : '' }} value="52">52</option>
                            <option {{ ($item->sizeText == '60') ? 'selected' : '' }} value="60">60</option>
                            <option {{ ($item->sizeText == '68') ? 'selected' : '' }} value="68">68</option>
                            <option {{ ($item->sizeText == '80') ? 'selected' : '' }} value="80">80</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 0;">
                        <select class="form-control" style="font-size: 14px;" name="weight" id="weightSelect" onchange="weightChange()">
                            <option {{ ($item->bold == 0 && $item->cursive == 0) ? 'selected' : '' }} value="normal">Normal</option>
                            <option {{ ($item->bold == 1 )? 'selected' : '' }} value="bold"><b>Negrita</b> </option>
                            <option  {{ ($item->cursive == 1 )? 'selected' : '' }} value="italic"><i>Cursiva</i></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" style="font-size: 14px;" name="orientation" id="orientationSelect" onchange="orientationChange()">
                            <option {{ ($item->orientation == 'left') ? 'selected' : '' }} value="left">Izquierda</option>
                            <option {{ ($item->orientation == 'center') ? 'selected' : '' }} value="center">Medio </option>
                            <option {{ ($item->orientation == 'right') ? 'selected' : '' }} value="right">Derecha</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <br>
                    <h5 class="text-center">Animación</h5>
                    <select class="form-control" style="font-size: 14px;" name="animation" id="animationSelect" onchange="animationChange()">
                        <option {{ ($item->animation == 'none') ? 'selected' : '' }} value="none">Ninguna</option>
                        <option {{ ($item->animation == 'animate__bounce') ? 'selected' : '' }} value="animate__bounce">Bounce</option>
                        <option {{ ($item->animation == 'animate__pulse') ? 'selected' : '' }} value="animate__pulse">Pulse</option>
                        <option {{ ($item->animation == 'animate__rubberBand') ? 'selected' : '' }} value="animate__rubberBand">Rubber Band</option>
                        <option {{ ($item->animation == 'animate__headShake') ? 'selected' : '' }} value="animate__headShake">Head Shake</option>
                        <option {{ ($item->animation == 'animate__backInDown') ? 'selected' : '' }} value="animate__backInDown">Back In Down</option>
                        <option {{ ($item->animation == 'animate__backInLeft') ? 'selected' : '' }} value="animate__backInLeft">Back In Left</option>
                        <option {{ ($item->animation == 'animate__backInRight') ? 'selected' : '' }} value="animate__backInRight">Back In Right</option>
                        <option {{ ($item->animation == 'animate__backInUp') ? 'selected' : '' }} value="animate__backInUp">Back In Up</option>
                        <option {{ ($item->animation == 'animate__fadeIn') ? 'selected' : '' }} value="animate__fadeIn">Fade In</option>
                        <option {{ ($item->animation == 'animate__fadeInDown') ? 'selected' : '' }} value="animate__fadeInDown">Fade In Down</option>
                        <option {{ ($item->animation == 'animate__fadeInLeft') ? 'selected' : '' }} value="animate__fadeInLeft">Fade In Left</option>
                        <option {{ ($item->animation == 'animate__fadeInRight') ? 'selected' : '' }} value="animate__fadeInRight">Fade In Right</option>
                        <option {{ ($item->animation == 'animate__fadeInUp') ? 'selected' : '' }} value="animate__fadeInUp">Fade In Up</option>
                    </select>
                </div>
                <div class="form-group">
                    <h5 class="text-center">Texto</h5>
                    <textarea type="text" rows="5" name="text"  id="txtWrite" onkeyup="textChange()" class="form-control">{{$item->text}}</textarea>
                </div>
                <br>
                <button class="btn btn-success btn-block">Subir</button>
            </form>
        </div>
        <div class="col-md-6">
            <h4 class="text-center"> Previsualización</h4>
            <img src="{{'/images/bg/'.$item->name}}" class="{{$item->name != '' ? '' : 'hide'}}" style="width: 100%; height: 225px;" alt="Image preview...">
            <p class="" id="txtPrev">{{$item->text}}</p>
        </div>
    </div>
</div>

<script src="{{ asset('/js/addImage.js') }}"></script>
@endsection