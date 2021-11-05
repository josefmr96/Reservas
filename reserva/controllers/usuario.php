<?php
//CONFIGURACIONES Y MODELOS
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
//INSTANCIAS DE CLASES 
    $usuario = new Usuario();

    switch($_GET["op"]){ //operador
        case "guardaryeditar": //en caso de que sea guardar o editar
            if(empty($_POST["usu_id"])){     //si viene vacio el id se inserta
                $usuario->insert_usuario(
                    $_POST["usu_nom"],
                    $_POST["usu_pass"],
                    $_POST["rol_id"]);     
            }
            else {
                $usuario->update_usuario( //caso contrario se actualiza el usuario seleccionado
                    $_POST["usu_id"],
                    $_POST["usu_nom"],
                    $_POST["usu_pass"],
                    $_POST["rol_id"]);
            }
        break;

        case "listar": //listado de usuarios en grilla
            $datos=$usuario->get_usuario(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["usu_nom"];

                if ($row["rol_id"]=="1"){// si el rol es igual a 1 es un usuario
                    $sub_array[] = '<span class="label label-pill label-success">Usuario</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-info">Administrador</span>';
                }
                    //botones dinamicos para Editar y elimnar
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "eliminar": //Eliminar usuarios
            $usuario->delete_usuario($_POST["usu_id"]);
        break;

        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
            $datos=$usuario->get_usuario_x_id($_POST["usu_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row) //Llenar datos de modal
                {
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["rol_id"] = $row["rol_id"];
                }
                echo json_encode($output); //pasar datos a formato json
            }   
        break;


    

   

   
 
    }
?>