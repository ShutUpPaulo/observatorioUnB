<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $title ?></title>
    <!-- <link href="<?php echo base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon" type="image/ico" /> -->
    <meta name="description" content="<?php echo $description ?>">
    <meta name="keywords" content="<?php echo $keywords ?>">
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

    <!-- HEADER -->

    <!-- dropdown perfil -->
    <ul id="dropdownPerfil" class="dropdown-content myDropContent">
        <?php foreach ($perfis as $perfil):
            $attr_link = array(
                'title' => $perfil->descricao_perfil,
                'class' => 'truncate'
            );
            echo '<li>' . anchor(
                $perfil->slug_perfil,
                $perfil->perfil  . '<span class="badge">novo</span>',
                $attr_link
            ) . '</li>';
        endforeach; ?>
    </ul>
    <!-- dropdown perfil mobile-->
    <ul id="dropdownPerfilMobile" class="dropdown-content myDropContent">
        <?php foreach ($perfis as $perfil):
            $attr_link = array(
                'title' => $perfil->descricao_perfil,
                'class' => 'truncate'
            );
            echo '<li>' . anchor(
                $perfil->slug_perfil,
                $perfil->perfil  . '<span class="badge">novo</span>',
                $attr_link
            ) . '</li>';
        endforeach; ?>
    </ul>

    <?php if ($currentPage != 'Home') { ?>
        <!-- menu categorias -->
        <ul id="dropdownCat" class="dropdown-content myDropContent">
            <?php foreach ($categorias as $categoria):
                $attr_link = array(
                    'title' => $categoria->descricao_categoria,
                    'class' => 'truncate'
                );
                echo '<li>' . anchor(
                    $categoria->slug_perfil . '/' . $categoria->slug_categoria,
                    $categoria->categoria . '<span class="badge">novo</span>',
                    $attr_link
                ) . '</li>';
            endforeach; ?>
            <!-- <li class="divider"></li> -->
        </ul>
        <ul id="dropdownCatMobile" class="dropdown-content myDropContent">
            <?php foreach ($categorias as $categoria):
                $attr_link = array(
                    'title' => $categoria->descricao_categoria,
                    'class' => 'truncate'
                );
                echo '<li>' . anchor(
                    $categoria->slug_perfil . '/' . $categoria->slug_categoria,
                    $categoria->categoria . '<span class="badge">novo</span>',
                    $attr_link
                ) . '</li>';
            endforeach; ?>
            <!-- <li class="divider"></li> -->
        </ul>
    <?php } ?>

    <div class="row headerTop">
        <div class="col s12">
            <nav class="white <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?> z-depth-0">
                <div class="nav-wrapper">
                    <div id ="topMenu" class="container center">
                        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                        <?php
                            $attr_link = array(
                                'title' => 'home',
                                'class' => 'brand-logo'
                            );
                            echo anchor(
                                '',
                                'Obs',
                                $attr_link
                            );
                        ?>
                        <ul class="side-nav" id="mobile-menu">
                            <?php if ($currentPage == 'Home') { ?>
                                <li><a href="#apresentacao">apresentação</a></li>
                                <!-- dropdown gatilho perfil home-->
                                <li><a class="dropdown-button truncate" href="#perfis" data-activates="dropdownPerfilMobile">escolha o perfil de acesso<i class="material-icons right">arrow_drop_down</i></a></li>
                                <li><a href="#destaques">destaques</a></li>
                            <?php } else { ?>
                                <!-- dropdown gatilho perfil -->
                                <li><a class="dropdown-button truncate" href="#!" data-activates="dropdownPerfilMobile">trocar o perfil de acesso<i class="material-icons right">arrow_drop_down</i></a></li>
                                <li><a class="dropdown-button truncate" href="#!" data-activates="dropdownCatMobile">escolha uma categoria<i class="material-icons right">arrow_drop_down</i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="divider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>"></div>
        </div>
        <div class="col s12 hide-on-med-and-down">
            <nav class="white <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?> z-depth-0">
                <div class="nav-wrapper">
                    <ul id="mainMenu" class="center">
                        <?php if ($currentPage == 'Home') { ?>
                            <li><a href="#apresentacao">apresentação</a></li>
                            <!-- dropdown gatilho perfil home-->
                            <li><a class="dropdown-button" href="#perfis" data-activates="dropdownPerfil">escolha o perfil de acesso<i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a href="#destaques">destaques</a></li>
                        <?php } else { ?>
                            <!-- dropdown gatilho perfil -->
                            <li><a class="dropdown-button" href="#!" data-activates="dropdownPerfil">trocar o perfil de acesso<i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a class="dropdown-button" href="#!" data-activates="dropdownCat">escolha uma categoria<i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
            <div class="divider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>"></div>
        </div>
    </div>
    <!-- CONTENT -->
    <?php echo $contents ?>
    <!-- FOOTER -->
    <?php foreach ($home as $content):
        //if ($currentPage == 'Home') {  ?>
            <footer class="page-footer <?php echo $content->cor . ' ' . $content->cor_intensidade; ?>">
        <?php /*} else {
            foreach ($perfil_atual as $atual)://ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?) ?>
                <footer class="page-footer <?php echo $atual->cor . ' ' . $atual->cor_intensidade; ?>">
            <?php endforeach;
        } ?>
    <?php */endforeach; ?>
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © <?php echo date('Y') ?> Copyright Observatório de Resíduos
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a> 
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

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
            echo '
            <script type="text/javascript" src="' . base_url() . 'assets/js/' . $file . '.js"></script>';
        }
    }
    ?>
</body>
</html>