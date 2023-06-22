<?php
include_once('../../conexion.php');
class Administrador extends conexion{
    public function __construct(){
        $this->db=parent::__construct();
    }
    //funcion para registrar usuarios
    public function addadmi ($Nombre,$Apellido,$Usuario,$Passwor,$Perfil,$Estado)
    {
        //crear la sentencia sql
        $statement=$this->db->prepare("insert into Usuarios (Nombre,Apellido,Usuario,Passwor,Perfil,
        Estado)VALUES(:Nombre,:Apellido,:Usuario,:Passwor,:Perfil,:Estado)");
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Apellido',$Apellido);
        $statement->bindParam(':Usuario',$Usuario);
        $statement->bindParam(':Passwor',$Passwor);
        $statement->bindParam(':Perfil',$Perfil);
        $statement->bindParam(':Estado',$Estado);
        if($statement->execute()){
            echo"usuario registrado";
            header('Location: ../pages/index.php');
        }else{
            echo"usuario no registrado";
            header('Location: ../pages/agregar.php');
        }
    }
//funcion para consultar usuarios
public function getadmin(){
    $row=null;
    $statement=$this->db->prepare("SELECT* from Usuarios where Perfil=Administrador");
    $statement->execute();
    while($result->statement->fetch()){
        $row[]=$result;
    }
   return $row;
}
//funcion para listar por id especifico
public function getidad($ID){
    $row=null;
    $statement=$this->db->prepare("SELECT * from Usuarios where id_usuario=:ID and Perfil='Administrador'");
    $statement->bindParam(':ID',$ID);
    $statement->execute();
    while($result->$statement->fetch()){
        $row[]=$result;
    }
}
    //funcion actualizar los datos del usuario
    public function updatead($ID,$Nombre,$Apellido,$Usuario,$Passwor,$Estado)
    {
        $statement=$this->bd->prepare("UPDATE usuarios SET Nombre=:Nombre,
        Apellido=:Apellido,
        Usuario=:Usuario,
        Passwor=:Passwor,
        Estado=:Estado WHERE id_usuario=$ID");
        $statement->bindParam(':ID',$ID);
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Apellido',$Apellido);
        $statement->bindParam(':Usuario',$Usuario);
        $statement->bindParam(':Passwor',$Passwor);
        $statement->bindParam(':Estado',$Estado);
        if($statement->execute())
        {
            header('location: ../pages/index.php');
        }else{
            echo "el usuario no";
            header('location: ../pages/editar.php');
        }
    }
    //funcion eliminar usuario
    public function deletead($ID){
       
        $statement=$this->db->prepare("DELETE FROM usuarios WHERE id_usuarios=:ID");
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            echo "usuario eliminado";
            header('location: ..pages/index.php');

        }else{
            echo "error no se puede eliminar";
            header ('location: ../pages/eliminar.php');
        }
    }
}
?>