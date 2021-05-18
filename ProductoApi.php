<?php
include "producto.php";

class ProductoApi{

    public static function Select(){
        var_dump(Producto::Select());
    }
    
    public static function Insert($request, $response, $args)
    {
            $producto = new Producto(...$request->getParsedBody());
            var_dump($producto->Insertar());
    }
}