<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $title ?></title>
    <!-- <link href="<?php //echo base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon" type="image/ico" /> -->
    <meta name="description" content="<?php echo $description ?>">
    <meta name="keywords" content="<?php echo $keywords ?>">
    <META NAME="robots" CONTENT="noindex, nofollow">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <?php
    //CSS
    if (isset($css_geral)) {
        foreach ($css_geral as $file) {
            $link = array(
                'href'  => 'assets/css/' . $file . '.css',
                'rel'   => 'stylesheet',
                'type'  => 'text/css',
                'media' => 'screen,projection'
            );
            echo link_tag($link);
        }
    }
    if (isset($css)) {
        foreach ($css as $file) {
            $link = array(
                'href'  => 'assets/css/' . $file . '.css',
                'rel'   => 'stylesheet',
                'type'  => 'text/css',
                'media' => 'screen,projection'
            );
            echo link_tag($link);
        }
    }
    ?>
</head>
<body>
    <!--[if IE 7]>
    <div id="wrap_ie">
        <style type="text/css">
        /*. , # {display: none;}*/
        </style>
        <p class="txtIes">
            Seu navegador não carrega esse site corretamente.<br>
            Para acessá-lo, escolha uma das opções abaixo:
        </p>
        <a id="download_ie" href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank">
            Gostaria de atualizar a versão do meu Internet Explorer
        </a>
        <a id="download_chrome" href="https://www.google.com/intl/pt-BR/chrome/browser/" target="_blank">
            Gostaria de utilizar outro navegador: Google Chrome
        </a>
        <a id="download_firefox" href="https://www.mozilla.org/pt-BR/firefox/new/" target="_blank">
            Gostaria de utilizar outro navegador: Mozilla Firefox
        </a>
    </div>
    <![endif]-->

    <?php
        //controla perfil escolhido
        if (!$this->session->has_userdata('perfil_escolhido')) {
            $this->session->set_userdata('perfil_escolhido', 'cidada_o');
        }
        if ($currentPage == 'Perfil') {
            $this->session->set_userdata('perfil_escolhido', $perfil_atual[0]->slug_perfil);
        }
        //mensagem para o usuário
        echo $this->session->flashdata('msg');
    ?>

    <!-- HEADER -->
    <div class="headerBox <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?> white-text">
        <div class="container headerTop">
            <div class="row">
                <div class="col s7">
                    <?php
                        $attr_link = array(
                            'title' => 'home',
                            'class' => 'left brand-logo white-text waves-effect waves-light'
                        );
                        echo anchor(
                            '',
                            '&nbsp;&nbsp;Obs&nbsp;&nbsp;',
                            $attr_link
                        );/*
                    ?>
                    <!-- <div class="left betaFaixa"></div> -->
                    <a class="right white-text expandeHeader tooltipped" data-position="bottom" data-delay="50" data-tooltip="expandir"><i class="material-icons">menu</i></a>
                    <a class="right white-text contraiHeader tooltipped hide" data-position="bottom" data-delay="50" data-tooltip="fechar"><i class="material-icons">menu</i></a>*/?>
                </div>
                <div class="col s3">
                    <span class="right">
                        <?php
                            if (!$this->session->session_id || !$this->session->userdata('logado')) {
                                echo '<a class="white-text" href="' . base_url('cadastro/login') . '">login</a> | 
                                        <a class="white-text" href="' . base_url('cadastro') . '">cadastro</a>';
                            } else {
                                echo '<span>Bem-vindo(a), ' . $this->session->userdata('usuario') . ' | <a class="white-text" href="' . base_url() .'cadastro/logout">sair</a></span>';
                            }
                        ?>
                    </span>
                </div>
                <div class="col s2">
                    <a class="abreModalPerfis waves-effect waves-light right" href="#modalPerfis">
                        <div class="row valign-wrapper">
                            <div class="col s4">
                                <img height="40" src="<?php foreach ($perfis as $perfil):
                                        if ($perfil->slug_perfil == $this->session->perfil_escolhido) {
                                            echo base_url('painel/assets/uploads/images') . '/' . $perfil->capa_perfil;
                                        }
                                    endforeach; ?>" alt="" class="circle valign white">
                            </div>
                            <div class="col s8">
                                <span class="white-text perfilTituloNav">
                                    <?php foreach ($perfis as $perfil):
                                        if ($perfil->slug_perfil == $this->session->perfil_escolhido) {
                                            echo $perfil->perfil;
                                        }
                                    endforeach; ?>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php /*div class="col s12">
                    <div class="divider white"></div>
                </div */ ?>
            </div>
        </div>  
        <?php /* div class="container">
            <div class="row">
                <div class="col s3">
                    <ul class="menuHeader left">
                        <li>perfis</li>
                        <?php foreach ($perfis as $perfil):
                            if ($perfil->perfil == 'perfil') {
                                continue;
                            }
                            $attr_link = array(
                                'title' => $perfil->descricao_perfil,
                                'class' => 'menuLink white-text'
                            );
                            echo '<li>' . anchor(
                                $perfil->slug_perfil,
                                $perfil->perfil,
                                $attr_link
                            ) . '</li>';
                        endforeach; ?>
                    </ul>
                </div>
                <div class="col s3">
                    <?php if ($currentPage != 'Home' && $currentPage != 'To_de_olho') { ?>
                        <!-- menu categorias -->
                        <ul class="menuHeader left">
                            <li>categorias</li>
                            <?php foreach ($categorias as $categoria):
                                $attr_link = array(
                                    'title' => $categoria->descricao_categoria,
                                    'class' => 'menuLink white-text'
                                );
                                echo '<li>' . anchor(
                                    $categoria->slug_perfil . '/' . $categoria->slug_categoria,
                                    $categoria->categoria,
                                    $attr_link
                                ) . '</li>';
                            endforeach; ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="col s6">
                    <?php if ($currentPage == 'Artigo' && $perfil_atual[0]->perfil != 'perfil') { ?>
                        <!-- menu artigos -->
                        <ul class="menuHeader left">
                            <li>artigos</li>
                            <?php foreach ($artigos as $artigo):
                                $attr_link = array(
                                    'title' => $artigo->descricao_artigo,
                                    'class' => 'menuLink white-text'
                                );
                                echo '<li>' . anchor(
                                    $artigo->slug_perfil . '/' . $artigo->slug_categoria . '/' . $artigo->slug_artigo,
                                    $artigo->titulo_artigo,
                                    $attr_link
                                ) . '</li>';
                            endforeach; ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div */?>
    </div>
    <!-- modal perfis -->
    <div id="modalPerfis" class="modal modal-fixed-footer">
        

                    <ul class="tabs myTabs">
                        <?php foreach ($perfis as $perfil):
                            echo '<li class="tab myTab"><a class="';
                            if ($perfil->slug_perfil == $this->session->perfil_escolhido) {
                                echo 'active ';
                            }
                            echo 'tooltipped" href="#tab_' . $perfil->slug_perfil . '" data-position="bottom" data-delay="50" data-tooltip="' . $perfil->perfil . '"><img width="100%" src="' . base_url('painel/assets/uploads/images') . '/' . $perfil->capa_perfil . '"/></a></li>';
                        endforeach; ?>
                    </ul>
        
        <div class="modal-content">
            <div class="row">
                
                <?php foreach ($perfis as $perfil):
                    echo '<div id="tab_' . $perfil->slug_perfil . '" class="col s12 justify">';
                        //if ($perfil->slug_perfil != 'cidada_o') {
                            echo '<a href="' . base_url($perfil->slug_perfil) . '" class="btPefilModal right waves-effect waves-light btn"><i class="material-icons right">portrait</i>Escolher</a>';
                        //}
                        /*echo  '<a ';
                        if ($perfil->slug_perfil != 'cidada_o') {
                            echo 'href="' . base_url($perfil->slug_perfil) .'" ';
                        }
                        echo 'class="right ';
                        if ($perfil->slug_perfil != 'cidada_o') {
                            echo 'waves-effect ';
                        }
                        echo 'waves-' . $home[0]->cor . 'tooltipped" data-position="bottom" data-delay="50" data-tooltip="' . $perfil->perfil . '">
                                <div class="row">
                                    <div class="col s10">
                                        <img width="100%" src="' . base_url('painel/assets/uploads/images') . '/' . $perfil->capa_perfil . '"/>
                                    </div>
                                </div>
                            </a>';*/
                        //echo '<h2>' . $perfil->perfil . '</h2>';
                        echo '<div class="myDivider ' . $home[0]->cor . ' ' . $home[0]->cor_intensidade . '">
                            <h2 class="' . $home[0]->cor . '-text text-' . $home[0]->cor_intensidade . '">' . $perfil->perfil . '</h2>
                        </div>';
                        echo '<div>' . $perfil->descricao_perfil . '</div>';
                    echo '</div>';
                endforeach; ?>
            </div>
        </div>
        <div class="modal-footer center">
            <a class="modal-action modal-close waves-effect waves-green btn-flat" style="float: none;">Fechar</a>
        </div>
    </div>
    <!-- fim modal perfis -->

    <?php if ($currentPage != 'Home' && $currentPage != 'To_de_olho') { //BT RODAPE FIXO?>
        <div class="fixed-action-btn" style="bottom: 45px; right: 45px;">
            <a class="btn-floating btn-large blue tooltipped" data-position="top" data-delay="50" data-tooltip="Tô de Olho!" href="<?php echo base_url('to_de_olho'); ?>">
                <i class="large material-icons">loupe</i>
            </a>
        </div>
    <?php } ?>

    <!-- CONTENT -->
    <?php echo $contents ?>

    <!-- FOOTER -->
    <?php foreach ($home as $content):
        //if ($currentPage == 'Home') {  ?>
            <footer class="page-footer <?php echo $content->cor . ' ' . $content->cor_intensidade; ?>">
        <?php /*} else {
            <footer class="page-footer <?php echo $perfil_atual[0]->cor . ' ' . $atual->cor_intensidade; ?>">
        } ?>
    <?php */endforeach; ?>
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Observatório de Resíduos</h5>
                    <p class="grey-text text-lighten-4">O Observatório de Resíduos é uma iniciativa do LACIS, FAU, CDS e FGA da UnB.</p>
                </div>
                <?php /*div class="col l4 offset-l2 s12 right-align">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div */ ?>
            </div>
        </div>
        <div class="logoBox">
            <div class="container">
                <img width="100%" src="<?php echo base_url('assets/img/rodape_logos.jpg') ?>"/>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center">
                © <?php echo date('Y') ?>
            </div>
        </div>
    </footer>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-81824854-1', 'auto');
        ga('send', 'pageview');
    </script>

    <?php
    //JS
    if (isset($js_geral)) {
        foreach ($js_geral as $file) {
            echo '
            <script type="text/javascript" src="' . base_url() . 'assets/js/' . $file . '.js"></script>';
        }
    }
    if (isset($js)) {
        foreach ($js as $file) {
            if ($file != 'maps') {
                echo '
                <script type="text/javascript" src="' . base_url() . 'assets/js/' . $file . '.js"></script>';    
            } else {
                echo 
                //'<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA3KWGY3b_tmiooPh9mcaKCX-QgrYNukLA"></script>';
                '<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAe3Ouv_uFwNRGCqvCQ893y0z8tXraW-xs"></script>';
            }
        }
    }
    ?>
</body>
</html>