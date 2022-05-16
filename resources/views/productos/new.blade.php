@extends('layouts.menu')

@section('contenido')

<div class="row">
       <h1 class="blue-rext">Nuevo Producto</h1>
</div>

<div class="row">
    <form action="" class="col s8" method="POST">
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="nombre" name="nombre" placeholder="nombre de producto"/>
                <label for="nombre">Nombre del Producto</label>           
            </div>
        </div>
            <div class="row">
        <div class="col s8 input-field">

            <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
            <label for="desc">Descripcion</label>
        </div>

        </div>

        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="precio" name="precio"/>
                <label for="precio">Precio</label>

            </div>
        </div>

        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn">
                    <span>Imagen de producto..</span>
                    <input type="file" name="imagen"/>
                </div>

                <div class="file-path-wrapper">
                    <input type="text" class="file-path">

                </div>
            </div>
        </div>

    </form>
</div>

@endsection