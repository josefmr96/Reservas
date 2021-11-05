<?php
//CONFIGURACIONES Y MODELOS
    require_once("../config/conexion.php");
    require_once("../models/Evento.php");
//INSTANCIAS DE CLASES
    $evento = new Evento();

    switch($_GET["op"]){ //operador

        case "listar": //listado de EVENTOS en grilla
            $sessionId =$_SESSION["usu_id"]; //OBTENEMOS EL ID DE LA SESSION PARA FILTRAR LOS EVENTOS POR USUARIOS 
       
            $datos=$evento->get_evento_x_usuario($sessionId); //obtener todos los EVENTOS
           
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["evento"];
                $sub_array[] = $newDate = date("d/m/Y", strtotime($row["fecha_inicio"]));
                $sub_array[] = $row["inicio"];
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "eliminar": //Eliminar EVENTOS
            $evento->delete_evento($_POST["id"]);
        break;

 case "edit":
           $datos= $evento->get_usuario_x_evento($_GET["id"]);
           foreach($datos as $row) //Llenar datos de modal
           {
               $output= $row["usu_nom"];

           }
           echo json_encode($output); //pasar datos a formato json
        
        break;

    

   

   
 
    }
?>