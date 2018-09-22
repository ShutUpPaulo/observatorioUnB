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
		// $this->db->select('*');
		// $this->db->from('home_imagens');
		$this->db->order_by('ordem');
		//$this->db->order_by('id_imagem', 'random');//slider home com imagens ramdomicas
		$query = $this->db->get('home_imagens', 5)->result();//qts imgs no slider home
		//$query = $this->db->get()->result();
		return $query;
	}

	public function perfis($perfil = null) {//usar parametro para o perfil selecionado
		$this->db->select('perfis.*, cores.*, cores_intensidades.*');
		$this->db->from('perfis, cores, cores_intensidades');
		$this->db->where('cores.id_cor = perfis.id_cor');
		$this->db->where('cores_intensidades.id_cor_intensidade = perfis.id_cor_intensidade');
		if ($perfil == null) {
			$this->db->order_by('perfis.ordem');
		} else {
			$this->db->where('perfis.slug_perfil', $perfil);	
		}
		$query = $this->db->get()->result();
		return $query;
	}

	public function categorias($perfil, $categoria = null) {
		$this->db->select('categorias.*, perfis.slug_perfil, cores.*, cores_intensidades.*');
		$this->db->from('categorias, cores, cores_intensidades');
		$this->db->where('cores.id_cor = categorias.id_cor');
		$this->db->where('cores_intensidades.id_cor_intensidade = categorias.id_cor_intensidade');
		$this->db->join('perfis_categorias', 'perfis_categorias.id_categoria = categorias.id_categoria');
		$this->db->join('perfis', 'perfis.id_perfil = perfis_categorias.id_perfil');
		$this->db->where('perfis.slug_perfil', $perfil);
		if ($categoria != null)
			$this->db->where('slug_categoria', $categoria);
		$query = $this->db->get()->result();
		return $query;
	}

	public function artigos($perfil, $categoria, $artigo = null) {//usar terceiro parametro para o artigo selecionado
		$this->db->select('artigos.*, categorias.slug_categoria, perfis.slug_perfil');
		$this->db->from('artigos');
		$this->db->join('categorias_artigos', 'categorias_artigos.id_artigo = artigos.id_artigo');
		$this->db->join('categorias', 'categorias.id_categoria = categorias_artigos.id_categoria');
		$this->db->where('categorias.slug_categoria', $categoria);
		$this->db->join('perfis_categorias', 'perfis_categorias.id_categoria = categorias.id_categoria');
		$this->db->join('perfis', 'perfis.id_perfil = perfis_categorias.id_perfil');
		$this->db->where('perfis.slug_perfil', $perfil);
		if ($artigo != null)
			$this->db->where('slug_artigo', $artigo);
		$query = $this->db->get()->result();
		return $query;
	}

	public function tags($artigo) {
		$this->db->select('tags.*');
		$this->db->from('tags');
		$this->db->join('artigos_tags', 'artigos_tags.id_tag = tags.id_tag');
		$this->db->join('artigos', 'artigos.id_artigo = artigos_tags.id_artigo');
		$this->db->where('artigos.slug_artigo', $artigo);
		$query = $this->db->get()->result();
		return $query;
	}

	public function arquivos($artigo) {
		$this->db->select('id_artigo');
		$this->db->from('artigos');
		$this->db->where('slug_artigo', $artigo);
		$row = $this->db->get()->row();
		if (isset($row))
		{	
			$this->db->select('*');
		    $this->db->from('artigo_arquivos');
		    $this->db->where('artigo', $row->id_artigo);
		    $query = $this->db->get()->result();
			return $query;
		}
	}

	public function recentes() {
		$this->db->select('artigos.*, categorias.slug_categoria, perfis.slug_perfil');
		//$this->db->from('artigos');
		$this->db->join('categorias_artigos', 'categorias_artigos.id_artigo = artigos.id_artigo');
		$this->db->join('categorias', 'categorias.id_categoria = categorias_artigos.id_categoria');
		$this->db->join('perfis_categorias', 'perfis_categorias.id_categoria = categorias.id_categoria');
		$this->db->join('perfis', 'perfis.id_perfil = perfis_categorias.id_perfil');
		$this->db->group_by('artigos.id_artigo');//pra não repetir
		$this->db->order_by('adicionado_em', 'DESC');
		$query = $this->db->get('artigos', 6)->result();
		return $query;
	}

	public function mais_acessados() {
		$this->db->select('artigos.*, categorias.slug_categoria, perfis.slug_perfil');
		//$this->db->from('artigos');
		$this->db->join('categorias_artigos', 'categorias_artigos.id_artigo = artigos.id_artigo');
		$this->db->join('categorias', 'categorias.id_categoria = categorias_artigos.id_categoria');
		$this->db->join('perfis_categorias', 'perfis_categorias.id_categoria = categorias.id_categoria');
		$this->db->join('perfis', 'perfis.id_perfil = perfis_categorias.id_perfil');
		$this->db->group_by('artigos.id_artigo');//pra não repetir
		$this->db->order_by('total_acessos_artigo', 'DESC');
		$query = $this->db->get('artigos', 6)->result();
		return $query;
	}

	public function incidentes_tipos_dropdown_list() {
		$this->db->from('tipos_incidentes');
		$this->db->order_by('tipo_incidente');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['id_tipo_incidente']] = $row['tipo_incidente'];
			}
		}
		return $return;
	}

	function getmappoints() {
		// $sql = "SELECT * FROM incidentes WHERE publicado = 1";
		$sql = "SELECT * FROM incidentes";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query;
		}
   }

   function incidentes() {
   		$this->db->select('incidentes.*, tipos_incidentes.tipo_incidente');
   		$this->db->from('incidentes, tipos_incidentes');
   		$this->db->where('tipos_incidentes.id_tipo_incidente = incidentes.id_tipo_incidente');
		$query = $this->db->get()->result();
		return $query;
   }

}