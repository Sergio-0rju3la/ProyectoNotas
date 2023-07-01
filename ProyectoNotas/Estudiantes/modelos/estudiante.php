<?php
include_once('../../conexion.php');
class Estudiante extends conexion{
    public function __construct(){
        $this->db=parent::__construct();
    }


    //funcion para registrar usuarios
    public function addEst ($NombreEst,$ApellidoEst,$DocumentoEst,$CorreoEst,$MateriaEst,$DocenteEst,$PromedioEst,$fecha)
    {   

        //crear la sentencia sql
        $statement=$this->db->prepare("insert into estudiante (NombreEst,ApellidoEst,DocumentoEst,CorreoEst,
        MateriaEst,DocenteEst,PromedioEst,Fecha_registro)VALUES(:NombreEst,:ApellidoEst,:DocumentoEst,:CorreoEst,
        :MateriaEst,:DocenteEst,:PromedioEst,:Fecha_registro)");
        $statement->bindParam(':NombreEst',$NombreEst);
        $statement->bindParam(':ApellidoEst',$ApellidoEst);
        $statement->bindParam(':DocumentoEst',$DocumentoEst);
        $statement->bindParam(':CorreoEst',$CorreoEst);
        $statement->bindParam(':MateriaEst',$MateriaEst);
        $statement->bindParam(':DocenteEst',$DocenteEst);
        $statement->bindParam(':PromedioEst',$PromedioEst);
        $statement->bindParam(':Fecha_registro',$fecha);
        
        if($statement->execute()){
            echo"usuario registrado";
            header('Location: ../../Administrador/pages/index.php');
        }else{
            echo"usuario no registrado";
            header('Location: ../pages/agregar.php');
        }
    }
//funcion para consultar usuarios
public function getadmin(){
    $resultset=[];
    $sql = "SELECT * FROM estudiante ";
    $result = $this->db->query($sql);
    if($result->rowCount()>0){
         while($row=$result->fetch()){
        $resultset[]=$row;
    }
  
    }
    return $resultset;
}
//funcion para listar por id especifico
public function getidad($IDest){
    $statement=$this->db->prepare("SELECT * from Estudiante where id_estudiante=:IDest");
    $statement->bindParam(':IDest',$IDest);
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
    //funcion actualizar los datos del usuario
    public function updatead($IDest,$NombreEst,$ApellidoEst,$DocumentoEst,$CorreoEst,$MateriaEstt,$DocenteEst,$PromedioEst,$fecha)
    {
        $statement=$this->db->prepare("UPDATE estudiante SET NombreEst=:NombreEst,
        ApellidoEst=:ApellidoEst,
        DocumentoEst=:DocumentoEst,
        CorreoEst=:CorreoEst,
        MateriaEst=:MateriaEst,
        DocenteEst=:DocenteEst,
        PromedioEst=:PromedioEst,
        Fecha_registro=:fecha WHERE id_estudiante=:IDest");
        $statement->bindParam(':IDest',$IDest);
        $statement->bindParam(':NombreEst',$NombreEst);
        $statement->bindParam(':ApellidoEst',$ApellidoEst);
        $statement->bindParam(':DocumentoEst',$DocumentoEst);
        $statement->bindParam(':CorreoEst',$CorreoEst);
        $statement->bindParam(':MateriaEst',$MateriaEst);
        $statement->bindParam(':DocenteEst',$DocenteEst);
        $statement->bindParam(':PromedioEst',$PromedioEst);
        $statement->bindParam(':fecha',$fecha);
        
        if($statement->execute())
        {
            header('Location: ../../Administrador/pages/index.php');
            session_start();
            $_SESSION['alerta']='<div id="alerta"class="alert alert-success" role"alert">El estudiante de id '.$IDest.' ha sido actualizado</div>';
        }else{
            echo "el usuario no";
            header('Location: ../../Administrador/pages/editar.php');
        }
    }
    //funcion eliminar usuario
    public function deletead($IDest){
       
        $statement=$this->db->prepare("DELETE FROM estudiante WHERE id_Estudiante=:IDest");
        $statement->bindParam(':IDest',$IDest);
        if($statement->execute()){
            echo "usuario eliminado";
            header('location: ../../Administrador/pages/index.php');
            session_start();
            $_SESSION['alerta']='<div id="alerta"class="alert alert-danger" role"alert">Estudiante eliminado</div>';
        }else{
            echo "error no se puede eliminar";
            header ('location: ../pages/eliminar.php');
        }
    }
}
?>