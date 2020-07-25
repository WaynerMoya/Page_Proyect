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
                    <input type="file" id="image" name="image" class="btn btn-primary " accept="image/*" onchange="imageChange()" required>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center">Fuente</h5>
                    </div>
                    <div class="col-md-4" style="padding-right: 0;">
                        <select class="form-control" style="font-size: 14px;" name="font" id="fontSelect" onchange="fontChange()">
                            <option value='"Poppins", sans-serif'>Poppins (Defecto)</option>
                            <option value="Arial, Helvetica, sans-serif">Arial</option>
                            <option value='"Comic Sans MS", cursive, sans-serif'>Comic Sans</option>
                            <option value='"Courier New", Courier, monospace'>Courier New</option>
                            <option value="Georgia, serif">Georgia</option>
                            <option value="Helvetica, Arial, sans-serif">Helvetica</option>
                            <option value='"Lucida Console", Monaco, monospace'>Lucida Console</option>
                            <option value='"Palatino Linotype", "Book Antiqua", Palatino, serif'>Palatino Linotype</option>
                            <option value="Tahoma, Geneva, sans-serif">Tahoma</option>
                            <option value='"Times New Roman", Times, serif'>Times New Roman</option>
                            <option value="Verdana, Geneva, sans-serif">Verdana</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="padding-right: 0;">
                        <select class="form-control" style="font-size: 14px;" name="size" id="sizeSelect" onchange="sizeChange()">
                            <option value="18">18</option>
                            <option value="24">24</option>
                            <option value="32">32</option>
                            <option value="38">38</option>
                            <option value="46">46</option>
                            <option value="52">52</option>
                            <option value="60">60</option>
                            <option value="68">68</option>
                            <option value="80">80</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 0;">
                        <select class="form-control" style="font-size: 14px;" name="weight" id="weightSelect" onchange="weightChange()">
                            <option value="normal">Normal</option>
                            <option value="bold"><b>Negrita</b> </option>
                            <option value="italic"><i>Cursiva</i></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" style="font-size: 14px;" name="orientation" id="orientationSelect" onchange="orientationChange()">
                            <option value="left">Izquierda</option>
                            <option value="center">Medio </option>
                            <option value="right">Derecha</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <br>
                    <h5 class="text-center">Animación</h5>
                    <select class="form-control" style="font-size: 14px;" name="animation" id="animationSelect" onchange="animationChange()">
                        <option value="none">Ninguna</option>
                        <option value="animate__bounce">Bounce</option>
                        <option value="animate__pulse">Pulse</option>
                        <option value="animate__rubberBand">Rubber Band</option>
                        <option value="animate__headShake">Head Shake</option>
                        <option value="animate__backInDown">Back In Down</option>
                        <option value="animate__backInLeft">Back In Left</option>
                        <option value="animate__backInRight">Back In Right</option>
                        <option value="animate__backInUp">Back In Up</option>
                        <option value="animate__fadeIn">Fade In</option>
                        <option value="animate__fadeInDown">Fade In Down</option>
                        <option value="animate__fadeInLeft">Fade In Left</option>
                        <option value="animate__fadeInRight">Fade In Right</option>
                        <option value="animate__fadeInUp">Fade In Up</option>
                    </select>
                </div>
                <div class="form-group">
                    <h5 class="text-center">Texto</h5>
                    <textarea type="text" rows="5" name="text"  id="txtWrite" onkeyup="textChange()" class="form-control"></textarea>
                </div>
                <br>
                <button class="btn btn-success btn-block">Subir</button>
            </form>
        </div>
        <div class="col-md-6">
            <h4 class="text-center"> Previsualización</h4>
            <img src="" class="hide" style="width: 100%; height: 225px;" alt="Image preview...">
            <p class="" id="txtPrev"></p>
        </div>
    </div>
</div>

<script src="{{ asset('/js/addImage.js') }}"></script>
@endsection