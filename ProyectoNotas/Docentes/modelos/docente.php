<?php
include_once('../../conexion.php');
class Docente extends conexion{
    public function __construct(){
        $this->db=parent::__construct();
    }


    //funcion para registrar usuarios
    public function addDoce ($NombreDoc,$ApellidoDoc,$DocumentoDoc,$CorreoDoc,$MateriaDoc,$Perfil,$Estado)
    {   

        //crear la sentencia sql
        $statement=$this->db->prepare("insert into docente (NombreDoc,ApellidoDoc,DocumentoDoc,CorreoDoc,
        MateriaDoc,PerfilDoc,EstadoDoc)VALUES(:NombreDoc,:ApellidoDoc,:DocumentoDoc,:CorreoDoc,:MateriaDoc,:PerfilDoc,:EstadoDoc)");
        $statement->bindParam(':NombreDoc',$NombreDoc);
        $statement->bindParam(':ApellidoDoc',$ApellidoDoc);
        $statement->bindParam(':DocumentoDoc',$DocumentoDoc);
        $statement->bindParam(':CorreoDoc',$CorreoDoc);
        $statement->bindParam(':MateriaDoc',$MateriaDoc);
        $statement->bindParam(':PerfilDoc',$Perfil);
        $statement->bindParam(':EstadoDoc',$Estado);
        
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
    $statement=$this->db->prepare("SELECT* from docente where PerfilDoc=docente");
    $statement->execute();
    while($result->statement->fetch()){
        $row[]=$result;
    }
   return $row;
}
//funcion para listar por id especifico
public function getidad($IDdoc){
    $row=null;
    $statement=$this->db->prepare("SELECT * from docente where id_docente=:ID and PerfilDoc='docente'");
    $statement->bindParam(':IDdoc',$IDdoc);
    $statement->execute();
    while($result->$statement->fetch()){
        $row[]=$result;
    }
}
    //funcion actualizar los datos del usuario
    public function updatead($ID,$NombreDoc,$ApellidoDoc,$DocumentoDoc,$CorreoDoc,$MateriaDoc,$PerfilDoc,$EstadoDoc)
    {
        $statement=$this->bd->prepare("UPDATE docente SET NombreDoc=:NombreDoc,
        Apellido=:Apellido,
        Usuario=:Usuario,
        Passwor=:Passwor,
        Estado=:Estado WHERE id_usuario=$ID");
        $statement->bindParam(':IDdoc',$IDdoc);
        $statement->bindParam(':NombreDoc',$Nombre);
        $statement->bindParam(':ApellidoDoc',$Apellido);
        $statement->bindParam(':DocumentoDoc',$DocumentoDoc);
        $statement->bindParam(':CorreoDoc',$CorreoDoc);
        $statement->bindParam(':MateriaDoc',$MateriaDoc);
        $statement->bindParam(':PerfilDoc',$Perfil);
        $statement->bindParam(':EstadoDoc',$Estado);
        
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
       
        $statement=$this->db->prepare("DELETE FROM docente WHERE id_docente=:IDdoc");
        $statement->bindParam(':IDdoc',$IDdoc);
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