<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxCliente{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "cod_cliente";
		$valor = $this->idCliente;

		$respuesta = ControladorCliente::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);

	}

	
}

/*=============================================
EDITAR CLIENTE
=============================================*/
if(isset($_POST["idCliente"])){

	$editar = new AjaxCliente();
	$editar -> idCliente = $_POST["idCliente"];
	$editar -> ajaxEditarCliente();

}


