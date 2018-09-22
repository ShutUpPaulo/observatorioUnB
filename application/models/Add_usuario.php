<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_usuario extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	//insere usuários
	function add_usuario($data){
		return $this->db->insert('usuarios', $data);
	}
    
    //envia email de verificacao
    function enviaEmail($usuario, $para_email, $codigo)
    {
    	$de_email = "nao-responda@observatorioderesiduos.unb.br"; //change this to yours
        $assunto = "Observatório de Resíduos - Verifique seu email";

        $data = array(
            'usuario' => $usuario,
            'codigo' => $codigo
        );

        $messagem = $this->load->view('email/verifica.php', $data, TRUE);

    	$this->load->library('email');

    	//email config
        $config['protocol'] = "mail";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";

        $this->email->initialize($config);
        
        //send mail
        $this->email->from($de_email, "Observatório de Resíduos");
        $this->email->to($para_email);
        // $this->email->cc('another@another-example.com');

        $this->email->subject($assunto);
        $this->email->message($messagem);

        return $this->email->send();

    }

    function enviaEmailReset($usuario, $para_email, $url)
    {
        $de_email = "nao-responda@observatorioderesiduos.unb.br"; //change this to yours
        $assunto = "Observatório de Resíduos - Esqueci Senha";

        $data = array(
            'usuario' => $usuario,
            'url' => $url
        );

        $messagem = $this->load->view('email/reset.php', $data, TRUE);

        $this->load->library('email');

        //email config
        $config['protocol'] = "mail";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";

        $this->email->initialize($config);
        
        //send mail
        $this->email->from($de_email, "Observatório de Resíduos");
        $this->email->to($para_email);
        // $this->email->cc('another@another-example.com');

        $this->email->subject($assunto);
        $this->email->message($messagem);

        return $this->email->send();

    }
    
    //ativar conta de usuario
    function verificaEmail($chave)
    {
        $data = array('ativo' => 1);
        $this->db->where('codigo_verificacao', $chave);
        $this->db->update('usuarios', $data);
        return ($this->db->affected_rows() == 1);
    }

    function getUsuarioInfoPorEmail($email)
    {
        $q = $this->db->get_where('usuarios', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUsuarioInfo('.$email.')');
            return false;
        }
    }

    function getUsuarioInfo($id)
    {
        $q = $this->db->get_where('usuarios', array('id_usuario' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUsuarioInfo('.$id.')');
            return false;
        }
    }

    function insereToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d H:i:s');
        
        $string = array(
            'token'     => $token,
            'user_id'   => $user_id,
            'created'   => $date
        );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }

    function tokenValido($token)
    {
        $tkn = substr($token,0,30);
        $uid = substr($token,30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid,
            'tokens.utilizado' => 0), 1);

        if($this->db->affected_rows() == 1)
        {
            $row = $q->row();

            $created = strtotime($row->created);            
            $today = strtotime(date('Y-m-d H:i:s'));

            $diff = ($today - $created) / 3600;

            if($diff > 2){
                return false;
            }

            $user_info = $this->getUsuarioInfo($row->user_id);
            return $user_info;
            
        }
        else
        {
            return false;
        }
        
    } 

    // update senha
    function updateSenha($post)
    {
        $this->add_usuario->desativaToken($post['id_usuario']);
        $data = array('senha' => $post['senha']);
        $this->db->where('id_usuario', $post['id_usuario']);
        $this->db->update('usuarios', $data);
        return ($this->db->affected_rows() == 1);
    }

    // desativa token
    function desativaToken($id_usuario)
    {
        $this->db->where('user_id', $id_usuario);
        $data = array('utilizado' => 1);
        $this->db->update('tokens', $data);
    }

    // verifica se o token existe e se não foi utilizado
    function checaToken($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('tokens');
        $this->db->where('user_id', $id_usuario);
        $this->db->where('utilizado', 0);
        $query = $this->db->get()->result();
        if (!$query)
            return false;
        else
            return true;
    }

}