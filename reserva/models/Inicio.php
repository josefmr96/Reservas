<?php

class Inicio extends Conectar{

    public function get_inicio(){ //OBTENEMOS TODOS LOS HORARIOS DE INICIO
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT *  FROM inicio;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
    public function get_idInicio_forInsert($idInicio){ //OBTENEMOS EL ID DEL HORARIO DE INICIO EL CUAL VA SER INSERTADO EN EL EVENTO 
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" SELECT idInicio FROM inicio  WHERE inicio = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idInicio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }  
    public function get_horario_not_select($idInicio){ //OBTENEMOS EL ID DEL HORARIO DE INICIO EL CUAL VA SER INSERTADO EN EL EVENTO 
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" SELECT  * 
            FROM inicio WHERE NOT idInicio  = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idInicio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function get_horario_by_id($idInicio){ //OBTENEMOS EL ID DEL HORARIO DE INICIO EL CUAL VA SER INSERTADO EN EL EVENTO 
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  *
        FROM 
              inicio WHERE idInicio  = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idInicio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }

}

?>