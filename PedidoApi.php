<?php
include "pedido.php";

class PedidoApi{

    public static function Select(){
        var_dump(Pedido::Select());
    }


    public static function Insert($request, $response, $args)
    {
            $pedido = new Pedido(...$request->getParsedBody());
            var_dump($pedido->Insertar());
    }
}