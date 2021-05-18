<?php
include "AccesoDatos.php";

class Usuario
{
    private $id;
    private $nombre;
    private $apellido;
    private $fechaderegistro;
    private $sector;


    function __construct($nombre, $apellido, $fechaderegistro, $sector, $id = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaderegistro = $fechaderegistro;
        $this->sector = $sector;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getFechaRegistro()
    {
        return $this->fechaderegistro;
    }

    public function setFechaRegistro($fecha)
    {
        $this->fechaderegistro = $fecha;
    }

    public function getSector()
    {
        return $this->sector;
    }

    public function setSector($sector)
    {
        $this->sector = $sector;
    }

    public static function Select()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuario");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, Array("nombre", "apellido", "fecharegistro", "sector", "id"));
        var_dump($consulta->fetchAll());
    }

    public function Insertar()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,fecharegistro,sector)values(:nombre,:apellido,:fecharegistro,:sector)");
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':fecharegistro', $this->fechaderegistro, PDO::PARAM_STR);
        $consulta->bindValue(':sector', $this->sector, PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
}
