$(document).ready(function() {
	ListarTareas();
	let edit = false;

	function CerrarFrmTareas() {
		$('#AgregarTareas').modal('hide'); //ocultamos el modal
		$('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
		$('.modal-backdrop').remove(); //eliminamos el backdrop del modal
	}

	function AbrirFrmTareas() {
		$('#AgregarTareas').modal('show'); //ocultamos el modal
		$('body').addClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
		$('.modal-backdrop').add(); //eliminamos el backdrop del modal
	}

	$('#FrmTarea').submit((e) => {
		e.preventDefault();
		const postData = {
			id: $('#idTarea').val(),
			nombre: $('#nombre').val(),
			descripcion: $('#descripcion').val(),
			fecha: $('#fecha').val(),
			hora: $('#hora').val(),
		};
		let url, titulo;
		if (edit == false) {
			url = 'Controlador/Insertartarea.php';
			titulo = 'Se ha agregado exitosamente';
			boton = 'Si, Guardala';
		} else {
			url = 'Controlador/Actualizartarea.php';
			titulo = 'Se ha actualizado exitosamente';
			boton = 'Si, Actualizala';
		}
		Swal.fire({
			title: '¿Estás seguro?',
			text: '¡No podrás revertir esto!',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: boton,
		}).then((result) => {
			if (result.value) {
				$.post(url, postData, (response) => {
					if (response == 'full') {
						Swal.fire({
							icon: 'success',
							title: titulo,
							showConfirmButton: false,
							timer: 900,
						});
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Por favor llene todos los campos',
							showConfirmButton: false,
							timer: 900,
						});
					}
					quitarSeleccion();
				});
			}
		});
	});

	$('#buscar').keyup(function() {
		let buscar = $('#buscar').val();
		$.ajax({
			url: 'Controlador/Buscartareas.php',
			data: { buscar },
			type: 'POST',
			success: function(response) {
				listar(response);
			},
		});
	});

	function quitarSeleccion() {
		$('.modal-title').text('Agregar Tarea');
		$('#btnEnviar').text('Agregar Tarea');
		document.getElementById('FrmTarea').reset();
		CerrarFrmTareas();
		ListarTareas();
		edit = false;
	}

	function ListarTareas() {
		$.ajax({
			url: 'Controlador/Cargartareas.php',
			type: 'GET',
			success: function(response) {
				listar(response);
			},
		});
	}

	function listar(response) {
		const Tareas = JSON.parse(response);
		let template = '';
		let templateR = '';
		Tareas.forEach((tarea) => {
			if (tarea.type == 'full') {
				if (tarea.estado == 'Completado') {
					template += `
						<tr tareaId="${tarea.id}" >
							<td>${tarea.nombre}</td>
							<td>${tarea.fecha}</td>
							<td>${tarea.hora}</td>
							<td>${tarea.descripcion}</td>
							<td>${tarea.estado}</td>
							<td class="d-flex justify-content-center">
								<a id="${tarea.id}" class="task-delete">
									<i class="fas fa-trash-alt"></i>
								</a>
							</td>
						</tr>
					`;
				} else {
					template += `
						<tr tareaId="${tarea.id}" >
							<td>${tarea.nombre}</td>
							<td>${tarea.fecha}</td>
							<td>${tarea.hora}</td>
							<td>${tarea.descripcion}</td>
							<td>${tarea.estado}</td>
							<td class="d-flex justify-content-around">
								<a id="${tarea.id}" class="task-edit">
									<i class="fas fa-edit"></i>
								</a>
								<a id="${tarea.id}" class="task-delete">
									<i class="fas fa-trash-alt"></i>
								</a>
								<a id="${tarea.id}" class="task-comple">
									<i class="far fa-check-circle"></i>
								</a>
							</td>
						</tr>
					`;
				}
				templateR += ``;
			} else {
				templateR += `<h3 class="text-center">No hay tareas</h3>`;
			}
			$('#TablaTareas').html(template);
			$('#respuesta').html(templateR);
		});
	}

	$(document).on('click', '.task-delete', function() {
		let elemento = $(this)[0];
		let id = elemento.id;
		Swal.fire({
			title: '¿Estás seguro?',
			text: '¡No podrás revertir esto!',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Si, Borrala',
		}).then((result) => {
			if (result.value) {
				url = 'Controlador/Eliminartarea.php';
				$.post(url, { id }, (response) => {
					if (response == 'full') {
						ListarTareas();
						Swal.fire({
							icon: 'success',
							title: 'Se ha borrado corretamente',
							showConfirmButton: false,
							timer: 900,
						});
					}
				});
			}
		});
	});

	$(document).on('click', '.task-edit', function() {
		let elemento = $(this)[0];
		let id = elemento.id;
		url = 'Controlador/Cargartarea.php';
		$.post(url, { id }, (response) => {
			edit = true;
			let Tarea = JSON.parse(response);
			$('#idTarea').val(Tarea.id);
			$('#nombre').val(Tarea.nombre);
			$('#fecha').val(Tarea.fecha);
			$('#descripcion').val(Tarea.descripcion);
			$('#hora').val(Tarea.hora);
			$('.modal-title').text('Actualizar Tarea');
			$('#btnEnviar').text('Actualizar Tarea');
			AbrirFrmTareas();
		});
	});

	$(document).on('click', '.task-comple', function() {
		let elemento = $(this)[0];
		let id = elemento.id;
		Swal.fire({
			title: '¿Estás seguro de marcar como Completado?',
			text: '¡No podrás revertir esto!',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Marcala',
		}).then((result) => {
			if (result.value) {
				url = 'Controlador/Tareacompletada.php';
				$.post(url, { id }, (response) => {
					ListarTareas();
				});
			}
		});
	});
});
