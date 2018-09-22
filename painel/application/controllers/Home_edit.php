<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_edit extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('home');
		$this->grocery_crud->set_subject('Home Edit');
		// $this->grocery_crud->unset_add();
		// $this->grocery_crud->unset_delete();
		// $this->grocery_crud->unset_edit_fields('usuario','adicionada_em');
		// $this->grocery_crud->columns('Nome','Valor','Ordem', 'Publicado');
		// $this->grocery_crud->edit_fields('Nome','Valor','Ordem', 'Publicado');
		// $this->grocery_crud->set_relation_n_n('perfis', 'perfisXcategorias', 'perfis', 'id_categoria', 'id_perfil', 'perfil');
		$this->grocery_crud->set_relation('id_cor', 'cores', 'cor');
		$this->grocery_crud->set_relation('id_cor_intensidade', 'cores_intensidades', 'cor_intensidade');
		//
		$this->grocery_crud->add_action('Adicionar Imagens', base_url('assets/images/add_image.png'), '','',array($this,'go_imagens'));
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
 		$this->load->view('home_edit/index', $output);
 		$this->load->view('parts/footer');
	}

	function go_imagens($primary_key , $row) {
		return site_url('home_imagens/index') . '/' . $row->id_home;
	}

}