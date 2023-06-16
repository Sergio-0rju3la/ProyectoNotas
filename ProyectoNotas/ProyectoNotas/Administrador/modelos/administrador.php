<?php
include_once('../../conexion.php');
class Administrador extends conexion{
    public function __construct(){
        $this->db=parent::__construct();
    }
    //funcion para registrar usuarios
    public function addadmi ($Nombre,$Apellido,$Usuario,$Passwor,$Perfil,$Estado);
    {
        //crear la sentencia sql
        $statement=$this->db->prepare("insert into Usuarios(Nombre,Apellido,Usuario,Passwor,Perfil,
        Estado)VALUES(:Nombre,:Apellido,:Usuario,:Passwor,'Administrador',:'Activo')");
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Apellido',$Apellido);
        $statement->bindParam(':Usuario',$Usuario);
        $statement->bindParam(':Paswor',$Passwor);
        $statement->bindParam(':Perfil',$Perfil);
        $statement->bindParam(':Estado',$Estado);
        if($statement->execute()){
            echo"usuario registrado";
            header(location:'../pages/index.php')
        }else{
            echo"usuario no registrado";
            header(location:'../pages/agregar.php')
        }
    }
    //funcion para consultar usuarios
    public function getadmin(){

    }
    //funcion para listar por id especifico
    public function getidad($ID){

    }
    //funcion actualizar los datos del usuario
    public function updatead($id,$Nombre,$Apellido,$Usuario,$Passwor,$Estado)
    {

    }
    //funcion eliminar usuario
    public function deletead($ID){

    }
}
?>