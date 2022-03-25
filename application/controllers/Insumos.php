<?php
defined('BASEPATH') OR exit('No se permite el acceso directo.');

class Insumo extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Insumo_model');
	}

	public function index()
	{	
		$this->load->view('insumos');
	}

	public function getAll(){
		$data = array("data"=>$this->Insumo_model->getAll());
		$this->load->view($data);
	}

	public function save(){
		$nombre = $this->input->post("nombre");
		$unidadMedida = $this->input->post("unidadMedida");
		$idProveedor = $this->input->post("unidadMedida");

		$this->form_validation->set_rules('nombre', 'Nombre Insumo', 'required|min_length[50]');
		$this->form_validation->set_rules('unidadMedida', 'Unidad de Medida', 'required||min_length[30]');
		$this->form_validation->set_rules('idProveedor', 'idProveedor', 'required|min_length[1]');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('/controlador/detalleinsumo');
		}else{
			$data = array(
				"nombre"=>$nombre,
				"unidadMedida"=>$unidadMedida,
				"idProveedor"=>$idProveedor
			);
			
			$this->Insumo_model->save($data);
			redirect(base_url()."/controlador/insumo");
		}
}
  public function update($id){
	$nombre = $this->input->post("nombre");
	$unidadMedida = $this->input->post("unidadMedida");
	$idProveedor = $this->input->post("unidadMedida");
	
	$data=$this->Insumo_model->getById($id);

	$this->form_validation->set_rules('nombre', 'Nombre Insumo', 'required|min_length[50]');
	$this->form_validation->set_rules('unidadMedida', 'Unidad de Medida', 'required||min_length[30]');
	$this->form_validation->set_rules('idProveedor', 'idProveedor', 'required|min_length[1]');

	if ($this->form_validation->run() == FALSE){
		$this->index($id);
	}else{
		$data = array(
			"nombre"=>$nombre,
			"unidadMedida"=>$unidadMedida,
			"idProveedor"=>$idProveedor
		);
		
		$this->Insumo_model->update($data,$id);
	}
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
