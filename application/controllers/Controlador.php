<?php
class Controlador extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view( "public/componentes/public_header_f" );
		$this->load->view( "public/login" );
		$this->load->view( "public/componentes/footer_f");
	}

	public function restablecer(){
		$this->load->view( "public/componentes/public_header_f" );
		$this->load->view( "public/restablecer" );
		$this->load->view( "public/componentes/footer_f");
	}

	public function puntosVenta(){
		
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/puntosVenta" );
		$this->load->view( "public/componentes/footer_f");

	}

	public function insumos(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/insumos" );
		$this->load->view( "public/componentes/footer_f");
	}
	
	public function insumosAdd(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/forma_insumosAdd" );
		$this->load->view( "public/componentes/footer_f");
	}

	public function detalleinsumo(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/forma_insumos" );
		$this->load->view( "public/componentes/footer_f");

	}	

	public function recetas(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/recetas" );
		$this->load->view( "public/componentes/footer_f");

	}

	public function detallereceta(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/forma_receta" );
		$this->load->view( "public/componentes/footer_f");

	}

	public function productos(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/productos" );
		$this->load->view( "public/componentes/footer_f");

	}
	

	public function detalleproducto(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/forma_productos" );
		$this->load->view( "public/componentes/footer_f");

	}


	public function proveedores(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/proveedores" );
		$this->load->view( "public/componentes/footer_f");

	}
	

	public function detalleproveedor(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/forma_proveedores" );
		$this->load->view( "public/componentes/footer_f");

	}

	public function reportes(){
		$this->load->view( "public/componentes/header_f" );
		$this->load->view( "public/private/reportes" );
		$this->load->view( "public/componentes/footer_f");
	}
}
?>
