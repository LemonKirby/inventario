<?php
defined('BASEPATH') OR exit('No se permite el acceso directo.');

class Insumo extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Insumo_model');
	}

	public function getAll(){
		//if($this->session->userdata('login') == true){
			$res = $this->Insumo_model->getAll();

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
			$this->form_validation->set_rules('unidadMedida', 'unidadMedida', 'required|htmlspecialchars|trim');
			$this->form_validation->set_rules('idProveedor', 'idProveedor', 'required|htmlspecialchars|trim');
			$this->form_validation->set_rules('nombre', 'nombre', 'required|htmlspecialchars|trim');
			if($this->form_validation->run()){
				$unidadMedida = $this->input->post("unidadMedida");
				$idProveedor  = $this->input->post("idProveedor");
				$nombre = $this->input->post("nombre");

				$data = array(
					"unidadMedida" => $unidadMedida,
					"idProveedor" => $idProveedor,
					"nombre" => $nombre
				);

				$insumo = $this->Insumo_model->insert($data);

				if($insumo != NULL){
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
			$this->form_validation->set_rules('unidadMedida', 'unidadMedida', 'trim|integer|max_length[11]|greater_than_equal_to[1]|required');
			$this->form_validation->set_rules('idProveedor', 'idProveedor', 'required|htmlspecialchars|max_length[50]|trim');
			$this->form_validation->set_rules('nombre', 'nombre del proveedor', 'required|htmlspecialchars|max_length[50]|trim');

			if($this->form_validation->run()/* &&  $this->input->is_ajax_request()*/){
				$idInsumo   	= $this->input->post("idInsumo");
				$unidadMedida 	= $this->input->post("unidadMedida");
				$idProveedor    = $this->input->post("idProveedor");
				$nombre 		= $this->input->post("nombre");

				//revisar que exista el registro
				$res = $this->Insumo_model->getById($idInsumo); 

				if($res != NULL){
					$data = array(
						"unidadMedida"  => $unidadMedida,
						"idProveedor"   => $idProveedor,
						"nombre" 		=> $nombre
					);

					$is_affected = $this->Insumo_model->update($data, $idInsumo);

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
				$res = $this->Insumo_model->getById($idInsumo); 

				if($res != NULL){

					$is_affected = $this->Insumo_model->deleteById($idInsumo);

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