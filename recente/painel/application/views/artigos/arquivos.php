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
                echo "<br><br>Arquivos do Artigos";
                echo $output;
                echo "<br>";
                echo anchor('/artigos', 'Artigos', 'title="Artigos"');
                ?>
            </div>
        </div>