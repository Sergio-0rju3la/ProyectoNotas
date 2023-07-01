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
public function getidad($IDdoc){
    $statement=$this->db->prepare("SELECT * from docente where id_docente=:ID");
    $statement->bindParam(':ID',$IDdoc);
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
    //funcion actualizar los datos del usuario
    public function updatead($IDdoc,$NombreDoc,$ApellidoDoc,$DocumentoDoc,$CorreoDoc,$MateriaDoc,$PerfilDoc,$EstadoDoc)
    {
        $statement=$this->db->prepare("UPDATE docente SET NombreDoc=:NombreDoc,
        ApellidoDoc=:ApellidoDoc,
        DocumentoDoc=:DocumentoDoc,
        CorreoDoc=:CorreoDoc,
        MateriaDoc=:MateriaDoc,
        PerfilDoc=:PerfilDoc,
        EstadoDoc=:EstadoDoc WHERE id_docente=:IDdoc");
        $statement->bindParam(':IDdoc',$IDdoc);
        $statement->bindParam(':NombreDoc',$NombreDoc);
        $statement->bindParam(':ApellidoDoc',$ApellidoDoc);
        $statement->bindParam(':DocumentoDoc',$DocumentoDoc);
        $statement->bindParam(':CorreoDoc',$CorreoDoc);
        $statement->bindParam(':MateriaDoc',$MateriaDoc);
        $statement->bindParam(':PerfilDoc',$PerfilDoc);
        $statement->bindParam(':EstadoDoc',$EstadoDoc);
        
        if($statement->execute())
        {
            header('Location: ../../Administrador/pages/index.php');
        }else{
            echo "el usuario no";
            header('Location: ../../Administrador/pages/editar.php');
        }
    }
    //funcion eliminar usuario
    public function deletead($IDdoc){
       
        $statement=$this->db->prepare("DELETE FROM docente WHERE id_docente=:IDdoc");
        $statement->bindParam(':IDdoc',$IDdoc);
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