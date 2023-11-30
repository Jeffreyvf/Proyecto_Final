<?php

class ControladorCliente{
	/*=============================================
	REGISTRO DE CLIENTE
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevaRazon"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaRazon"])){

			  
	
				$tabla = "cliente";

			
				$datos = array("razon" => $_POST["nuevaRazon"],
					           "nit" => $_POST["nuevoNit"],
					           "telefono"=> $_POST["nuevoTelefono"]);

				$respuesta = ModeloCliente::mdlIngresarCliente($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El cliente ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "clientes";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "clientes";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR CLIENTE
	=============================================*/

	static public function ctrMostrarCliente($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloCliente::MdlMostrarCliente($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarRazon"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRazon"])){

			

				$tabla = "cliente";


				$datos = array("razon" => $_POST["editarRazon"],
					           "nit" => $_POST["editarNit"],
					           "telefono"=> $_POST["editarTelefono"],
					           "cod_cliente"=>$_POST["idCliente"]);

				$respuesta = ModeloCliente::mdlEditarCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CLIENTE
	=============================================*/

	static public function ctrBorrarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="cliente";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloCliente::mdlBorrarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}


}
	


