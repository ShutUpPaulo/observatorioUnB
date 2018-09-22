<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe (model) com todos os métodos de consulta (somente selects). Carregada no autoload.
 * Extends CI_Model
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class Consulta extends CI_Model {
	public function __construct() {
		// Call the CI_Model constructor
		parent::__construct();
	}

	public function home() {
		$this->db->select('home.*, cores.*, cores_intensidades.*');
		$this->db->from('home, cores, cores_intensidades');
		$this->db->where('cores.id_cor = home.id_cor');
		$this->db->where('cores_intensidades.id_cor_intensidade = home.id_cor_intensidade');
		$query = $this->db->get()->result();
		return $query;
	}
	public function home_imagens() {
		$this->db->select('*');
		$this->db->from('home_imagens');
		$query = $this->db->get()->result();
		return $query;
	}

	public function perfis($perfil = null) {//usar parametro para o perfil selecionado
		$this->db->select('perfis.*, cores.*, cores_intensidades.*');
		$this->db->from('perfis, cores, cores_intensidades');
		$this->db->where('cores.id_cor = perfis.id_cor');
		$this->db->where('cores_intensidades.id_cor_intensidade = perfis.id_cor_intensidade');
		if ($perfil == null) {
			$this->db->order_by('perfis.id_perfil', 'ASC');
		} else {
			$this->db->where('perfis.slug_perfil', $perfil);	
		}
		$query = $this->db->get()->result();
		return $query;
	}

	public function categorias($perfil, $categoria = null) {
		$this->db->select('categorias.*');
		$this->db->from('categorias');
		$this->db->join('perfisXcategorias', 'perfisXcategorias.id_categoria = categorias.id_categoria');
		$this->db->join('perfis', 'perfis.id_perfil = perfisXcategorias.id_perfil');
		$this->db->where('perfis.slug_perfil', $perfil);
		if ($categoria != null)
			$this->db->where('slug_categoria', $categoria);
		$query = $this->db->get()->result();
		return $query;
	}

	public function artigos($perfil, $categoria, $artigo = null) {//usar terceiro parametro para o artigo selecionado
		$this->db->select('artigos.*');
		$this->db->from('artigos');
		$this->db->join('categoriasXartigos', 'categoriasXartigos.id_artigo = artigos.id_artigo');
		$this->db->join('categorias', 'categorias.id_categoria = categoriasXartigos.id_categoria');
		$this->db->where('categorias.slug_categoria', $categoria);
		$this->db->join('perfisXcategorias', 'perfisXcategorias.id_categoria = categorias.id_categoria');
		$this->db->join('perfis', 'perfis.id_perfil = perfisXcategorias.id_perfil');
		$this->db->where('perfis.slug_perfil', $perfil);
		if ($artigo != null)
			$this->db->where('slug_artigo', $artigo);
		$query = $this->db->get()->result();
		return $query;
	}

}