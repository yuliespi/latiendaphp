<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
//Necesitamos una dependencia para el validador
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        echo"Aqui va la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar marcas:
        $marcas=Marca::all();
        //seleccionar categorias
        $categorias= Categoria::all();
        //mostrar la vista con las marcas y categorias
        return view('productos.new')
          ->with('categorias',$categorias)
          ->with('marcas' , $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDACION DE DATOS DEL FORMULARIO
          //1.Establecer las reglas de validacion a aplicar para el input ´data´

          $reglas =[
               "nombre" => 'required|alpha|unique:productos,nombre',
               "description" => 'required|min:5| max:20',
               "precio" => 'required|numeric',
               "imagen" => 'required|image',
               "categoria" => 'required'

          ];

          $mensajes=[
            "required" => "Campo obligatorio",
            "alpha" => "Solo letras",
            "numeric" =>"solonumeros",
            "image" =>"debe ser un archivo imagen",
            "min" => "minimo:min valor"

          ];

          //2. Luego vamos a crear el objeto validador 

          $v = Validator::make($request->all(), $reglas, $mensajes);

           //3.Realizamos ya la validacion

         //die(var_dump($v->fails()));
         //el fails retorna una valor : true si los datos fallan y false si los datos no fallan.

         if( $v->fails()){
            //validacion incorrecta, mostramos la vista new, llevando los errores 
            return redirect('productos/create')
            ->withErrors($v);
         }else{
            //validacion correcta

             //crear el objeto UploadedFile
                $archivo = $request->imagen;
                //capturar nombre"original del archivo"
                //desde el cliente 
                $nombre_archivo = $archivo->getClientOriginalName();
                $ruta = public_path();
                $archivo->move("$ruta/img" ,$nombre_archivo);
             //registrar producto 
             //var_dump($request->marcas());
             $producto = new Producto;
             $producto->Nombre = $request->nombre;
             $producto->Descripcion = $request->description;
             $producto->Precio = $request->precio;
             $producto->Imagen = $nombre_archivo;
             $producto->marca_id = $request->marca;
             $producto->categoria_id=$request->categoria;
             $producto->save();
             echo "producto registrado";
             //redireccionar al forulario levantando un mensaje de exito

             return redirect('productos/create')
              ->with("mensajito","producto registrado");

           }

    }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo"aqui va el detalle de producto con id:$producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo"aqui va el form para editar el formulario con id:$producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
