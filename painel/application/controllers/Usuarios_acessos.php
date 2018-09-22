<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_acessos extends CI_Controller {

	public function __construct(){
		parent::__construct();			
		if (!$this->session->session_id || !$this->session->userdata('logado')) {
			redirect();
		}
		if ($this->session->userdata('tipo') > 1) {
			redirect('home');
		}
	}
	
	public function index(){
		$this->grocery_crud->set_table('superusers_acessos');
		$this->grocery_crud->set_subject('Usuários Acessos');
		$this->grocery_crud->unset_add();
		$this->grocery_crud->unset_edit();
		$this->grocery_crud->unset_delete();
 
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