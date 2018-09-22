<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cep extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function busca($latitude, $longitude){
		$token = 'b2b35a3178eadaeb7a10c6f6c7eeb347';
        $url = 'http://www.cepaberto.com/api/v2/ceps.json?lat=' . $latitude . '&lng=' . $longitude;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token token="' . $token . '"'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        echo $output;
   //      $output = $this->grocery_crud->render();
   //      $this->load->view('parts/header', $output);
 		// $this->load->view('agentes/index', $output);
 		// $this->load->view('parts/footer');
	}

}