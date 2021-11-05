<?php
  require_once("../../config/conexion.php"); 
if(isset($_SESSION["usu_nom"])){
     ?>
<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php");?>
<title>Mis Reservas</title>
</head>
<body class="with-side-menu theme-side-madison-caribbean chrome-browser">

<?php require_once("../MainHeader/header.php");?>

<div class="mobile-menu-left-overlay"></div>

<?php require_once("../MainNav/nav.php");?>
<div class="page-content">
		<div class="container">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Mis Reservas</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Reservas">Inicio</a></li>
								<li class="active">Reservas Registradas</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					
				</p>

				<h5 class="m-t-lg with-border">Historial de Reservas</h5>
				<div class="box-typical box-typical-padding">
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Descripción</th>
							<th style="width: 10%;">Fecha</th>
							<th class="d-none d-sm-table-cell" style="width: 20%;">Horario</th>
							<th class="text-center" style="width: 2%;">Eliminar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

			</div>
		</div>
	</div>
	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="reservas.js"></script>
</body>
</html>
<?php }else{
      header("Location: ../../../index.php");}?>