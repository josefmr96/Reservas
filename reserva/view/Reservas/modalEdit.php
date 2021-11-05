<div class="modal" id="modalEdit"  tabindex="-1" role="dialog">
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
			<label for="reservado" class="col-sm-12 control-label">Reservado por:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="reservado"  id="reservado"/>
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
      <input type="text" class="form-control" id="fk_inicio" name="fk_inicio">
     
		
      </div>
    </div>
    
   


		
	   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
	</form>
      
    </div>
  </div>
</div>