<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		//$crud = new grocery_CRUD();
    	//$crud->set_theme('datatables');
    	//$crud->set_table('perfis');
		//$crud->set_relation('officeCode','offices','city');
		//$crud->display_as('officeCode','Office City');
		//$crud->set_subject('Perfil');
		//$crud->required_fields('lastName');
 		//$crud->set_field_upload('slug_perfil','assets/uploads/files');

		// $this->grocery_crud->set_table('perfis');
		// $this->grocery_crud->set_subject('Perfil');
		// $this->grocery_crud->set_field_upload('file_url','assets/uploads/files');
        // $output = $this->grocery_crud->render();
        //$output = $crud->render();
        $this->load->view('parts/header');
 		$this->load->view('home/index');
 		$this->load->view('parts/footer');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}
}
