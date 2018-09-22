<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe para as páginas padrão de conteúdo
 * Páginas fora do padrão /perfil/[categoria]/[artigo]/ precisam ser tratadas no config/routes.php para não cair em página não encontrada
 * Extends CI_Controller
 * @author Rodrigo Dadamos <rodrigodadamos@gmail.com>
 * 
 * @see CI_Controller
 * 
 * @copyright 2016 Observatório
 */

class Content extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

	public function index($perfil, $categoria = null, $artigo = null) {

        $data['home'] = $this->consulta->home();
        $data['perfis'] = $this->consulta->perfis();
        $data['categorias'] = $this->consulta->categorias($perfil);
        // $this->template->set('css', array('materialize', 'style', 'style.obs3r'));
        // $this->template->set('js', array('jquery-2.1.1.min', 'materialize', 'jquery.countTo', 'init'));
        //$this->template->set('css', array('content'));
        //$this->template->set('js', array('content'));

		if ($categoria == null) {//pg perfil

            if ($data['perfil_atual'] = $this->consulta->perfis($perfil)) {

                $this->template->set('currentPage', 'Perfil');        
                $this->template->load('template/index', 'perfil/index', $data);

            } else {

                show_404();

            }

        } else if ($artigo == null) {//pg categoria

            if ($data['categoria'] = $this->consulta->categorias($perfil, $categoria)) {

                $data['perfil_atual'] = $this->consulta->perfis($perfil);
                $data['artigos'] = $this->consulta->artigos($perfil, $categoria);

                $this->template->set('currentPage', 'Categoria');
                $this->template->load('template/index', 'categoria/index', $data);

            } else {

                show_404();

            }

        } else {//pg artigo

            if ($data['artigo'] = $this->consulta->artigos($perfil, $categoria, $artigo)) {

                $data['perfil_atual'] = $this->consulta->perfis($perfil);
                $data['categoria'] = $this->consulta->categorias($perfil, $categoria);
                $data['artigos'] = $this->consulta->artigos($perfil, $categoria);
                $data['tags'] = $this->consulta->tags($artigo);
                $data['arquivos'] = $this->consulta->arquivos($artigo);

                $this->template->set('css', array('artigo'));
                $this->template->set('currentPage', 'Artigo');
                $this->template->load('template/index', 'artigo/index', $data);

            } else {

                show_404();

            }

        }

    }

}