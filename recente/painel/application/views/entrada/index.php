<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Painel Admin Observatorio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css" media="screen,projection">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css" media="screen,projection">
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
                <?php
                $atributos = array ('class' => 'formlogin', 'id' => 'formlogin');
                echo form_open('entrada/login', $atributos);
                        echo "<div class='input-field'>";
                            $data = array(
                                'name'          => 'usuario',
                                'id'            => 'usuario'
                            );
                            echo form_input($data);
                            echo form_label('Usuário', 'usuario');
                        echo "</div><div class='input-field'>";
                            $data = array(
                                'name'          => 'senha',
                                'id'            => 'senha'
                            );
                            echo form_password('senha');
                            echo form_label('Senha', 'senha');
                        echo "</div>";
                        $atributos = array ('class' => 'btlogin', 'id' => 'btlogin');
                        echo form_submit('btnSubmit', 'Efetuar Login', $atributos);
                    //echo form_fieldset_close();
                echo form_close();
                ?>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.js"></script>
    </body>
</html>