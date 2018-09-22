<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfis extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('perfis');
		$this->grocery_crud->set_subject('Perfil');
		$this->grocery_crud->required_fields('usuario');
		$this->grocery_crud->set_relation('id_cor', 'cores', 'cor');
		$this->grocery_crud->set_relation('id_cor_intensidade', 'cores_intensidades', 'cor_intensidade');
		//
		$this->grocery_crud->unset_fields('adicionado_em', 'modificado_em');
		$this->grocery_crud->field_type('usuario', 'hidden', $this->session->userdata('usuario'));
		if ($this->session->userdata('tipo') < 3) {
			$this->grocery_crud->field_type('publicado','dropdown', array('0' => 'não', '1' => 'sim'));
		} else {
			$this->grocery_crud->field_type('publicado', 'hidden', 0);
		}
		//
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('perfis/index', $output);
 		$this->load->view('parts/footer');
	}

}
