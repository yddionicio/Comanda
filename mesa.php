<?php
include_once "AccesoDatos.php";
class Mesa{
    private $id;

    function __construct($id, $numero)
    {
        $this->id = $id;
        $this->numero = $numero;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
       $this->id = $id;
    }

    public static function Select() 
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM Mesa");
        $consulta->execute();
        var_dump($consulta->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("id"))); 
    }

    public function Insertar()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into Mesa (id)values(:id)");
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
}