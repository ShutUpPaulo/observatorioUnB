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
				<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Login</h2>
			</div>
		</div>
		<div class="col s12 m9">
			<p class="light justify">
				Faça aqui seu login.
			</p>
		</div>
	</div>
 	<div class="row">
		<?php 
			if (!$this->session->session_id || !$this->session->userdata('logado')) {

				echo '<div class="col s9 m6">
						<p class="light justify">
							
						</p>';
	                $atributos = array ('class' => 'formlogin', 'id' => 'formlogin');
	                echo form_open('cadastro/acesso', $atributos);
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
                        echo '<div class="input-field col s12">';
					        $data = array(
						        'name'          => 'enviar',
						        'id'            => 'enviar',
						        'type'          => 'submit',
						        'content'       => 'Logar<i class="material-icons right">send</i>',
						        'class'			=> 'btn waves-effect waves-light right'
							);

							echo form_button($data);
					    echo '</div>';
	                echo form_close();
	            echo '<a href="' . base_url('cadastro/esqueci_senha') . '">Esqueci minha senha</a></div>';
            
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