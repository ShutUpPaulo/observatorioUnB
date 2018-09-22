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
				<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Cadastro</h2>
			</div>
		</div>
		<div class="col s12 m9">
			<p class="light justify">
				Faça aqui seu cadastro.
			</p>
		</div>
	</div>
 	<div class="row">
		<?php 
			if (!$this->session->session_id || !$this->session->userdata('logado')) {

				echo '<div class="col s9 m6">
						<p class="light justify">
							
						</p>';
	            /*    $atributos = array ('class' => 'formlogin', 'id' => 'formlogin');
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
	            echo '</div>';*/
	            $attributes = array("name" => "registrationform");
	                echo form_open("cadastro", $attributes);?>
	                <div class="">
	                    <label for="usuario">Nome de usuário</label>
	                    <input class="" name="usuario" placeholder="Seu usuario de usuário" type="text" value="<?php echo set_value('usuario'); ?>" />
	                    <span class=""><?php echo form_error('usuario'); ?></span>
	                </div>

	                <div class="">
	                    <label for="nome">Nome completo</label>
	                    <input class="" name="nome" placeholder="Seu nome completo" type="text" value="<?php echo set_value('nome'); ?>" />
	                    <span class=""><?php echo form_error('nome'); ?></span>
	                </div>
	                
	                <div class="">
	                    <label for="email">Email</label>
	                    <input class="" name="email" placeholder="Seu email" type="text" value="<?php echo set_value('email'); ?>" />
	                    <span class=""><?php echo form_error('email'); ?></span>
	                </div>

	                <div class="">
	                    <label for="cemail">Confirme Email</label>
	                    <input class="" name="cemail" placeholder="Por favor, confirme seu email" type="text" value="<?php echo set_value('cemail'); ?>" />
	                    <span class=""><?php echo form_error('cemail'); ?></span>
	                </div>

	                <div class="">
	                    <label for="senha">Senha</label>
	                    <input class="" name="senha" placeholder="Mínimo de 6 caracteres" type="password" />
	                    <span class=""><?php echo form_error('senha'); ?></span>
	                </div>

	                <div class="">
	                    <label for="csenha">Confirme Senha</label>
	                    <input class="" name="csenha" placeholder="Confirme sua senha" type="password" />
	                    <span class=""><?php echo form_error('csenha'); ?></span>
	                </div>

	                <div class="">
	                    <button name="cancel" type="reset" class="btn">Apagar tudo</button>
	                    <button name="submit" type="submit" class="btn right">Cadastrar</button>
	                </div>
	                <?php echo form_close(); ?>
	                <?php echo $this->session->flashdata('msg'); ?>
	        </div>
	    </div>



	            <?php
            
            } else {

            	echo '<div class="col s9 m6">
						<p class="light justify">
							Você já está cadastrado e está logado!
						</p>
					</div>';

			}
		?>

		

	</div>
</div>