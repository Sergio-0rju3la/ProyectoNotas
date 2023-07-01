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
    $row=null;
    $statement=$this->db->prepare("SELECT* from docente where PerfilDoc=docente");
    $statement->execute();
    while($result->statement->fetch()){
        $row[]=$result;
    }
   return $row;
}
//funcion para listar por id especifico
public function getidad($IDmat){
    $row=null;
    $statement=$this->db->prepare("SELECT * from materia where id_materia=:IDmat");
    $statement->bindParam(':IDmat',$IDmat);
    $statement->execute();
    while($result->$statement->fetch()){
        $row[]=$result;
    }
}
    //funcion actualizar los datos del usuario
    public function updatead($IDmat,$Materia)
    {
        $statement=$this->bd->prepare("UPDATE materia SET Materia=:Materia WHERE id_materia=$IDmat");
        $statement->bindParam(':IDmat',$IDmat);
        $statement->bindParam(':Materia',$Materia);
        
        if($statement->execute())
        {
            header('location: ../pages/index.php');
        }else{
            echo "el usuario no";
            header('location: ../pages/editar.php');
        }
    }
    //funcion eliminar usuario
    public function deletead($IDdoc){
       
        $statement=$this->db->prepare("DELETE FROM materia WHERE id_materia=:IDmat");
        $statement->bindParam(':IDmat',$IDmat);
        if($statement->execute()){
            echo "usuario eliminado";
            header('location: ../../Administrador/pages/index.php');

        }else{
            echo "error no se puede eliminar";
            header ('location: ../pages/eliminar.php');
        }
    }
}
?>