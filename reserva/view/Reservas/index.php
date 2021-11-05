<?php
/*CONFIGURACIONES Y MODELOS
  Variables Globales:
    $_SESSION["usu_id"]
    $_SESSION["usu_nom"]
    $_SESSION["rol_id"]
 */ 
  require_once("../../config/conexion.php"); 
  require_once('../../models/Evento.php');
  require_once('../../models/Fin.php');
  require_once('../../models/Inicio.php');

  //CHEQUEAR QUE LA SESSION ESTE CORRECTA SEGUN ID, NOMBRE Y ROL DEL USUARIO 
if(isset($_SESSION["usu_id"],$_SESSION["usu_nom"], $_SESSION["rol_id"])){

  $inicio = new Inicio();
  $horarioInicio= $inicio->get_inicio(); //OBTENEMOS TODOS LOS HORARIOS DE INICIO 

  $evento = new Evento();
  $datos= $evento->get_Evento();



$file = json_decode(json_encode($datos), false);


?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>

	<title>Reservar</title>
</head>
<body class="with-side-menu theme-side-madison-caribbean chrome-browser">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
   
			<header class="section-header">
			<div class="row">
    
  </div>
			</header>

			<div class="box-typical box-typical-padding">
				
					<div id="calendar"></div>
			</div>

		</div>
	</div>
	<!-- Contenido -->

<?php  
  include('modalNuevoEvento.php');
  include('modalEdit.php');
?>

	<?php require_once("../MainJs/js.php");?>
  <script type="text/javascript" src="../../public/js/moment.min.js"></script>	
<script type="text/javascript" src="../../public/js/fullcalendar.min.js"></script>
<script src='../../locales/es.js'></script>
<script type="text/javascript" src="reservas.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,
    droppable: false,

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
       
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);
      var fechaGet = start.format('DD-MM-YYYY')
      console.log(fechaGet);
      
      $.ajax({
            type: "GET",
            url: 'selectEvent.php',
            data: {fechaGet:fechaGet}}).done(function(lista_localidad){
        $("#fk_inicio").html(lista_localidad);
        var arra =[];
        $("#fk_inicio").on("change",function(){
          var id=$(this).val()//obtenemos el valor seleccionado en una variable
          $(`#fk_inicio option[value='${id}']`).prop("hidden",true);
          arra.push(id);
          $("#seleccion").html(`Horario:
          ${arra}
              `);
          $("#seleccionPost").val(arra);
          $("#seleccionPost").html(arra);
          
         
         })

     });
     
    },
      
    events: [
      <?php 
      foreach($file as $fila){ ?>
          {
          _id: '<?php echo $fila->id; ?>',
          title: '<?php echo $fila->inicio; ?>',
          start: '<?php echo $fila->fecha_inicio; ?>',
          end:   '<?php echo $fila->fecha_fin; ?>',
          color: '<?php echo $fila->color_evento; ?>',
          fk_usuario: '<?php echo $fila->fk_usuario; ?>'
          
          },
        <?php } ?>
       
    ],


//Eliminar Evento

eventRender: function(event, element) {
 
  element
      .find(".fc-content")
      
      // .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
  
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: '../reservaListado.php?op=edit',
            data: {id:event._id},
            success: function(datos)
            {

            }
        });
      }
    });
  },

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    $("#modalEdit").modal();
    $.ajax({
            type: "POST",
            url: `../../controllers/reservaListado.php?op=edit&id=${idEvento}`,
            data: {id:event._id},
            success: function(datos)
            {
              console.log(datos)
              $('input[name=reservado').val(datos).prop('disabled', true);;
    $('input[name=fk_inicio').val(event.title).prop('disabled', true);
    
            }
        });


    $("#modalEdit").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>

</body>
</html>
<?php
}else{
  header("Location: ../../../index.php");
}


?>
