$(document).ready(function() {
	ListarTareas();

	function CerrarFrmTareas() {
		$('#AgregarTareas').modal('hide'); //ocultamos el modal
		$('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
		$('.modal-backdrop').remove(); //eliminamos el backdrop del modal
	}

	$('#FrmTarea').submit((e) => {
		e.preventDefault();
		let postData = {};
		var form1Inputs = document.forms['FrmTarea'].getElementsByTagName('input');
		for (let i = 0; i < form1Inputs.length; i++) {
			postData[form1Inputs[i].name] = form1Inputs[i].value;
		}
		Swal.fire({
			title: '¿Estás seguro?',
			text: '¡No podrás revertir esto!',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Guardala',
		}).then((result) => {
			if (result.value) {
				url = 'Controlador/Insertartarea.php';
				$.post(url, postData, (response) => {
					if (response == 'full') {
						Swal.fire({
							icon: 'success',
							title: 'Se ha agregado exitosamente',
							showConfirmButton: false,
							timer: 1300,
						});
						CerrarFrmTareas();
						ListarTareas();
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Por favor llene todos los campos',
							showConfirmButton: false,
							timer: 1300,
						});
					}
				});
			}
		});
	});

	$(document).on('click', '.task-delete', (e) => {
		var elemento = document.getElementsByClassName('task-delete');
		var id = elemento[0].getAttribute('id');
		console.log(elemento, id);
		Swal.fire({
			title: 'Eliminar?',
			text: 'Deseas eliminar esta tarea?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Si, Borralo',
		}).then((result) => {
			if (result.value) {
				url = 'Controlador/Eliminartarea.php';
				$.post(url, { id }, (response) => {
					if (response == 'exito') {
						Swal.fire({
							title: 'Eliminado',
							text: 'Se ha borrado la tarea con éxito',
							icon: 'success',
							showConfirmButton: false,
							timer: 1200,
						});
					}
					ListarTareas();
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
				const Tareas = JSON.parse(response);
				let template = '';
				let templateR = '';
				Tareas.forEach((tarea) => {
					if (tarea.type == 'full') {
						template += `
							<tr>
								<td>${tarea.nombre}</td>
								<td>${tarea.fecha}</td>
								<td>${tarea.hora}</td>
								<td>${tarea.descripcion}</td>
								<td>${tarea.estado}</td>
								<td>
									<a data-toggle="tooltip" data-place="bottom" title="Modificar Tarea">
										<span style = "font-size: 1.5em; color: info; ">
											<i class = "fas fa-edit"> </i>
										</span>
									</a>
									<a  id="${tarea.id}"class="task-delete" data-toggle="tooltip" data-place="bottom" title="Eliminar Tarea">
										<span style = "font-size: 1.5em; color: red; ">
											<i class = "fas fa-trash-alt"> </i>
										</span>
									</a>
								</td>
							</tr>
						`;
						templateR += ``;
					} else {
						templateR += `<h3 class="text-center">No se encontraron tareas</h3>`;
					}
					$('#TablaTareas').html(template);
					$('#respuesta').html(templateR);
				});
			},
		});
	});

	function ListarTareas() {
		$.ajax({
			url: 'Controlador/Cargartareas.php',
			type: 'GET',
			success: function(response) {
				const Tareas = JSON.parse(response);
				let template = '';
				let templateR = '';
				Tareas.forEach((tarea) => {
					if (tarea.type == 'full') {
						template += `
							<tr>
								<td>${tarea.nombre}</td>
								<td>${tarea.fecha}</td>
								<td>${tarea.hora}</td>
								<td>${tarea.descripcion}</td>
								<td>${tarea.estado}</td>
								<td>
									<a data-toggle="tooltip" data-place="bottom" title="Modificar Tarea">
										<span style = "font-size: 1.5em; color: info; ">
											<i class = "fas fa-edit"> </i>
										</span>
									</a>
									<a  id="${tarea.id}"class="task-delete" data-toggle="tooltip" data-place="bottom" title="Eliminar Tarea">
										<span style = "font-size: 1.5em; color: red; ">
											<i class = "fas fa-trash-alt"> </i>
										</span>
									</a>
								</td>
							</tr>
						`;
						templateR += ``;
					} else {
						templateR += `<h3 class="text-center">No hay tareas</h3>`;
					}
					$('#TablaTareas').html(template);
					$('#respuesta').html(templateR);
				});
			},
		});
	}
});
