@extends('welcome')
@section('content')
<link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            <h2 class="text-center">Agregar nueva imagen</h2>
            <br><br>
        </div>
        <div class="col-md-6">
            <form action="{{asset('admin/uploadedImageArticle')}}" method="POST">
                {{ csrf_field() }}
                <input id="code" type="text" class="hide" value="{{$item->code}}" name="code">
                <input id="id" type="text" class="hide" value="{{$item->id}}" name="id">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input id="name" type="text" class="form-control" value="{{$item->name}}" name="name" placeholder="Nombre del articulo" required>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-left: 0;">
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input id="price" type="number" class="form-control" value="{{$item->price}}" name="price" placeholder="0.00 $" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Descripción</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Descripción.." rows="10" required>{{$item->description}}</textarea>
                </div><!-- this is were the previews should be shown. -->

                <!-- Now setup your input fields -->
                <button onclick="copy()" type="submit" class="btn btn-success btn-block">{{$item->id ? 'Publicar' : 'Actualizar'}}</button>
            </form>

        </div>
        <div class="col-md-6">
            <form action="{{asset('admin/uploadedImageArticle')}}" id="my-awesome-dropzone" method="POST" class="dropzone" style="height: 200px; overflow:auto" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input id="idCopy" type="text" class="hide" value="{{$item->id}}" name="id">
                <input id="nameCopy" type="text" class="hide" value="{{$item->name}}" name="name">
                <input id="priceCopy" type="text" class="hide" value="{{$item->price}}" name="price">
                <input id="descriptionCopy" type="text" class="hide" value="{{$item->description}}" name="description">
                <input id="codeCopy" type="text" class="hide" value="{{$item->code}}" name="code">
                <div class="dz-message">
                    Drop your files here
                </div>
                <div class="dropzone-previews"></div>
            </form>
            <br>
            <input class="hide" value="{{count($imagenes)}}" id="contImagenes">
            @if(count($imagenes) > 0)
            <div class="row">
                @foreach($imagenes as $imagen)
                <div class="col-md-3">
                    <div>
                        <img src="/images/articles/{{$imagen->name}}" style="width: 100%; height: 150px;border-radius: 15px" alt="">
                    </div>
                    <form action="/admin/deleteImageArticulo/{{$imagen->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

<script src="{{ asset('/js/dropzone.js') }}"></script>
<script>
    function copy() {
        document.getElementById("nameCopy").value = document.getElementById("name").value;
        document.getElementById("priceCopy").value = document.getElementById("price").value;
        document.getElementById("descriptionCopy").value = document.getElementById("description").value;
        document.getElementById("codeCopy").value = document.getElementById("code").value;
        document.getElementById("idCopy").value = document.getElementById("id").value;
    }
    Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        autoDiscover: false,
        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;
            var form = this.element.parentElement.parentElement.children[1];
            // First change the button to actually tell Dropzone to process the queue.
            form.querySelector("button[type=submit]").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.

                if (document.getElementById("name").value != "" && document.getElementById("price").value != "" && document.getElementById("description").value != "") {
                    if(document.getElementById('contImagenes').value == 0){
                    e.preventDefault();
                    }
                    e.stopPropagation();
                    myDropzone.processQueue();
                }
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
                window.location.href = "/admin/articulo";
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }

    }
</script>

@endsection