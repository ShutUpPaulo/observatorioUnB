<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
		if ($this->session->userdata('tipo') > 2) {
			redirect('home');
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('superusers');
		$this->grocery_crud->set_subject('Usuários');
		if ($this->session->userdata('tipo') > 1) {
			$this->grocery_crud->unset_columns('senha');
			$this->grocery_crud->field_type('superuser_tipo_id', 'hidden', 3);
			$this->grocery_crud->unset_edit();
			$this->grocery_crud->unset_delete();
		} else {
			$this->grocery_crud->set_relation('superuser_tipo_id', 'superusers_tipos', 'nome');
		}
		$this->grocery_crud->field_type('ativo', 'hidden', 1);
		$this->grocery_crud->field_type('criado_por', 'hidden', $this->session->userdata('usuario'));
		$this->grocery_crud->unset_fields('cadastrado_em');
		$this->grocery_crud->field_type('senha', 'password');
		$this->grocery_crud->callback_before_insert(array($this,'encrypt_password_callback'));
		$this->grocery_crud->callback_before_update(array($this,'encrypt_password_callback'));

		// $this->grocery_crud->set_rules('buyPrice','buy Price','numeric');
    	$this->grocery_crud->required_fields('usuario', 'nome_completo', 'email', 'senha');
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('usuarios/index', $output);
 		$this->load->view('parts/footer');
	}

	function encrypt_password_callback($post_array, $primary_key = null)
	{
		$options = [
		    'cost' => 10,
		];
		$post_array['senha'] = password_hash($post_array['senha'], PASSWORD_BCRYPT, $options);
		return $post_array;
	}

}