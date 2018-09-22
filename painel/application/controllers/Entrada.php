<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('add_usuario_acesso');
	}
	
	public function index() {
		$this->load->view('entrada/index');
		// $options = [
		//     'cost' => 10,
		// ];
		// echo password_hash("tonhaoobs", PASSWORD_BCRYPT, $options)."\n";
	}

	public function login() {		
		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');

		$this->db->where('superuser',$usuario);
		// $this->db->where('senha',$senha);
		$this->db->where('ativo',1);
		$usuario = $this->db->get('superusers')->result();		
		if (count($usuario) === 1 && password_verify($senha, $usuario[0]->senha)) {
			$dados = array(
               'usuario' => $usuario[0]->superuser,
               'tipo' => $usuario[0]->superuser_tipo_id,
               'logado' => TRUE
            );
			$this->session->set_userdata($dados);

			//acesso
			$id_usuario = $usuario[0]->id_superuser;

			$this->load->library('user_agent');
			$browser = $this->agent->browser();
			$version = $this->agent->version();
			$platform = $this->agent->platform();
			$agent = $this->agent->agent_string();
			$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
			// $user_agent = $this->input->user_agent();// $acesso = date('Y-m-d H:i:s');
			$user_data = array(
				'id_superuser' => $id_usuario,
				'user_agent' => $user_agent
			);
  			$this->add_usuario_acesso->add_usuario_acesso($user_data);
  			//acesso fim

			redirect("home");
		} else {
			// redirect(base_url() . "entrada");
			echo "Usuário ou senha desconhecidos!";
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}
}
