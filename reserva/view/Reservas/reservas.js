
//** Previene que el envio del formulacion salga default */
function init(){
    $("#formEvento").on("submit",function(e){
        guardaryeditar(e);	
    });
}
//** Ejecuta el controllador nuevoEvento para:
//** Guardar */
//** Actualizar  */
//** Eliminar Eventos  */
function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#formEvento")[0]);
    swal({
        title: "Estas seguro de Agregar este Registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, Agregar!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "../../controllers/nuevoEvento.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){    
                swal({
                    title: "Evento Guardado!",
                    text: "Completado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
                window.location.href = "../Reservas"
            }
        }); 
    });
  
}
init();