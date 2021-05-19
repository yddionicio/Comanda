<?php
include_once "AccesoDatos.php";

class Producto
{
    private $codigodeBarra;
    private $tipo;
    private $nombre;
    private $stock;
    private $precio;

    function __construct($codigodeBarra, $tipo, $nombre, $stock, $precio)
    {
        $this->codigodeBarra = $codigodeBarra;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    public function getCodigodeBarra()
    {
        return $this->codigodeBarra;
    }

    public function setCodigodeBarra($codigo)
    {
       $this->codigodeBarra = $codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
       $this->nombre = $nombre;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
       $this->tipo = $tipo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
       $this->precio = $precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
       $this->stock = $stock;
    }

    public static function Select()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM Productos");
        $consulta->execute();
        var_dump($consulta->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("codigodeBarra", "tipo","nombre", "stock", "precio")));
    }

    public function Insertar()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into usuario (codigodeBarra,tipo,nombre,stock,precio)values(:codigodeBarra,:tipo,:nombre,:stock,:precio)");
        $consulta->bindValue(':codigodeBarra', $this->codigodeBarra, PDO::PARAM_INT);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }



}

