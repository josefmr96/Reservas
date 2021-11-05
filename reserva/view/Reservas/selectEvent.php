<?php
  require_once("../../config/conexion.php"); 
  require_once('../../models/Evento.php');
  require_once('../../models/Inicio.php');
 


function select(){
    
$inicio = new Inicio();
$evento = new Evento();

$originalDate = $_GET["fechaGet"] ;
$newDate = date("Y/m/d", strtotime($originalDate));

$datos = $evento->select_by_date($newDate);  
$aInicio= $inicio->get_inicio();

    if($datos){
      echo '<option disabled selected >Seleccionar</option>';
      $horario = [];
  foreach($datos as $row){
      array_push($horario,$row["idInicio"]);
      

     }
     $arryHoras=[];
  foreach ($aInicio as $inicio){
    array_push($arryHoras,$inicio["idInicio"]);
   
          }
          $resultado = array_diff($arryHoras, $horario);
          
  foreach($aInicio as $ini){
  
 

      
      if(array_search($ini["idInicio"], $resultado)){
        echo $listas = '<option value='.$ini["inicio"].' >'.$ini["inicio"].'</option>';
      }
  

            // if($ini["idInicio"] == $resultado[3]){$ini["idInicio"],
            //   $i++;
            // }else{
            //  
            //   $i++;
            // }

          }
    //   while($i < count($aInicio)){
    //     $i++;
    //     if($inicio["idInicio"]==$horario[$i]){
         
    //     }else{
    //     
    //     }
 
 
 
      

    // }
    
    
    }
    
    
    
    else{
      echo '<option disabled selected >Seleccionar</option>';
      foreach ($aInicio as $inicio){
        echo $listas = '<option value='.$inicio["inicio"].' >'.$inicio["inicio"].'</option>';
      }
    }
   



}
echo select();


