<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe (model) insere incidente no banco de dados.
 * Extends CI_Model
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class Inserir extends CI_Model {

	function incidente($data) {
		$this->db->insert('incidentes', $data);
	}

}