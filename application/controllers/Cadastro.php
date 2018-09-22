<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

/**
 * Classe para a página /cadastro (default)
 * Extends CI_Controller
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('add_usuario');
	}
	
	public function index() {
		$this->cadastro();
	}

	function cadastro()
    {
        //regras de validacao
        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]|matches[cemail]');
        $this->form_validation->set_rules('cemail', 'Confirma email', 'trim|required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[20]|matches[csenha]');
        $this->form_validation->set_rules('csenha', 'Confirma senha', 'trim|required');
        
        //valida formulario
        if ($this->form_validation->run() == FALSE)
        {
            // falhou
            $data['home'] = $this->consulta->home();
	        $data['perfis'] = $this->consulta->perfis();

	        $this->template->set('currentPage', 'Cadastro');
	        // $this->template->set('css', array('home'));
	        // $this->template->set('js', array('home'));
	        $this->template->load('template/index', 'cadastro/index', $data);
        }
        else
        {
            //insere detalhes do registro do usuario
            $options = [
			    'cost' => 10
			];
			$codigo = md5($this->input->post('email') . '5df4d65sf4' . $this->input->post('nome'));
            $data = array(
                'usuario' => $this->input->post('usuario'),
                'nome_completo' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => password_hash($this->input->post('senha'), PASSWORD_BCRYPT, $options),
                'codigo_verificacao' => $codigo
            );
            
            // isere dados do formulario na base de dados
            if ($this->add_usuario->add_usuario($data))
            {
                // envia email
                if ($this->add_usuario->enviaEmail($this->input->post('usuario'), $this->input->post('email'), $codigo))
                {
                    // email enviado com sucesso
                    $this->session->set_flashdata('msg','<div class="returnMsg green">Cadastro realizado com sucesso! Para ativá-lo, por favor verificar instruções no email fornecido.<br>Verificar na caixa de SPAM!!!</div>');
                    redirect('', 'refresh');
                }
                else
                {
                    // erro
                    $this->session->set_flashdata('msg','<div class="returnMsg red">Erro! Por favor tente novamente mais tarde.</div>');
                    redirect('', 'refresh');
                }
            }
            else
            {
                // erro
                $this->session->set_flashdata('msg','<div class="returnMsg red">Erro! Por favor tente novamente mais tarde.</div>');
                redirect('', 'refresh');
            }
        }
    }

    function verifica($codigo=NULL)
    {
        if ($this->add_usuario->verificaEmail($codigo))
        {
            $this->session->set_flashdata('msg','<div class="returnMsg green">Email verificado com sucesso! Por favor faça o login para acessar sua conta.</div>');
            redirect('', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('msg','<div class="returnMsg red">Ops! Houve um erro ao verificar o email.</div>');
            redirect('', 'refresh');
        }
    }

	function login() {
		$data['home'] = $this->consulta->home();
        $data['perfis'] = $this->consulta->perfis();

        $this->template->set('currentPage', 'Login');
        // $this->template->set('css', array('home'));
        // $this->template->set('js', array('home'));
        $this->template->load('template/index', 'cadastro/login', $data);
	}

	function acesso() {
		$this->load->model('add_usuario_acesso');

		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');

        $where = "usuario='" . $usuario . "' OR email='" . $usuario . "'";
        $this->db->where($where);
		// $this->db->where('senha',$senha);
		$this->db->where('ativo',1);
		$usuario = $this->db->get('usuarios')->result();		
		if (count($usuario) === 1 && password_verify($senha, $usuario[0]->senha)) {
			$dados = array(
               'usuario' => $usuario[0]->usuario,
               'tipo' => $usuario[0]->usuario_tipo_id,
               'perfil' => $usuario[0]->perfil,
               'logado' => TRUE
            );
			$this->session->set_userdata($dados);

			//acesso
			$id_usuario = $usuario[0]->id_usuario;

			$this->load->library('user_agent');
			$browser = $this->agent->browser();
			$version = $this->agent->version();
			$platform = $this->agent->platform();
			$agent = $this->agent->agent_string();
			$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
			// $user_agent = $this->input->user_agent();// $acesso = date('Y-m-d H:i:s');
			$user_data = array(
				'id_usuario' => $id_usuario,
				'user_agent' => $user_agent
			);
  			$this->add_usuario_acesso->add_usuario_acesso($user_data);
  			//acesso fim

            $this->session->set_flashdata('msg','<div class="returnMsg green">Usuário logado com sucesso.</div>');
			redirect('', 'refresh');
		} else {
            $this->session->set_flashdata('msg','<div class="returnMsg yellow darken-1">Ops! Usuário desativado ou usuário e/ou senha desconhecidos.</div>');
            redirect('', 'refresh');
		}
	}
	
	function logout() {
        $this->session->unset_userdata('logado');
        // $this->session->sess_destroy();
        $this->session->set_flashdata('msg','<div class="returnMsg green">Usuário deslogado com sucesso! Até mais.</div>');
		redirect('', 'refresh');
	}

    function esqueci_senha()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        
        if($this->form_validation->run() == FALSE) {
            // falhou
            $data['home'] = $this->consulta->home();
            $data['perfis'] = $this->consulta->perfis();

            $this->template->set('currentPage', 'Esqueci');
            // $this->template->set('css', array('home'));
            // $this->template->set('js', array('home'));
            $this->template->load('template/index', 'cadastro/esqueci', $data);
        }
        else
        {
            $email = $this->input->post('email');  
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->add_usuario->getUsuarioInfoPorEmail($clean);
            
            if(!$userInfo)
            {
                $this->session->set_flashdata('msg', '<div class="returnMsg red">Ops! Não podemos encontrar seu email.</div>');
                redirect('', 'refresh');
            }   
            
            if($userInfo->ativo != 1)
            {
                $this->session->set_flashdata('msg', '<div class="returnMsg yellow darken-1">Sua conta não está ativada ainda.</div>');
                redirect('', 'refresh');
            }

            // verifica se há um token util
            $tokenUtil = $this->add_usuario->checaToken($userInfo->id_usuario);
            if($tokenUtil)
            {
                $this->session->set_flashdata('msg', '<div class="returnMsg yellow darken-1">Pedido de redefinição de senha já realizado. Verifique o email informado.</div>');
                redirect('', 'refresh');
            }

            //build token 
            $token = $this->add_usuario->insereToken($userInfo->id_usuario);
            $qstring = $this->base64url_encode($token);                      
            $url = base_url() . 'cadastro/reset_senha/' . $qstring;

            // envia email
            if ($this->add_usuario->enviaEmailReset($this->input->post('usuario'), $this->input->post('email'), $url))
            {
                // email enviado com sucesso
                $this->session->set_flashdata('msg','<div class="returnMsg green">Email enviado com sucesso, por favor verificar instruções no email fornecido.<br>Verificar na caixa de SPAM!!!</div>');
                redirect('', 'refresh');
            }
            else
            {
                // erro
                $this->session->set_flashdata('msg','<div class="returnMsg red">Erro! Por favor tente novamente mais tarde.</div>');
                redirect('', 'refresh');
            }
        }       
    }

    function reset_senha($codigo=NULL)
    {
        $token = $this->base64url_decode($codigo);
        $cleanToken = $this->security->xss_clean($token);
        
        $user_info = $this->add_usuario->tokenValido($cleanToken);
        
        if(!$user_info){
            $this->session->set_flashdata('msg', '<div class="returnMsg red">Erro! Verificação inválida ou tempo expirado.</div>');
            redirect('', 'refresh');
        }            
        $data['usuario'] = array(
            'usuario'   => $user_info->usuario,
            'email'     => $user_info->email,
            'token'     => $codigo
        );
       
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[20]|matches[csenha]');
        $this->form_validation->set_rules('csenha', 'Confirma senha', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            // falhou
            $data['home'] = $this->consulta->home();
            $data['perfis'] = $this->consulta->perfis();

            $this->template->set('currentPage', 'Reset');
            // $this->template->set('css', array('home'));
            // $this->template->set('js', array('home'));
            $this->template->load('template/index', 'cadastro/reset', $data);
        }
        else
        {
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $options = [
                'cost' => 10
            ];
            $hashed = password_hash($cleanPost['senha'], PASSWORD_BCRYPT, $options);

            $cleanPost['senha'] = $hashed;
            $cleanPost['id_usuario'] = $user_info->id_usuario;
            unset($cleanPost['csenha']);                

            if(!$this->add_usuario->updateSenha($cleanPost))
            {
                $this->session->set_flashdata('msg', '<div class="returnMsg red">Erro! Houve um problema ao redefinir sua senha.</div>');
            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="returnMsg green">Senha redefinida com sucesso! Por favor faça o login para acessar sua conta.</div>');
            }
            redirect('', 'refresh');
        }
    }

    function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}