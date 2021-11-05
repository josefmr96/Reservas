<?php
                                                                //** MODELO DE CLASE EVENTO */
class Evento extends Conectar{

    public function get_Evento(){ //OBTENEMOS TODOS LOS EVENTOS 
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT eventoscalendar.id,
        eventoscalendar.color_evento,
        eventoscalendar.fecha_inicio,
        eventoscalendar.fecha_fin,
        eventoscalendar.fk_inicio,
        eventoscalendar.fk_usuario,
        inicio.inicio
        FROM  eventoscalendar
        INNER JOIN inicio ON eventoscalendar.fk_inicio = inicio.idInicio;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
    public function insert_evento( //CREACION DE  NUEVO EVENTO
        $fk_usuario,
        $color_evento,
        $fecha_inicio,
        $fecha_fin,
        $inicio, 
        $evento,
        $fk_inicio){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO eventoscalendar (id,fk_usuario,color_evento,fecha_inicio,fecha_fin,inicio, evento,fk_inicio)
        VALUES (NULL,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_usuario);
        $sql->bindValue(2, $color_evento);
        $sql->bindValue(3, $fecha_inicio);
        $sql->bindValue(4, $fecha_fin);
        $sql->bindValue(5, $inicio);
        $sql->bindValue(6, $evento);
        $sql->bindValue(7, $fk_inicio);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function select_by_date($fecha_inicio){ //OBTENEMOS EVENTOS FILTRADOS POR FECHA
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  *

        FROM eventoscalendar
        INNER JOIN inicio ON eventoscalendar.fk_inicio =inicio.idInicio
        WHERE fecha_inicio = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fecha_inicio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function get_evento_x_usuario($fk_usuario){ //OBTENEMOS TODOS LOS EVENTOS FILTRADO POR EL USUARIO QUE LOS CREO 
        $conectar= parent::conexion();
        parent::set_names();    
        $sql="SELECT eventoscalendar.id,
           eventoscalendar.evento,
        eventoscalendar.color_evento,
        eventoscalendar.fecha_inicio,
        eventoscalendar.fecha_fin,
        eventoscalendar.fk_inicio,
        eventoscalendar.inicio as horario,
        eventoscalendar.fk_usuario,
        inicio.inicio
        FROM  eventoscalendar
        INNER JOIN inicio ON eventoscalendar.fk_inicio = inicio.idInicio
        WHERE fk_usuario = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_usuario);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }   
    public function get_usuario_x_evento($id){ //OBTENEMOS TODOS LOS EVENTOS FILTRADO POR EL USUARIO QUE LOS CREO 
        $conectar= parent::conexion();
        parent::set_names();    
        $sql="SELECT eventoscalendar.fk_usuario,
        eventoscalendar.id,
        tm_usuario.usu_nom FROM eventoscalendar
        INNER JOIN tm_usuario ON eventoscalendar.fk_usuario = tm_usuario.usu_id
        WHERE id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_evento($id){ //ELIMINAR EVENTO
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM eventoscalendar WHERE  id=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>