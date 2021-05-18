<?php
include "usuario.php";

class UsuarioApi{

    public static function SelectUser(){
        var_dump(Usuario::Select());
    }


    public static function InsertUser($request, $response, $args)
    {
            $usuario = new Usuario(...$request->getParsedBody());
            var_dump($usuario->Insertar());
    }
}