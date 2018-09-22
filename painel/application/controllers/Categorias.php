<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('categorias');
		$this->grocery_crud->set_subject('Categoria');
		$this->grocery_crud->set_relation_n_n('perfis', 'perfis_categorias', 'perfis', 'id_categoria', 'id_perfil', 'perfil');
		$this->grocery_crud->set_relation('id_cor', 'cores', 'cor');
		$this->grocery_crud->set_relation('id_cor_intensidade', 'cores_intensidades', 'cor_intensidade');
		//$this->grocery_crud->fields('categoria', 'perfis', 'descricao_categoria', 'slug_categoria');
		$this->grocery_crud->set_field_upload('capa_categoria','assets/uploads/images');
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
 		$this->load->view('categorias/index', $output);
 		$this->load->view('parts/footer');
	}

}
