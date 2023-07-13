<?php
include_once('../../conexion.php');
class Materia extends conexion{
    public function __construct(){
        $this->db=parent::__construct();
    }


    //funcion para registrar usuarios
    public function addMate ($Materia)
    {   

        //crear la sentencia sql
        $statement=$this->db->prepare("insert into materias (Materia)VALUES(:Materia)");
        $statement->bindParam(':Materia',$Materia);
        
        if($statement->execute()){
            echo"usuario registrado";
            header('Location: ../../Administrador/pages/index.php');
        }else{
            echo"usuario no registrado";
            header('Location: ../pages/agregar.php');
        }
    }
//funcion para consultar usuarios SIN MODIFICAR
public function getadmin(){
    $resultset=[];
    $sql = "SELECT * FROM materias";
    $result = $this->db->query($sql);
    if($result->rowCount()>0){
         while($row=$result->fetch()){
        $resultset[]=$row;
    }
  
    }
    return $resultset;
}
//funcion para listar por id especifico
public function getidad($IDmat){
    
    $statement=$this->db->prepare("SELECT * from materias where id_materia=:IDmat");
    $statement->bindParam(':IDmat',$IDmat);
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
    //funcion actualizar los datos del usuario
    public function updatead($IDmat,$Materia)
    {
        $statement=$this->db->prepare("UPDATE materias SET Materia=:Materia WHERE id_materia=:IDmat");
        $statement->bindParam(':IDmat',$IDmat);
        $statement->bindParam(':Materia',$Materia);
        
        if($statement->execute())
        {
            header('location: ../../Administrador/pages/index.php');
            session_start();
            $_SESSION['alerta']='<div id="alerta"class="alert alert-success" role"alert">La materia de id '.$IDmat.' ha sido actualizada</div>';
        }else{
            echo "el usuario no";
            header('location: ../pages/editar.php');
        }
    }
    //funcion eliminar usuario
    public function deletead($IDmat){
       
        $statement=$this->db->prepare("DELETE FROM materias WHERE id_materia=:IDmat");
        $statement->bindParam(':IDmat',$IDmat);
        if($statement->execute()){
            echo "usuario eliminado";
            header('location: ../../Administrador/pages/index.php');
            session_start();
            $_SESSION['alerta']='<div id="alerta"class="alert alert-danger" role"alert">Materia eliminada</div>';
        }else{
            echo "error no se puede eliminar";
            header ('location: ../pages/eliminar.php');
        }
    }
}
?>