<?php
date_default_timezone_set("America/Argentina/Buenos_Aires"); //TIMEZONE
setlocale(LC_ALL,"es_ES");

//IMPORTS CON CONFIGURACIONES
require_once("../config/conexion.php"); 
require_once('../models/Evento.php');
require_once('../models/Inicio.php');
require_once('../models/Fin.php');

//INSTANCIAS DE CLASES
$eventoInsert = New Evento();
$inicio = new Inicio();
$finFindId = new Fin();

//DATOS RECIBIDOS POR POST
$fk_usuario            =$_SESSION["usu_id"];
$f_inicio          = $_REQUEST["fecha_inicio"];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 
$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];
$eventoDescripcion      = $_REQUEST['evento'];
$horarioSeleccionado = $_REQUEST['seleccionPost'];
$array = explode(",", $horarioSeleccionado); //convertimos el string recibido con las horas a array
$i=0;
while($i < count($array)){
    $idhorarios=$inicio->get_idInicio_forInsert($array[$i]); //iteramos sobre el array para buscar el id de cada horario seleccionado
    $idArr= array_unique($idhorarios[0]); //separamos el array en un solo valor (eliminando el duplicado)
    $fk_horarioInsert=implode("",$idArr); //pasamos el array  a string
    //creamos los registros segun $i
    $eventoInsert->insert_evento($fk_usuario, $color_evento,$fecha_inicio, $fecha_fin,$horarioSeleccionado,$eventoDescripcion,intval($fk_horarioInsert));
     $i++;

    
    

}




// header("Location: ../view/Reservas/index.php");

?>