<?php
include_once('../../conexion.php');

class Usuario extends conexion{
    public function __construct(){
    $this->db=parent::__construct();
}

public function login($Usuario,$Passwor){
    $statement= $this->db->prepare("select *from Usuarios where Usuario=:Usuario and Passwor=:Passwor");
    $statement->bindParam(':Usuario',$Usuario);
    $statement->bindParam(':Passwor',$Passwor);
    $statement->execute();
    if($statement->rowCount()==1){
        $result=$statement->fetch();
        $_SESSION['usuario']=$result['Nombre']." ".$result['Apellido'];
        $_SESSION['id']=$result['id_usuario'];
        $_SESSION['perfil']=$result['Perfil'];
        $_SESSION['start']=time();
        $_SESSION['expire']= $_SESSION['start']+(1*60);
        return true;
    }else{
        return false;
    }
}

public function validarsesion(){
if($_SESSION['id']==null){
    echo"<script>alert('datos incorrectos');window.location='../../index.php'</script>";
}
$now=time();
if($now>$_SESSION['expire']){
    session_destroy();
    echo"<script>alert('Debe ingresar nuevamente');window.location='../../index.php'</script>";
}
}
public function cerrarsesion(){
session_start();
session_destroy();
echo"<script>alert('Confirma el cierre de sesion');window.location='../../index.php'</script>";
}
public function validarroles(){

}
}
?>