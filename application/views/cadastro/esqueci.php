<div class="parallax-container parallax-container_to_de_olho">
  <div class="parallax">
    <img src="<?php echo base_url('assets/img/gestao_de_residuos.jpg') ?>">
  </div>
</div>
<br><br>
<div class="container" id="Login">
  <div class="row">
    <div class="col s12 justify">
      <div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
        <h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Esqueci Senha</h2>
      </div>
    </div>
    <div class="col s12 m9">
      <p class="light justify">
        Esqueceu sua senha? Nós te ajudamos.
      </p>
    </div>
  </div>
  <div class="row">
    <?php 
      if (!$this->session->session_id || !$this->session->userdata('logado')) {
        echo '<div class="col s9 m6">
            <p class="light justify">
              
            </p>';
            $atributos = array ('class' => 'formEsqueci', 'id' => 'formEsqueci');
            echo form_open('cadastro/esqueci_senha', $atributos);
                  echo "<div class='input-field'>";
                      echo form_input(array(
                        'name'=>'email', 
                        'id'=> 'email', 
                        'placeholder'=>'Email', 
                        'class'=>'form-control', 
                        'value'=> set_value('email')
                      ));
                      echo form_label('Email', 'email');
                  echo "</div>";
                  echo '<div class="input-field col s12">';
                    $data = array(
                      'name'          => 'enviar',
                      'id'            => 'enviar',
                      'type'          => 'submit',
                      'content'       => 'Enviar<i class="material-icons right">send</i>',
                      'class'         => 'btn waves-effect waves-light right'
                    );
                    echo form_button($data);
                  echo '</div>';
            echo form_close();
        echo '</div>';
      } else {
        echo '<div class="col s9 m6">
                <p class="light justify">
                  Você está logado!
                </p>
              </div>';
      }
    ?>
  </div>
</div>