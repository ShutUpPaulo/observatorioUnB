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
		$this->grocery_crud->set_table('usuarios');
		$this->grocery_crud->set_subject('Usuários');
		if ($this->session->userdata('tipo') > 1) {
			$this->grocery_crud->unset_columns('senha');
			$this->grocery_crud->field_type('usuario_tipo_id', 'hidden', 3);
			$this->grocery_crud->unset_edit();
			$this->grocery_crud->unset_delete();
		} else {
			$this->grocery_crud->set_relation('usuario_tipo_id', 'usuarios_tipos', 'nome');
		}
		$this->grocery_crud->field_type('ativo', 'hidden', 1);
		$this->grocery_crud->field_type('criado_por', 'hidden', $this->session->userdata('usuario'));
		$this->grocery_crud->unset_fields('cadastrado_em');
		$this->grocery_crud->field_type('senha', 'password');
 
		// $this->grocery_crud->callback_before_insert(array($this,'encrypt_password_callback'));
		// $this->grocery_crud->callback_before_update(array($this,'encrypt_password_callback'));
		// $this->grocery_crud->callback_edit_field('senha',array($this,'decrypt_password_callback'));

		// $this->grocery_crud->set_rules('buyPrice','buy Price','numeric');
    	$this->grocery_crud->required_fields('usuario', 'nome_completo', 'email', 'senha');
    	// $this->grocery_crud->display_as('id_setor','Setor')->display_as('id_esfera','Esfera')->display_as('numero','Número')->display_as('endereco','Endereço');
        $output = $this->grocery_crud->render();
        $this->load->view('parts/header', $output);
 		$this->load->view('usuarios/index', $output);
 		$this->load->view('parts/footer');
	}

	// function encrypt_password_callback($post_array, $primary_key = null) {
	// 	$this->load->library('encrypt');

	// 	$key = 'r3s1l13nc14ch4v3';
	// 	$post_array['senha'] = $this->encrypt->encode($post_array['senha'], $key);
	// 	return $post_array;
	// }
 
	// function decrypt_password_callback($value) {
	// 	$this->load->library('encrypt');

	// 	$key = 'r3s1l13nc14ch4v3';
	// 	$decrypted_password = $this->encrypt->decode($value, $key);
	// 	return "<input type='password' name='senha' value='$decrypted_password' />";
	// }

}