<?php
include "usuario.php";

class UsuarioApi
{

    public static function Select()
    {
        var_dump(Usuario::Select());
    }

    public static function Insert($request, $response, $args)
    {
            $usuario = new Usuario(...$request->getParsedBody());
            var_dump($usuario->Insertar());
    }

}
