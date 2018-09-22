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
                echo "<br><br>Imagens da Home";
                echo $output;
                echo "<br>";
                echo anchor('/home_edit', 'Home edit', 'title="Home edit"');
                ?>
            </div>
        </div>