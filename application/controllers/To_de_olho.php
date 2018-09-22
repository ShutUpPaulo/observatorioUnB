<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe para a página Tô de Olho!
 * Extends CI_Controller
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class To_de_olho extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

    public function index() {
        $data['home'] = $this->consulta->home();
        $data['perfis'] = $this->consulta->perfis();
        // $data['home_imagens'] = $this->consulta->home_imagens();
        $data['recentes'] = $this->consulta->recentes();

        // $this->add_count_home_acesso('home');

        $this->template->set('currentPage', 'To_de_olho');
        // $this->template->set('css', array('home'));
        // $this->template->set('js', array('home'));
        $this->template->load('template/index', 'to_de_olho/index', $data);
    }

    public function reportar() {
        $data['home'] = $this->consulta->home();
        $data['perfis'] = $this->consulta->perfis();
        $data['incidentes_tipos'] = $this->consulta->incidentes_tipos_dropdown_list();
        // $data['home_imagens'] = $this->consulta->home_imagens();
        // $data['recentes'] = $this->consulta->recentes();

        // $this->add_count_home_acesso('home');

        $this->template->set('currentPage', 'To_de_olho');
        $this->template->set('css', array('to_de_olho'));
        $this->template->set('js', array('maps', 'to_de_olho'));
        $this->template->load('template/index', 'to_de_olho/reportar', $data);
    }

    public function enviar() {
        // $selectTipo = $this->input->post('selectTipo');
        // echo $selectTipo;

        // // $teste = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter
        // $teste = $this->input->post(NULL, FALSE); // returns all POST items without XSS filter
        // var_dump($teste);

        if (!$this->session->session_id || !$this->session->userdata('logado')) {
            redirect('');
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('selectTipo', 'Tipo do Incidente', 'trim|required');
            $this->form_validation->set_rules('latitude', 'Indique a localização', 'trim|required');
            $this->form_validation->set_rules('longitude', 'Indique a localização', 'trim|required');
            $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[1]|max_length[500]');
            // $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('estado', 'Estado', 'trim|required|min_length[2]|max_length[2]');
            $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|min_length[2]|max_length[60]');
            // $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');

            $config['upload_path']          = './painel/assets/uploads/images/incidentes/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 600;
            $config['max_width']            = 2048;
            $config['max_height']           = 1536;
            $config['encrypt_name']         = TRUE;

            $this->load->library('upload', $config);

            // if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('imagem')) {//imagem obrigatoria
            if ($this->form_validation->run() == FALSE) {
                $this->reportar();
            } else {
                
                $data = array(
                    'id_tipo_incidente'     => $this->input->post('selectTipo'),
                    'latitude'              => $this->input->post('latitude'),
                    'longitude'             => $this->input->post('longitude'),
                    'cep'                   => $this->input->post('cep'),
                    'endereco_completo'     => $this->input->post('endereco'),
                    'estado'                => $this->input->post('estado'),
                    'cidade'                => $this->input->post('cidade'),
                    'bairro'                => $this->input->post('bairro'),
                    'logradouro'            => $this->input->post('logradouro'),
                    'numero'                => $this->input->post('numero'),
                    'complemento'           => $this->input->post('complemento'),
                    'id_usuario'            => $this->session->userdata('id_usuario'),
                    'cidade'                => $this->input->post('cidade'),
                    'descricao_incidente'   => $this->input->post('descricao'),
                    'imagem_incidente'      => $this->upload->data('file_name')
                );
                
                $this->load->model('inserir');
                if ($this->inserir->incidente($data)) {
                    $attr_link = array(
                        'title' => 'Ver mapa',
                        'class' => 'white-text underline'
                    );
                    $this->session->set_flashdata('msg', '<div class="returnMsg green">Incidente reportado com sucesso! Você pode acompanhar incidentes no ' . anchor('to_de_olho/mapa','mapa', $attr_link) . '.</div>');
                    redirect('to_de_olho');
                } else {
                    $this->session->set_flashdata('msg','<div class="returnMsg red">Erro! Por favor tente novamente mais tarde.</div>');
                    redirect('to_de_olho');
                }
            }
        }
    }

    public function get_markers() {
        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);
        // $this->load->model('consulta');
        $mapdata = new Consulta();

        // foreach ( $mapdata->getmappoints()->result() as $row ) {
        foreach ( $mapdata->incidentes() as $row ) {
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);
            $newnode->setAttribute("descricao", $row->descricao_incidente);
            $newnode->setAttribute("imagem", $row->imagem_incidente);
            $newnode->setAttribute("lat", $row->latitude);
            $newnode->setAttribute("lng", $row->longitude);
            $newnode->setAttribute("id_tipo", $row->id_tipo_incidente);
            $newnode->setAttribute("tipo", $row->tipo_incidente);
            $newnode->setAttribute("id_incidente", $row->id_incidente);
            $newnode->setAttribute("total_confirmacoes_existencia", $row->total_confirmacoes_existencia);
        }

        header("Content-type: text/xml");
        echo $dom->saveXML();
    }

    public function mapa() {
        $data['home'] = $this->consulta->home();
        $data['perfis'] = $this->consulta->perfis();
        $data['incidentes'] = $this->consulta->incidentes();
        $data['incidentes_tipos'] = $this->consulta->incidentes_tipos_dropdown_list();

        // $data['home_imagens'] = $this->consulta->home_imagens();
        // $data['recentes'] = $this->consulta->recentes();

        // $this->add_count_home_acesso('home');

        $this->template->set('currentPage', 'To_de_olho');
        $this->template->set('css', array('to_de_olho-ver_mapa'));
        $this->template->set('js', array('maps', 'to_de_olho-ver_mapa'));
        $this->template->load('template/index', 'to_de_olho/mapa', $data);       
    }

}