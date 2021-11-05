<?php

class Fin extends Conectar{

    public function get_fin(){ //OBTENENER TODOS LOS HORARIOS DE FIN
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT *  FROM fin;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }  
    public function get_idFin_forInsert($idFin){ //CREAR NUEVO HORARIO DE FIN POR ID OBTENEDO EN EL EVENTO
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" SELECT idFin FROM fin  WHERE fin = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idFin);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
      public function get_fin_between($inicio, $fin){ //OBTENEMOS LAS FECHAS DE FIN DENTRO DE RANGO SELECCIONADO ENTRE INICIO Y FINAL 
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  fin FROM fin
        WHERE fin BETWEEN  ? AND ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $inicio);
            $sql->bindValue(2, $fin);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
     public function get_fin_br($fin){ //OBTENEMOS LOS HORARIOS DE FIN QUE NO ESTEN REPETIDOS 
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" SELECT  * FROM fin
        WHERE NOT fin= ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fin);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
}

?>