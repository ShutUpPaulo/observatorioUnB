<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title ?></title>
    <!-- <link href="<?php echo base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon" type="image/ico" /> -->
    <meta name="description" content="<?php echo $description ?>" />
    <meta name="keywords" content="<?php echo $keywords ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.alerts.css'); ?>"> -->
    <?php
    if (isset($css)) {
        foreach ($css as $file) {
            echo '
			<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $file . '.css" media="screen,projection">';
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
    <div id="loading_layer">
        <div id="preloader"></div>
    </div>
    <!-- HEADER -->
    <?php if ($currentPage != 'Home') { ?>
        <ul id="dropdown1" class="dropdown-content myDropContent">
            <?php
            // var_dump($perfis);
            foreach ($perfis as $perfil):
            echo '<li>';
                $attr_link = array(
                    'title' => $perfil->descricao_perfil,
                    'class' => ''
                );
                echo anchor(
                    $perfil->slug_perfil,
                    $perfil->perfil  . '<span class="badge">novo</span>',
                    $attr_link
                );
            echo '</li>';
            endforeach;
            ?>
            <!-- <li class="divider"></li> -->
        </ul>
        <ul id="dropdown2" class="dropdown-content myDropContent">
            <?php
            // var_dump($perfis);
            foreach ($perfis as $perfil):
            echo '<li>';
                $attr_link = array(
                    'title' => $perfil->descricao_perfil,
                    'class' => ''
                );
                echo anchor(
                    $perfil->slug_perfil,
                    $perfil->perfil . '<span class="badge">novo</span>',
                    $attr_link
                );
            echo '</li>';
            endforeach;
            ?>
            <!-- <li class="divider"></li> -->
        </ul>
        <?php if ($currentPage == 'Categoria' || $currentPage == 'Artigo') { ?>
        <!-- menu categorias -->
        <ul id="dropdownCat1" class="dropdown-content myDropContent">
            <?php
            //var_dump($perfil_atual);
            foreach ($perfil_atual as $atual):
                foreach ($categorias as $categoria):
                echo '<li>';
                    $attr_link = array(
                        'title' => $categoria->descricao_categoria,
                        'class' => ''
                    );
                    echo anchor(
                        $atual->slug_perfil . '/' . $categoria->slug_categoria,
                        $categoria->categoria  . '<span class="badge">novo</span>',
                        $attr_link
                    );
                echo '</li>';
                endforeach;
            endforeach;
            ?>
            <!-- <li class="divider"></li> -->
        </ul>
        <ul id="dropdownCat2" class="dropdown-content myDropContent">
            <?php
            // var_dump($perfis);
            foreach ($categorias as $categoria):
            echo '<li>';
                $attr_link = array(
                    'title' => $categoria->descricao_categoria,
                    'class' => ''
                );
                echo anchor(
                    $categoria->slug_categoria,
                    $categoria->categoria . '<span class="badge">novo</span>',
                    $attr_link
                );
            echo '</li>';
            endforeach;
            ?>
            <!-- <li class="divider"></li> -->
        </ul>
        <?php } ?>
        <div class="navbar-fixed <?php if ($currentPage == 'Perfil' || $currentPage == 'Categoria') { echo 'navbar-fixed-perfil'; } ?>">
            <?php
                // if ($currentPage == 'Perfil') {
                //     echo '<nav class="transp perfil" role="navigation">';
                // } else {
                //     echo '<nav class="green-nav" role="navigation">';
                // }
            ?>
            <?php //var_dump($home); ?>
            <?php foreach ($perfil_atual as $atual)://ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?) ?>
            <nav class="green-nav <?php echo $atual->cor . ' ' . $atual->cor_intensidade; ?>" role="navigation">
            <?php endforeach; ?>
                <div class="nav-wrapper container">
                    <a id="logo-container" href="<?php echo base_url(); ?>" class="brand-logo">Obs.R</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#">Sobre</a></li>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Perfis<i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php if ($currentPage == 'Categoria' || $currentPage == 'Artigo') { ?>
                            <li><a class="dropdown-button" href="#!" data-activates="dropdownCat1">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php } ?>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        <li><a href="#">Sobre</a></li>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Perfis<i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php if ($currentPage == 'Categoria' || $currentPage == 'Artigo') { ?>
                            <li><a class="dropdown-button" href="#!" data-activates="dropdownCat2">Categorias<i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php } ?>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>
        </div>
        <!-- <a href="<?php echo base_url('home'); ?>" class="linkHome"></a>
        <ul class="navigation">
            <?php foreach ($nav_list as $i => $nav_item) { ?>
                <li class="<?php if (isset($nav)) { echo ($nav == $i ? 'selectedMenu' : ''); } ?>">
                    <?php echo anchor($i, $nav_item, array('class' => 'link_' . $i)) ?>
                </li>
            <?php } ?>
        </ul> -->
    <?php } else {
        echo '<div class="homeClean"></div>';
    }
    ?>
    <?php /* if (!$this->session->userdata('usr_id')) { ?>
        <div class="loginBox">
            
        </div>
    <?php } else { ?>
        <div class="logadoBox">
            
        </div>
    <?php } **/ ?>
    <!-- CONTENT -->
    <?php echo $contents ?>
    <!-- FOOTER -->
    <?php /* var_dump($home); */ ?>
    <?php foreach ($home as $content):
        if ($currentPage == 'Home') {  ?>
        <footer class="page-footer <?php echo $content->cor . ' ' . $content->cor_intensidade; ?>">
        <?php } else {
        foreach ($perfil_atual as $atual)://ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?) ?>
            <footer class="page-footer <?php echo $atual->cor . ' ' . $atual->cor_intensidade; ?>">
        <?php endforeach;
        } ?>
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text"><?php echo $content->rodape_titulo; ?></h5>
                        <div class="white-text"><?php echo $content->rodape_texto; ?></div>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Lorem ipsum</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Dolor sit amet</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container center">
                    &copy; 2016
                </div>
            </div>
        </footer>
    <?php endforeach; ?>
    <!-- <div class="lightBox">
        <span class="fechaLightBox">X</span>
        <div class="lightContent"></div>
    </div>
    <div class="tapume"></div> -->
    <?php
    if (isset($js)) {
        foreach ($js as $file) {
            echo '
            <script type="text/javascript" src="' . base_url() . 'assets/js/' . $file . '.js"></script>';
        }
    }
    ?>
</body>
</html>