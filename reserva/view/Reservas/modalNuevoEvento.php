<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reservar Sala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEvento" id="formEvento"  class="form-horizontal" method="POST">
		<div class="form-group">
			<label for="usu_nom" class="col-sm-12 control-label">Usuario</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="usu_nom" disabled id="usu_nom" value="<?php echo $_SESSION["usu_nom"] ?>" placeholder="Nombre del Evento" required/>
			</div>
		</div>	
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha</label>
      <div class="col-sm-10">
        <input type="text"  class="form-control" name="fecha_inicio" id="fecha_inicio">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" hidden class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
      </div>
    </div>
   
    <div class="form-group">
      <label for="fk_inicio" class="col-sm-12 control-label">Horario</label>
      <div class="col-sm-10">
      <select class="form-control" id="fk_inicio" name="fk_inicio">
     
									</select>
      </div>
    </div>
    <div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Horario Seleccionado</label>
			<div class="col-sm-10">
				<textarea  class="form-control" cols="1" rows="3" disabled name="seleccion" required id="seleccion" value="" placeholder=""></textarea>
        <textarea  hidden name="seleccionPost" required id="seleccionPost" ></textarea>
			</div>
     
		</div>
    <div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Descripción</label>
			<div class="col-sm-10">
				<textarea  class="form-control" cols="1" rows="1" name="evento" required id="evento" value="" placeholder=""></textarea>
			</div>
		</div>
  <div class="col-md-12" id="grupoRadio">
  
  <input type="radio" name="color_evento" id="orange" value="#FF5722" checked>
  <label for="orange" class="circu" style="background-color: #FF5722;"> </label>

  <input type="radio" name="color_evento" id="amber" value="#FFC107">  
  <label for="amber" class="circu" style="background-color: #FFC107;"> </label>

  <input type="radio" name="color_evento" id="lime" value="#8BC34A">  
  <label for="lime" class="circu" style="background-color: #8BC34A;"> </label>

  <input type="radio" name="color_evento" id="teal" value="#009688">  
  <label for="teal" class="circu" style="background-color: #009688;"> </label>

  <input type="radio" name="color_evento" id="blue" value="#2196F3">  
  <label for="blue" class="circu" style="background-color: #2196F3;"> </label>

  <input type="radio" name="color_evento" id="indigo" value="#9c27b0">  
  <label for="indigo" class="circu" style="background-color: #9c27b0;"> </label>

</div>


	   <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Guardar Evento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
 
	</form>
      
    </div>
  </div>
</div>