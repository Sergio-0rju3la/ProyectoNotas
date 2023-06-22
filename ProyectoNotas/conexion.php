<?php
class conexion{
    public $db;
    private $drive="mysql";
    private $host="localhost";
    private $dbname="proyectonotas";
    private $user="root";
    private $password="";

    public function __construct(){
        try{
            $db=new PDO("{$this->drive}:host={$this->host};dbname={$this->dbname}",$this->user,$this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
            echo "conexion realizada";
            
        }catch(PDOException $e){
            echo "Ha surgido un error: Detalle " . $e->getMessage();
        }
    }
}

?>