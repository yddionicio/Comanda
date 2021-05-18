<?php

class Pedido
{
    private $id;
    private $cantidad;
    private $idUsuario;
    private $idMesa;

    function __construct($id, $cantidad, $idmesa,  $idusuario)
    {
        $this->id = $id;
        $this->cantidad = $cantidad;
        $this->idMesa = $idmesa;
        $this->idUsuario = $idusuario;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
       $this->id = $id;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
       $this->cantidad = $cantidad;
    }

    public function getidUsuario()
    {
        return $this->idUsuario;
    }

    public function setidUsuario($idUser)
    {
       $this->idUsuario = $idUser;
    }

    public function getidMesa()
    {
        return $this->idMesa;
    }

    public function setidMesa($idmesa)
    {
       $this->idMesa = $idmesa;
    }

    public static function Select()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM Pedido");
        $consulta->execute();
        var_dump($consulta->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("id","cantidad", "idMesa", "idusuario"))); 
    }

    public function Insertar()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuario (id,cantidad,idMesa,idusuario)values(:id,:cantidad,:idMesa,:idusuario)");
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
        $consulta->bindValue(':idMesa', $this->idMesa, PDO::PARAM_INT);
        $consulta->bindValue(':idusuario', $this->idUsuario, PDO::PARAM_INT);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

}
