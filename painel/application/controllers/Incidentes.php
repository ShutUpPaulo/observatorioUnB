<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incidentes extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('incidentes');
		$this->grocery_crud->set_subject('Incidente');
		$this->grocery_crud->set_relation('id_tipo_incidente', 'tipos_incidentes', 'tipo_incidente');
		$this->grocery_crud->field_type('publicado','dropdown', array('0' => 'não', '1' => 'sim'));
		$this->grocery_crud->set_field_upload('imagem_incidente','assets/uploads/images/incidentes');
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('incidentes/index', $output);
 		$this->load->view('parts/footer');
	}

	public function tipos(){
		$this->grocery_crud->set_table('tipos_incidentes');
		$this->grocery_crud->set_subject('Tipos de Incidente');
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('incidentes/tipos', $output);
 		$this->load->view('parts/footer');
	}

}
