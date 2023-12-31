<?php
include_once('../../conexion.php');
class Administrador extends conexion{
    public function __construct(){
        $this->db=parent::__construct();
    }
    //funcion para registrar usuarios
    public function addadmi ($Nombre,$Apellido,$Usuario,$Passwor,$Perfil,$Estado)
    {
        $hashedPassword = password_hash($Passwor, PASSWORD_DEFAULT);
        //crear la sentencia sql
        $statement=$this->db->prepare("insert into Usuarios (Nombre,Apellido,Usuario,Passwor,Perfil,
        Estado)VALUES(:Nombre,:Apellido,:Usuario,:Passwor,:Perfil,:Estado)");
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Apellido',$Apellido);
        $statement->bindParam(':Usuario',$Usuario);
        $statement->bindParam(':Passwor',$hashedPassword);
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
    $resultset=[];
    $sql = "SELECT * FROM usuarios WHERE Perfil='Administrador' OR Perfil='Docente'";
    $result = $this->db->query($sql);
    if($result->rowCount()>0){
         while($row=$result->fetch()){
        $resultset[]=$row;
    }
  
    }
    return $resultset;
}
//funcion para listar por id especifico
public function getidad($ID){
    
    $statement=$this->db->prepare("SELECT * from Usuarios where id_usuario=:ID");
    $statement->bindParam(':ID',$ID);
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
    //funcion actualizar los datos del usuario
    public function updatead($ID,$Nombre,$Apellido,$Usuario,$Passwor,$Estado)
    {
        $statement=$this->db->prepare("UPDATE usuarios SET Nombre=:Nombre,
        Apellido=:Apellido,
        Usuario=:Usuario,
        Passwor=:Passwor,
        Estado=:Estado WHERE id_usuario=:ID");
        $statement->bindParam(':ID',$ID);
        $statement->bindParam(':Nombre',$Nombre);
        $statement->bindParam(':Apellido',$Apellido);
        $statement->bindParam(':Usuario',$Usuario);
        $statement->bindParam(':Passwor',$Passwor);
        $statement->bindParam(':Estado',$Estado);
        if($statement->execute())
        {
            header('location: ../pages/index.php');
            session_start();
            $_SESSION['alerta']='<div id="alerta"class="alert alert-success" role"alert">Usuario '.$Usuario.' actualizado</div>';
        }else{
            echo "el usuario no";
            header('location: ../pages/editar.php');
        }
    }
    //funcion eliminar usuario
    public function deletead($ID){
       
        $statement=$this->db->prepare("DELETE FROM usuarios WHERE id_usuario=:ID");
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            echo "usuario eliminado";
            header('location: ../pages/index.php');
            session_start();
            $_SESSION['alerta']='<div id="alerta"class="alert alert-danger" role"alert">Usuario Eliminado</div>';
        }else{
            echo "error no se puede eliminar";
            header ('location: ../pages/eliminar.php');
        }
    }
}
?>