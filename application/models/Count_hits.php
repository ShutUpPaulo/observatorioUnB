<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe (model) com os métodos de contar views. Carregada no autoload.
 * Extends CI_Model
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class Count_hits extends CI_Model {
	
	//acessos	
	function update_counter_artigo_acesso($slug_artigo, $slug_perfil) { 
	//acessos artigo
		// return current article views 
		$this->db->where('slug_artigo', urldecode($slug_artigo)); 
		$this->db->select('total_acessos_artigo'); 
		$count = $this->db->get('artigos')->row(); 
		// then increase by one 
		$this->db->where('slug_artigo', urldecode($slug_artigo)); 
		$this->db->set('total_acessos_artigo', ($count->total_acessos_artigo + 1)); 
		$this->db->update('artigos'); 

	//acessos de perfil para artigo //é só ignorar os hits do perfil genérico
		if ($slug_perfil != 'perfil') {
			$this->load->library('user_agent');
			$browser = $this->agent->browser();
			$version = $this->agent->version();
			$platform = $this->agent->platform();
			$agent = $this->agent->agent_string();
			$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
			
			$ip_address = $this->input->ip_address();
			
			$data = array(
			    'slug_artigo' => $slug_artigo,
			    'slug_perfil' => $slug_perfil,
			    'user_agent' => $user_agent,
			    'ip_address' => $ip_address
			);
			$this->db->insert('acesso_de_perfil_para_artigo', $data);
		}
	}

	function update_counter_categoria_acesso($slug) { 
		// return current article views 
		$this->db->where('slug_categoria', urldecode($slug)); 
		$this->db->select('total_acessos_categoria'); 
		$count = $this->db->get('categorias')->row(); 
		// then increase by one 
		$this->db->where('slug_categoria', urldecode($slug)); 
		$this->db->set('total_acessos_categoria', ($count->total_acessos_categoria + 1)); 
		$this->db->update('categorias'); 
	}

	function update_counter_perfil_acesso($slug) { 
		// return current article views 
		$this->db->where('slug_perfil', urldecode($slug)); 
		$this->db->select('total_acessos_perfil'); 
		$count = $this->db->get('perfis')->row(); 
		// then increase by one 
		$this->db->where('slug_perfil', urldecode($slug)); 
		$this->db->set('total_acessos_perfil', ($count->total_acessos_perfil + 1)); 
		$this->db->update('perfis'); 
	}

	function update_counter_home_acesso() { 
		$this->db->select('total_acessos_home'); 
		$count = $this->db->get('home')->row(); 
		// then increase by one 
		$this->db->set('total_acessos_home', ($count->total_acessos_home + 1)); 
		$this->db->update('home'); 
	}

	//

	//de artigo para perfil
	function update_counter_acesso_artigo_para_perfil($slug_artigo, $slug_perfil) {
		$this->load->library('user_agent');
		$browser = $this->agent->browser();
		$version = $this->agent->version();
		$platform = $this->agent->platform();
		$agent = $this->agent->agent_string();
		$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
		
		$ip_address = $this->input->ip_address();
		
		$data = array(
		    'slug_artigo' => $slug_artigo,
		    'slug_perfil' => $slug_perfil,
		    'user_agent' => $user_agent,
		    'ip_address' => $ip_address
		);
		$this->db->insert('acesso_de_artigo_para_perfil', $data);
	}
	//

	function update_counter_artigo_positivo($slug_artigo) { 
		// return current article views 
		$this->db->where('slug_artigo', $slug_artigo); 
		$this->db->select('total_avaliacao_positiva_artigo'); 
		$count = $this->db->get('artigos')->row(); 
		// then increase by one 
		$this->db->where('slug_artigo', $slug_artigo); 
		$this->db->set('total_avaliacao_positiva_artigo', ($count->total_avaliacao_positiva_artigo + 1)); 
		$this->db->update('artigos'); 
	}

	function update_counter_artigo_negativo($slug_artigo) { 
		// return current article views 
		$this->db->where('slug_artigo', $slug_artigo); 
		$this->db->select('total_avaliacao_negativa_artigo'); 
		$count = $this->db->get('artigos')->row(); 
		// then increase by one 
		$this->db->where('slug_artigo', $slug_artigo); 
		$this->db->set('total_avaliacao_negativa_artigo', ($count->total_avaliacao_negativa_artigo + 1)); 
		$this->db->update('artigos'); 
	}

	function update_counter_categoria_positivo($slug_categoria) { 
		// return current article views 
		$this->db->where('slug_categoria', $slug_categoria); 
		$this->db->select('total_avaliacao_positiva_categoria'); 
		$count = $this->db->get('categorias')->row(); 
		// then increase by one 
		$this->db->where('slug_categoria', $slug_categoria); 
		$this->db->set('total_avaliacao_positiva_categoria', ($count->total_avaliacao_positiva_categoria + 1)); 
		$this->db->update('categorias'); 
	}

	function update_counter_categoria_negativo($slug_categoria) { 
		// return current article views 
		$this->db->where('slug_categoria', $slug_categoria); 
		$this->db->select('total_avaliacao_negativa_categoria'); 
		$count = $this->db->get('categorias')->row(); 
		// then increase by one 
		$this->db->where('slug_categoria', $slug_categoria); 
		$this->db->set('total_avaliacao_negativa_categoria', ($count->total_avaliacao_negativa_categoria + 1)); 
		$this->db->update('categorias'); 
	}

	function update_artigo_utilidade_positivo($slug_artigo, $slug_perfil) {
    
	    $this->load->library('user_agent');
		$browser = $this->agent->browser();
		$version = $this->agent->version();
		$platform = $this->agent->platform();
		$agent = $this->agent->agent_string();
		$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
		
		$ip_address = $this->input->ip_address();
		
		$data = array(
		    'slug_artigo' => $slug_artigo,
		    'slug_perfil' => $slug_perfil,
		    'user_agent' => $user_agent,
		    'ip_address' => $ip_address,
		    'achou_util' => 1
		);
		$this->db->insert('artigo_utilidade', $data);

	}

	function update_artigo_utilidade_negativo($slug_artigo, $slug_perfil) {
    
	    $this->load->library('user_agent');
		$browser = $this->agent->browser();
		$version = $this->agent->version();
		$platform = $this->agent->platform();
		$agent = $this->agent->agent_string();
		$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
		
		$ip_address = $this->input->ip_address();
		
		$data = array(
		    'slug_artigo' => $slug_artigo,
		    'slug_perfil' => $slug_perfil,
		    'user_agent' => $user_agent,
		    'ip_address' => $ip_address,
		    'achou_util' => 0
		);
		$this->db->insert('artigo_utilidade', $data);

	}

	function update_categoria_utilidade_positivo($slug_categoria, $slug_perfil) {
    
	    $this->load->library('user_agent');
		$browser = $this->agent->browser();
		$version = $this->agent->version();
		$platform = $this->agent->platform();
		$agent = $this->agent->agent_string();
		$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
		
		$ip_address = $this->input->ip_address();
		
		$data = array(
		    'slug_categoria' => $slug_categoria,
		    'slug_perfil' => $slug_perfil,
		    'user_agent' => $user_agent,
		    'ip_address' => $ip_address,
		    'achou_util' => 1
		);
		$this->db->insert('categoria_utilidade', $data);

	}

	function update_categoria_utilidade_negativo($slug_categoria, $slug_perfil) {
    
	    $this->load->library('user_agent');
		$browser = $this->agent->browser();
		$version = $this->agent->version();
		$platform = $this->agent->platform();
		$agent = $this->agent->agent_string();
		$user_agent =  '[' . $browser . ', ' . $version . ', ' . $platform . '] agent_string: ' . $agent;
		
		$ip_address = $this->input->ip_address();
		
		$data = array(
		    'slug_categoria' => $slug_categoria,
		    'slug_perfil' => $slug_perfil,
		    'user_agent' => $user_agent,
		    'ip_address' => $ip_address,
		    'achou_util' => 0
		);
		$this->db->insert('categoria_utilidade', $data);

	}


	/*to de olho*/
	function update_total_confirmacoes($idIncidente) {
		$this->load->helper('cookie');
        $check_visitor = $this->input->cookie($idIncidente . '_incidente', FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $idIncidente . '_incidente',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            // return current article views 
			$this->db->where('id_incidente', $idIncidente); 
			$this->db->select('total_confirmacoes_existencia'); 
			$count = $this->db->get('incidentes')->row(); 
			// then increase by one 
			$this->db->where('id_incidente', $idIncidente); 
			$this->db->set('total_confirmacoes_existencia', ($count->total_confirmacoes_existencia + 1)); 
			$this->db->update('incidentes');
            redirect('to_de_olho/mapa');
        }
	}

}