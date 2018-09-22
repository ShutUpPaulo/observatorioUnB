<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('tags');
		$this->grocery_crud->set_subject('tags');
		$this->grocery_crud->required_fields('tag');
		$this->grocery_crud->display_as('a_ordem','Ordem')->display_as('a_usuario','Usuário')->display_as('a_adicionado_em','Adicionado em');
		//
		$this->grocery_crud->unset_fields('a_adicionado_em');
		$this->grocery_crud->field_type('a_usuario', 'hidden', $this->session->userdata('usuario'));
		//
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('tags/index', $output);
 		$this->load->view('parts/footer');
	}

}