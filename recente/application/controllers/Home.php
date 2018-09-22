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
		
    	$this->template->set('currentPage', 'Home');
    	$this->template->set('css', array('materialize', 'style', 'style.obs3r'));
    	$this->template->set('js', array('jquery-2.1.1.min', 'materialize', 'jquery.countTo', 'init'));
        $this->template->load('template/index', 'home/index', $data);

    }

}
