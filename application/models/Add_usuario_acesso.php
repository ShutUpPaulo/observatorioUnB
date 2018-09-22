<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_usuario_acesso extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function add_usuario_acesso($data){
		$this->db->insert('usuarios_acessos', $data); 
		// echo "user Added";
	}
}