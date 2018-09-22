<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Painel Admin Observatorio</title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css" media="screen,projection">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css" media="screen,projection">
        <?php
        if (!empty($css_files)) {
        	foreach($css_files as $file): ?>
        	    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	        <?php endforeach;
	    }
	    if (!empty($js_files)) {
	        foreach($js_files as $file): ?>
	            <script src="<?php echo $file; ?>"></script>
	        <?php endforeach;
	    }
	    ?>
    </head>
    <body>
    	<div id="wrap">
            <div id="header">
                <?php /* if (!$this->session->userdata('usr_id')) { ?>
                    <div class="loginBox">
                        
                    </div>
                <?php } else { ?>
                    <div class="logadoBox">
                        
                    </div>
                <?php } **/ ?>
            </div>
            <div id="contents">
                <nav>
                    <div class="nav-wrapper teal">
                        <span>&nbsp&nbsp&nbsp</span>
                        <a href="<?php echo base_url(); ?>home" class="brand-logo">Obs.</a>
                        <ul class="right hide-on-med-and-down">
                            <!-- <li><a href="#"><i class="material-icons">search</i></a></li> -->
                            <li><a href="<?php echo base_url(); ?>home"><i class="material-icons">home</i></a></li>
                            <li><a href="#"><i class="material-icons">refresh</i></a></li>
                            <li><a href="#"><i class="material-icons">settings</i></a></li>
                            <li><a href="<?php echo base_url(); ?>home/logout"><i class="material-icons right">exit_to_app</i>Sair</a></li>
                        </ul>
                        <ul class="right">
                            Bem vindo, 

                            <?php
                            echo $this->session->userdata('usuario');
                            ?>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </ul>
                    </div>
                </nav>