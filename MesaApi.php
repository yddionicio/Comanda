<?php
include "mesa.php";

class MesaApi{

    public static function Select(){
        var_dump(Mesa::Select());
    }

    public static function Insert($request, $response, $args)
    {
            $mesa = new Mesa(...$request->getParsedBody());
            var_dump($mesa->Insertar());
    }
}