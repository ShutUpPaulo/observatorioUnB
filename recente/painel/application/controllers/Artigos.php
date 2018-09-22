<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artigos extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('artigos');
		// $this->grocery_crud->set_theme('datatables');
		$this->grocery_crud->set_subject('Artigo');
		$this->grocery_crud->set_relation_n_n('categorias', 'categoriasXartigos', 'categorias', 'id_artigo', 'id_categoria', 'categoria');
		// $this->grocery_crud->add_action('More', '', 'demo/action_more','add');
		$this->grocery_crud->add_action('Adicionar Imagens', base_url('assets/images/add_image.png'), '','',array($this,'go_imagens'));
		$this->grocery_crud->add_action('Adicionar Arquivos', base_url('assets/images/add_file.png'), '','',array($this,'go_arquivos'));
		//
		$this->grocery_crud->unset_fields('adicionado_em', 'modificado_em');
		$this->grocery_crud->field_type('usuario', 'hidden', $this->session->userdata('usuario'));
		if ($this->session->userdata('tipo') < 3) {
			$this->grocery_crud->field_type('publicado','dropdown', array('0' => 'não', '1' => 'sim'));
		} else {
			$this->grocery_crud->field_type('publicado', 'hidden', 0);
		}
		//
		//$this->grocery_crud->fields('artigo', 'categorias', 'descricao_artigo', 'slug_artigo');
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('artigos/index', $output);
 		$this->load->view('parts/footer');
	}

	function go_imagens($primary_key , $row) {
		return site_url('artigos_imagens/index') . '/' . $row->id_artigo;
	}

	function go_arquivos($primary_key , $row) {
		return site_url('artigos_arquivos/index') . '/' . $row->id_artigo;
	}

}
