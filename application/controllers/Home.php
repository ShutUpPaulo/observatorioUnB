<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe para a página /home (default)
 * Extends CI_Controller
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

    public function index() {

        $data['home'] = $this->consulta->home();
        $data['perfis'] = $this->consulta->perfis();
        $data['home_imagens'] = $this->consulta->home_imagens();
        $data['recentes'] = $this->consulta->recentes();
        $data['mais_acessados'] = $this->consulta->mais_acessados();

        $this->add_count_home_acesso('home');

    	$this->template->set('currentPage', 'Home');

        //
        /*$this->load->library('email');

        $config['protocol'] = "mail";
        $config['mailpath'] = "/usr/sbin/sendmail";
        $config['charset'] = "utf-8";
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);


        $this->load->helper('date');*/


        // $config['protocol'] = "smtp";
        // $config['smtp_host'] = "ssl://smtp.googlemail.com";
        // $config['smtp_port'] = 465;
        // $config['smtp_user'] = "observatorioderesiduosunb@gmail.com";
        // $config['smtp_pass'] = "@0bs3rv4t0r10@";
        // $config['protocol']    = 'smtp';
        // $config['smtp_host']    = 'ssl://smtp.gmail.com';
        // $config['smtp_port']    = '465';
        // $config['smtp_timeout'] = '7';
        // $config['smtp_user']    = 'observatorioderesiduosunb@gmail.com';
        // $config['smtp_pass']    = '@0bs3rv4t0r10@';
        // $config['charset']    = "utf-8";
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = "text"; // or html
        // $config['validation'] = TRUE; // bool whether to validate email or not      

        // $this->email->initialize($config);





        /*$this->email->from("nao-responda@observatorioderesiduos.unb.br", "Observatório de Resíduos");
        $this->email->to("rodrigodadamos@gmail.com");
        // $this->email->cc('another@another-example.com');

        $this->email->subject("Email Test " . now());
        $this->email->message("Testing the email class " . now());

        $this->email->send();*/

        // echo $this->email->print_debugger();


        // $this->session->keep_flashdata('msg');


    	// $this->template->set('css', array('materialize', 'style', 'style.obs3r'));
    	// $this->template->set('js', array('jquery-2.1.1.min', 'materialize', 'jquery.countTo', 'init'));
        $this->template->set('css', array('home'));
        $this->template->set('js', array('home'));
        $this->template->load('template/index', 'home/index', $data);

    }

    function add_count_home_acesso($slug) {
        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($slug), FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => urldecode($slug),
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_home_acesso(); 
        } 
    }

}
