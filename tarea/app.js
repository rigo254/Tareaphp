$(document).ready(function() {
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
});
