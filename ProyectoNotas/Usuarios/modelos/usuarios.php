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

public function login($Usuario, $Passwor)
  {
    $statement = $this->db->prepare("SELECT * FROM usuarios WHERE Usuario = ?");
    $statement->execute([$Usuario]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($Passwor, $user['Passwor'])) // Utilizamos el hash almacenado en la base de datos
    {
      //iniciar sesión
      $_SESSION['id_usuario'] = $user['id_usuario'];
      $_SESSION['username'] = $user['Usuario'];
      $_SESSION['role'] = $user['Perfil'];
      $_SESSION['validar'] = true;
      $_SESSION['nombre'] = $user['Nombre'] . ' ' . $user['Apellido'];
    }
  }

public function validarsesion(){
if($_SESSION['id_usuario']){
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
return isset($_SESSION['id_usuario']);
}
public function isAdmin(){
    return $this->loggedIn() && $_SESSION['role'] ==='Administrador';
}
public function isdocente(){
    return $this->loggedIn() && $_SESSION['role']=== 'Docente';
}
}
?>