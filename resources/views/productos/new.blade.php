@extends('layouts.menu')

@section('contenido')

@if(session('mensajito'))
<div class="row">
    <p>{{ session('mensajito') }}</p>
</div>
@endif

<div class="row">
       <h1 class="blue-rext">Nuevo Producto</h1>
</div>

<div class="row">
    <form action="{{ route('productos.store') }}" class="col s8" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="nombre" name="nombre" placeholder="nombre de producto"/>
                <label for="nombre">Nombre del Producto</label>
                <strong>{{ $errors->first('nombre') }}</strong>           
            </div>
        </div>
            <div class="row">
        <div class="col s8 input-field">

            <textarea name="description" id="description" class="materialize-textarea"></textarea>
            <label for="description">Descripcion</label>
            <strong>{{ $errors->first('description') }}</strong>
        </div>

        </div>

        <div class="row">
            <div class="col s8 input-field">
                <input type="number" id="precio" name="precio"/>
                <label for="precio">Precio</label>
                <strong>{{ $errors->first('precio') }}</strong>

            </div>
        </div>

        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn deep-purple darken-3">
                    <span>Imagen de producto</span>
                    <input type="file" name="imagen"/>
                    
                </div>

                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">

                </div>
            </div>
            <strong>{{ $errors->first('imagen') }}</strong>
        </div>

        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">

                  @foreach($marcas as $marca)
                  <option value="{{$marca->id}}">{{$marca->Nombre}}</option>
                  @endforeach

                </select>
                <label >Selecione marca</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field"></div>
            <select name="categoria" id="categoria">
                
            <option value="">Seleccione la Categoria</option>
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->Nombre}}</option>
                @endforeach

            </select>
            <label>Seleccione una Categoria</label>
            <strong>{{ $errors->first('categoria') }}</strong>
        </div>
        <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                <i class="material-icons right">Guardar Producto</i>
          </button>
        </div>

    </form>
</div>

@endsection