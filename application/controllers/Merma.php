<?php
defined('BASEPATH') OR exit('No se permite el acceso directo.');

class Merma extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Merma_model');
	}

	public function getAll(){
		//if($this->session->userdata('login') == true){
			$res = $this->Merma_model->getAll();

			if($res != NULL){
				$respuesta = array();
				$respuesta['resultado'] = 'true';
				$respuesta['mensaje'] = 'Registros obtenidos con éxito';
				$respuesta['respuesta'] = $res;
				echo json_encode($respuesta);
			}
			else{
				$respuesta = array();
				$respuesta['resultado'] = 'false';
				$respuesta['mensaje'] = 'Hubo un error al obtener los registros';
				echo json_encode($respuesta);
			}

		//}
	}

	public function insert(){
		//if($this->session->userdata('login') == true){
			$this->form_validation->set_rules('fecha', 'fecha', 'required|htmlspecialchars|trim');
			$this->form_validation->set_rules('cantidad', 'cantidad', 'required|htmlspecialchars|trim');
			$this->form_validation->set_rules('idInsumo', 'idInsumo', 'required|htmlspecialchars|trim');
			if($this->form_validation->run()){
				$fecha = $this->input->post("fecha");
				$cantidad  = $this->input->post("cantidad");
				$idInsumo = $this->input->post("idInsumo");

				$data = array(
					"fecha" => $fecha,
					"cantidad" => $cantidad,
					"idInsumo" => $idInsumo
				);

				$mermaInsumo = $this->Merma_model->insert($data);

				if($mermaInsumo != NULL){
					$respuesta = array();
					$respuesta['resultado'] = 'true';
					$respuesta['mensaje'] = 'El registro se insertó correctamente';
					echo json_encode($respuesta);
				}
				else{
					$respuesta = array();
					$respuesta['resultado'] = 'false';
					$respuesta['mensaje'] = 'Hubo un error al insertar el registro';
					echo json_encode($respuesta);
				}
			}
			else{
				$this->form_validation->set_error_delimiters('','');
				$respuesta = array();
				$respuesta['resultado'] = 'false';
				$respuesta['mensaje'] = validation_errors();
				echo json_encode($respuesta);
			}
		//}
	}

	public function edit(){
		//if($this->session->userdata('login') == true){

			$respuesta = array();
			$respuesta['resultado'] = 'false';
			$respuesta['mensaje'] = 'Ocurrio un error durante la petición';
			$respuesta['respuesta'] = null;

			$this->form_validation->set_rules('idInsumo', 'idInsumo', 'trim|integer|max_length[11]|greater_than_equal_to[1]|required');
			$this->form_validation->set_rules('fecha', 'fecha', 'trim|integer|max_length[11]|greater_than_equal_to[1]|required');
			$this->form_validation->set_rules('cantidad', 'cantidad', 'required|htmlspecialchars|max_length[50]|trim');
			

			if($this->form_validation->run()/* &&  $this->input->is_ajax_request()*/){
				$idInsumo   	= $this->input->post("idInsumo");
				$fecha 	= $this->input->post("fecha");
				$cantidad    = $this->input->post("cantidad");

				//revisar que exista el registro
				$res = $this->Merma_model->getById($idInsumo); 

				if($res != NULL){
					$data = array(
						"fecha"  => $fecha,
						"idInsumo"   => $idInsumo,
						"cantidad" 		=> $cantidad
					);

					$is_affected = $this->Merma_model->update($data, $idInsumo);

					if($is_affected != NULL){
						$respuesta['resultado'] = 'true';
						$respuesta['mensaje'] = 'El registro se actualizó correctamente';
					}else{
						$respuesta['mensaje'] = 'No fue posible modificar el registro';
					}

				}

			}

            /*Si la validación de campos es incorrecta*/
            else {
            	$this->form_validation->set_error_delimiters('','');
				$respuesta['error'] = validation_errors();
            }
			
            echo json_encode($respuesta);

		//}
	}

	public function delete(){
		//if($this->session->userdata('login') == true){

			$respuesta = array();
			$respuesta['resultado'] = 'false';
			$respuesta['mensaje'] = 'Ocurrio un error durante la petición';
			$respuesta['respuesta'] = null;

			$this->form_validation->set_rules('idInsumo', 'idInsumo', 'trim|integer|max_length[11]|greater_than_equal_to[1]|required');

			if($this->form_validation->run()/* &&  $this->input->is_ajax_request()*/){
				$idInsumo		= $this->input->post("idInsumo");

				//revisar que exista el registro
				$res = $this->Merma_model->getById($idInsumo); 

				if($res != NULL){

					$is_affected = $this->Merma_model->deleteById($idInsumo);

					if($is_affected != NULL){
						$respuesta['resultado'] = 'true';
						$respuesta['mensaje'] = 'El registro se elimino correctamente';
					}else{
						$respuesta['mensaje'] = 'No fue posible eliminar el registro';
					}

				}

			}

            /*Si la validación de campos es incorrecta*/
            else {
            	$this->form_validation->set_error_delimiters('','');
				$respuesta['error'] = validation_errors();
            }
			
            echo json_encode($respuesta);

		//}
	}
}
?>