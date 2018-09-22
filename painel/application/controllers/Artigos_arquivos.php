<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artigos_arquivos extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index($id_artigo){
		$this->grocery_crud->where('artigo', $id_artigo);
		$this->grocery_crud->set_table('artigo_arquivos');
		// $this->grocery_crud->set_theme('datatables');
		$this->grocery_crud->set_subject('Arquivos do Artigo');
		$this->grocery_crud->field_type('artigo', 'hidden', $id_artigo);
		$this->grocery_crud->set_field_upload('arquivo','assets/uploads/files');
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
 		$this->load->view('artigos/arquivos', $output);
 		$this->load->view('parts/footer');
	}

}
