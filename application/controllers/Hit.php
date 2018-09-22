<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe para os métodos de incrementar contagem de indicadores: acessos, utilidade/interesse
 * Extends CI_Controller
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class Hit extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

    //acessos
    function add_count_artigo_acesso() {
        $slug_artigo = $this->input->get('slug_artigo');
        $slug_perfil = $this->input->get('slug_perfil');

        //verifica se a pg de origem existe
        $query_a = $this->db->get_where('artigos', array('slug_artigo' => $slug_artigo));
        $query_c = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));
        if($query_a->num_rows() != 1 || $query_c->num_rows() != 1) {
            redirect();
        }
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie($slug_artigo . $slug_perfil . '_acesso_artigo_total', FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        //set new cookie and update article_views column ..
        //you might be notice we used slug for cookie name and ip
        //address for value to distinguish between articles views
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $slug_artigo . $slug_perfil . '_acesso_artigo_total',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_artigo_acesso($slug_artigo, $slug_perfil); 
        } 
    }

    function add_count_categoria_acesso() {
        $slug_categoria = $this->input->get('slug_categoria');
        
        //verifica se a pg de origem existe
        $query = $this->db->get_where('categorias', array('slug_categoria' => $slug_categoria));
        if($query->num_rows() != 1) {
            redirect();
        }

        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($slug_categoria), FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => urldecode($slug_categoria),
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_categoria_acesso(urldecode($slug_categoria)); 
        } 
    }

    function add_count_perfil_acesso() {
        $slug_perfil = $this->input->get('slug_perfil');

        //verifica se a pg de origem existe
        $query = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));
        if($query->num_rows() != 1) {
            redirect();
        }

        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($slug_perfil), FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => urldecode($slug_perfil),
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_perfil_acesso(urldecode($slug_perfil)); 
        } 
    }


    //de artigo para perfil
    function add_count_acesso_artigo_para_perfil() {
        $slug_artigo = $this->input->get('slug_artigo');
        $slug_perfil = $this->input->get('slug_perfil');

        //verifica se a pg de origem existe
        $query_a = $this->db->get_where('artigos', array('slug_artigo' => $slug_artigo));
        $query_c = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));
        if($query_a->num_rows() != 1 || $query_c->num_rows() != 1) {
            redirect();
        }
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie($slug_artigo . $slug_perfil . '_acesso_artigo_para_perfil', FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        //set new cookie and update article_views column ..
        //you might be notice we used slug for cookie name and ip
        //address for value to distinguish between articles views
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $slug_artigo . $slug_perfil . '_acesso_artigo_para_perfil',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_acesso_artigo_para_perfil($slug_artigo, $slug_perfil); 
        } 
    }

    //utilidade artigo
    function indicador_1($slug_artigo, $slug_perfil) {//artigo positivo

        $query_a = $this->db->get_where('artigos', array('slug_artigo' => $slug_artigo));
        $query_c = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));

        if($query_a->num_rows() != 1 || $query_c->num_rows() != 1) {
            redirect();
        }

        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie($slug_artigo . $slug_perfil . '_artigo_avaliacao', FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $slug_artigo . $slug_perfil . '_artigo_avaliacao',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_artigo_positivo($slug_artigo);
            $this->count_hits->update_artigo_utilidade_positivo($slug_artigo, $slug_perfil);

        }

        //grava na sessão as páginas já avaliadas
        $this->session->set_userdata($slug_artigo, TRUE);

        //pega a url de origem para retornar de onde veio
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');

    }

    function indicador_2($slug_artigo, $slug_perfil) {

        $query_a = $this->db->get_where('artigos', array('slug_artigo' => $slug_artigo));
        $query_c = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));

        if($query_a->num_rows() != 1 || $query_c->num_rows() != 1) {
            redirect();
        }

        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie($slug_artigo . $slug_perfil . '_artigo_avaliacao', FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $slug_artigo . $slug_perfil . '_artigo_avaliacao',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_artigo_negativo($slug_artigo);
            $this->count_hits->update_artigo_utilidade_negativo($slug_artigo, $slug_perfil);
        }

        $this->session->set_userdata($slug_artigo, TRUE);
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');

    }

    //interesse categoria
    function indicador_3($slug_categoria, $slug_perfil) {

        $query_a = $this->db->get_where('categorias', array('slug_categoria' => $slug_categoria));
        $query_c = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));

        if($query_a->num_rows() != 1 || $query_c->num_rows() != 1) {
            redirect();
        }

        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie($slug_categoria . $slug_perfil . '_categoria_avaliacao', FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $slug_categoria . $slug_perfil . '_categoria_avaliacao',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_categoria_positivo($slug_categoria); 
            $this->count_hits->update_categoria_utilidade_positivo($slug_categoria, $slug_perfil);
        }

        $this->session->set_userdata($slug_categoria, TRUE);
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');

    }

    function indicador_4($slug_categoria, $slug_perfil) {

        $query_a = $this->db->get_where('categorias', array('slug_categoria' => $slug_categoria));
        $query_c = $this->db->get_where('perfis', array('slug_perfil' => $slug_perfil));

        if($query_a->num_rows() != 1 || $query_c->num_rows() != 1) {
            redirect();
        }

        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie($slug_categoria . $slug_perfil . '_categoria_avaliacao', FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array(
                "name" => $slug_categoria . $slug_perfil . '_categoria_avaliacao',
                "value" => "$ip", 
                "expire" => time() + 7200, //tempo para contar de novo
                "secure" => false 
            );
            $this->input->set_cookie($cookie); 
            $this->count_hits->update_counter_categoria_negativo($slug_categoria); 
            $this->count_hits->update_categoria_utilidade_negativo($slug_categoria, $slug_perfil);
        }

        $this->session->set_userdata($slug_categoria, TRUE);
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');

    }

    /*to de olho*/
    function total_confirmacoes($idIncidente, $incidente) {
        $this->count_hits->update_total_confirmacoes($idIncidente);
    }

}
