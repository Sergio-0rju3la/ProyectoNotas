<?php
include_once ('conexion.php');

class consulta extends conexion
{
    public function __construct(){
        $this->db=parent::__construct();
    }
    public function getmaterias(){
        $row = null;
        $statement = $this->db->prepare("SELECT * FROM materias");
        $statement->execute();
        while($result = $statement->fetch()){
            $row[]=$result;
        }
        return $row;
    }
    public function getdocente()
    {
        $sql = "SELECT * FROM docentes WHERE Perfil='Docente'";
        $result = $this->db->query($sql);
        if($result->rowCount()>0)
        {
            while($row = $result->fetch())
            {
                $vec[]=$row;
            }
        }
        return $vec;
    }
}

?>