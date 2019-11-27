<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />

		<title>Tareas</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
	<body>
		<div>
			<form method="get">
				<input type="text" name="buscar" />
				<input type="submit" value="Buscar" />
			</form>
		</div>
		<div class="container" id="optionsMedicos">
			<div class="row d-flex">
				<div class="col-lg-3 col-md-4 col-sm-2 mb-2">
					<input type="checkbox" onclick="listasTareas()" name="Listar" id="Listar" style="display: none;" />
					<label for="Listar" class="cardCustom education">
						<div class="overlayCustom"></div>
						<div class="circle">
							<i class="fas fa-users fa-4x"></i>
						</div>
						<p>Listar Tareas</p>
					</label>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-2 mb-2">
					<a class="cardCustom credentialing" data-toggle="modal" data-target="#AgregarTareas">
						<div class="overlayCustom"></div>
						<div class="circle">
							<i class="fas fa-user-plus fa-3x"></i>
						</div>
						<p>Agregar Tarea</p>
					</a>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-2 mb-2">
					<a class="cardCustom wallet">
						<div class="overlayCustom"></div>
						<div class="circle">
							<i class="fas fa-search fa-4x"></i>
						</div>
						<p>Buscar Tarea</p>
					</a>
				</div>
			</div>
		</div>

		<div style="display: none;" id="mostrar">
			<?php require "tareas.php" ?>
		</div>

		<!-- Modal Agregar Tareas -->
		<div
			class="modal fade"
			id="AgregarTareas"
			tabindex="-1"
			role="dialog"
			aria-labelledby="AgregarTareasLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times-circle"></i>
						</button>
						<h2 class="text-center mb-4">Agregar Tarea</h2>
						<form id="FrmTarea">
							<div class="form-group">
								<input name="nombre" class="form-control" placeholder="Nombre Tarea" required />
							</div>
							<div class="form-group">
								<label class="col-md-6 text-left">Fecha de tarea</label>
								<input name="fecha" type="date" class="form-control" required />
							</div>
							<div class="form-group">
								<label class="col-md-6 text-left">Hora de la tarea</label>
								<input name="hora" type="time" class="form-control" required />
							</div>
							<div>
								<center>
									<button type="submit" class="btn btn-primary">Agregar</button>
								</center>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/sweetalert2.all.min.js"></script>
		<script src="assets/js/all.min.js"></script>
		<script src="app.js"></script>
		<script>
			$(function() {
				$('[data-toggle="tooltip"]').tooltip();
			});

			function listasTareas() {
				var checked = document.getElementById('Listar').checked;

				if (checked == true) {
					document.getElementById('mostrar').style.display = 'block';
				} else {
					document.getElementById('mostrar').style.display = 'none';
				}
			}
		</script>
	</body>
</html>
