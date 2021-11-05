<nav class="side-menu">
	<?php if($_SESSION["rol_id"]== 1){ ?>
	<ul class="side-menu-list">
		<li class="blue-dirty">
			<a href="..\Reservas\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Inicio</span>
			</a>
		</li>
		<li class="blue-dirty">
			<a href="..\MisReservas\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Mis Reservas</span>
			</a>
		</li>
	
	</ul>
	<?php }else{ ?>
		<ul class="side-menu-list">
		<li class="blue-dirty">
			<a href="..\Reservas\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Inicio</span>
			</a>
		</li>
		<li class="blue-dirty">
			<a href="..\MntUsuario\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Gestionar Usuarios</span>
			</a>
		</li>
		<li class="blue-dirty">
			<a href="..\MisReservas\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Mis Reservas</span>
			</a>
		</li>
	
	</ul>
	<?php }?>

</nav>