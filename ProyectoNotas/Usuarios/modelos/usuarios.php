<?php
include_once('../../conexion.php');
session_start();
class Usuario extends conexion{

    private $loggedIn= false;
    private $isAdmin= false;
    private $isdocente= false;

public function __construct(){
    $this->db=parent:: __construct();
}

public function login($Usuario,$Passwor){
    $statement= $this->db->prepare("SELECT *from Usuarios where usuario=?");
    $statement->execute($Usuario);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($Passwor, $user['passwor'])){
        $_SESSION['user_id'] =$user['id_usuario'];
        $_SESSION['username'] =$user['Usuario'];
        $_SESSION['role'] =$user['Perfil'];
        $_SESSION['validar'] =true;
        $_SESSION['NOMBRE'] =$user['Nombre']." ".$user['Apellido'];
        return true;
    }else{
        return false;
    }
}

public function validarsesion(){
if($_SESSION['user_id']){
    if(!isset($_SESSION['start'])){
        $_SESSION['start']= time();
    }else if(time()- $_SESSION['start']>60){
        session_destroy();
        echo "<script>alert('Cierre de sesion por inactividad');window.location='../../index.php';</script>";
        $_SESSION['validar']==false;
    }
    $_SESSION['start']=time();
}
}
public function cerrarsesion(){
    session_unset();
    session_destroy();
}
public function validarroles(){

}
public function loggedIn(){
return isset($SESSION['user_id']);
}
public function isAdmin(){
    return $this->loggedIn() && $_SESSION['role'] ==='Administrador';
}
public function isdocente(){
    return $this->loggedIn() && $_SESSION['role']=== 'Docente';
}
}
?>