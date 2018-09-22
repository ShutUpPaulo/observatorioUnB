<div class="parallax-container parallax-container_to_de_olho">
	<div class="parallax">
		<img src="<?php echo base_url('assets/img/gestao_de_residuos.jpg') ?>">
	</div>
</div>
<br><br>
<div class="container" id="apresentacaoTodeolho">
	<div class="row">
		<div class="col s12 justify">
			<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
				<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Tô de Olho! - Reportar Incidente</h2>
			</div>
		</div>
		<div class="col s12 m9">
			<p class="light justify">
				Selecione o tipo de incidente, localize o local do incidente no mapa, descreva o incidente acrescentando informações que facilitem a localização e incluindo uma foto.
			</p>
			<p>
				O nome e o email não serão divulgados.
			</p>
		</div>
	</div>
 	<div class="row">
		
		<?php 
			if (!$this->session->session_id || !$this->session->userdata('logado')) {

				echo '<div class="col s9 m6">
						<p class="light justify">
							Você precisa estar logado para reportar incidentes!
						</p>
						<a class="waves-effect waves-light btn" href="' . base_url('cadastro/login') . '">Login</a> &nbsp;
						<a class="waves-effect waves-light btn" href="' . base_url('cadastro') . '">Cadastro</a>
						<br><br>
					</div>';
            
            } else {

            	echo '<div class="col s12 m9">';
                
					echo validation_errors();
					
					$attributes = array('class' => 'col s12', 'id' => 'reportarForm');
					echo form_open_multipart('to_de_olho/enviar', $attributes);

						echo '<div id="passo_1" class="card-panel grey lighten-5 boxForm">
								<a class="btn-floating btn-large blue center btAtual">1</a>
								<a class="btn-floating btn-large disabled center">2</a>
								<a class="btn-floating btn-large disabled center">3</a>
								<a class="btn-floating btn-large disabled center">4</a>
								<p>Tipo do Incidente</p>';

							$attributes = array(
								'id'       => 'selectTipo'
							);
							echo '<div class="input-field col s12">';
							echo form_dropdown('selectTipo', $incidentes_tipos, '', $attributes);
							echo '<label>Tipo do incidente*</label></div>';

							echo '<div class="input-field col s12">';
					        $data = array(
						        'id'            => 'avancar_2',
						        'content'       => 'Avançar<i class="material-icons right">send</i>',
						        'class'			=> 'btn waves-effect waves-light right'
							);

							echo form_button($data);
						
						echo '</div></div>';

						// echo form_fieldset('Localização do Incidente');
						echo '<div id="passo_2" class="card-panel grey lighten-5 boxForm">
								<a class="btn-floating btn-large disabled center">1</a>
								<a class="btn-floating btn-large blue center btAtual">2</a>
								<a class="btn-floating btn-large disabled center">3</a>
								<a class="btn-floating btn-large disabled center">4</a>
								<p>Localização do Incidente</p>';
						
							echo '<div class="row">
								  <div class="input-field col s12">
									<a id="abreMapa" class="modal-trigger waves-effect waves-light btn" href="#mapa">Indique o localização no mapa</a>
									<i id="coordenadasPrenchidas" class="hide right small green-text material-icons">check circle</i>';
							echo '</div>';
							
							// $data = array(
							//         'latitude'  => '',
							//         'longitude' => ''
							// );
							// echo form_hidden($data);

							echo '<div class="input-field col s12 m6 hide">';
							$data = array(
							        'name'          => 'latitude',
							        'id'            => 'latitude',
							        'maxlength'     => '10',
							        'class'         => 'validate',
							        'value'			=> set_value('latitude')
							);
							echo form_input($data);
					        echo '<label for="latitude">Latitude</label></div>';

					        echo '<div class="input-field col s12 m6 hide">';
							$data = array(
							        'name'          => 'longitude',
							        'id'            => 'longitude',
							        'maxlength'     => '10',
							        'class'         => 'validate',
							        'value'			=> set_value('longitude')
							);
							echo form_input($data);
					        echo '<label for="longitude">Longitude</label></div>';
						
							echo '<div class="input-field col s12 hide" id="progressCep">
									<div class="progress">
										<div class="indeterminate"></div>
									</div>
								</div>
								<div class="input-field col s12 m6 hide">';
							$data = array(
							        'name'          => 'cep',
							        'id'            => 'cep',
							        'maxlength'     => '8',
							        'class'         => 'validate',
							        'value'			=> set_value('cep')
							);
							echo form_input($data);
					        echo '<label for="cep">CEP</label></div>';

					        echo '<div class="input-field col s12 m6">';
							$data = array(
							        'name'          => 'estado',
							        'id'            => 'estado',
							        'maxlength'     => '2',
							        'class'         => 'validate',
							        'value'			=> set_value('estado')
							);
							echo form_input($data);
					        echo '<label for="estado">Estado*</label></div>';

					        echo '<div class="input-field col s12 m6">';
							$data = array(
							        'name'          => 'cidade',
							        'id'            => 'cidade',
							        'maxlength'     => '60',
							        'class'         => 'validate',
							        'value'			=> set_value('cidade')
							);
							echo form_input($data);
					        echo '<label for="cidade">Cidade*</label></div>';

					        echo '<div class="input-field col s12 m6 hide">';
							$data = array(
							        'name'          => 'bairro',
							        'id'            => 'bairro',
							        'maxlength'     => '60',
							        'class'         => 'validate',
							        'value'			=> set_value('bairro')
							);
							echo form_input($data);
					        echo '<label for="bairro">Bairro</label></div>';

					        echo '<div class="input-field col s12 m6 hide">';
							$data = array(
							        'name'          => 'logradouro',
							        'id'            => 'logradouro',
							        'maxlength'     => '100',
							        'class'         => 'validate',
							        'value'			=> set_value('logradouro')
							);
							echo form_input($data);
					        echo '<label for="logradouro">Endereço</label></div>';

					        echo '<div class="input-field col s12 m6">';
							$data = array(
							        'name'          => 'numero',
							        'id'            => 'numero',
							        'maxlength'     => '100',
							        'class'         => 'validate',
							        'value'			=> set_value('numero')
							);
							echo form_input($data);
					        echo '<label for="numero">Número</label></div>';

					        echo '<div class="input-field col s12 m6">';
							$data = array(
							        'name'          => 'complemento',
							        'id'            => 'complemento',
							        'maxlength'     => '100',
							        'class'         => 'validate',
							        'value'			=> set_value('complemento')
							);
							echo form_input($data);
					        echo '<label for="complemento">Complemento</label></div></div>';

					    	echo '<div class="input-field col s12">';
					        $data = array(
						        'id'            => 'avancar_3',
						        'content'       => 'Avançar<i class="material-icons right">send</i>',
						        'class'			=> 'btn waves-effect waves-light right'
							);

							echo form_button($data);
						
						echo '</div></div>';
						// echo form_fieldset_close();

	    				// echo form_fieldset('Descrição do Incidente');
	    				echo '<div id="passo_3" class="card-panel grey lighten-5 boxForm">
								<a class="btn-floating btn-large disabled center">1</a>
								<a class="btn-floating btn-large disabled center">2</a>
								<a class="btn-floating btn-large blue center btAtual">3</a>
								<a class="btn-floating btn-large disabled center">4</a>
								<p>Descrição do Incidente</p>';

	    					echo '<div class="row">
	    							<div class="input-field col s12">';
							$data = array(
							        'name'          => 'descricao',
							        'id'            => 'descricao',
							        'length'  	    => '500',
							        'class'         => 'materialize-textarea validate',
							        'value'			=> set_value('descricao')
							);
							echo form_textarea($data);
					        echo '<label for="descricao">Descrição*</label></div>';

					        echo '<div class="input-field col s12">
					        		<div class="file-field input-field">
								      <div class="btn">
								        <span>Adicionar foto</span>';
										$data = array(
										        'name'          => 'imagem',
										        'id'            => 'imagem',
										        'class'         => 'validate'
										);
										echo form_upload($data);
					        			echo '</div>
										<div class="file-path-wrapper">';
											$data = array(
										        'class'         => 'file-path validate'
											);
											echo form_input($data);
										echo '</div>
										</div>
					        		</div>
					        		<div class="col s12"> 
					        			<span class="light grey-text text-darken-2">Formatos aceitos: jpg e png. Tamanho máximo: 400kB. Dimensões máximas: 1024px por 768px.</span>
					        		</div>
					        	</div>';

					    	echo '<div class="input-field col s12">';
					        $data = array(
						        'id'            => 'avancar_4',
						        'content'       => 'Avançar<i class="material-icons right">send</i>',
						        'class'			=> 'btn waves-effect waves-light right'
							);

							echo form_button($data);
						
						echo '</div></div>';
	    				// echo form_fieldset_close();

	    				// echo form_fieldset('Dados do Autor(a)');
	    				echo '<div id="passo_4" class="card-panel grey lighten-5 boxForm">
								<a class="btn-floating btn-large disabled center">1</a>
								<a class="btn-floating btn-large disabled center">2</a>							
								<a class="btn-floating btn-large disabled center">3</a>
								<a class="btn-floating btn-large blue center btAtual">4</a>
								<p>Dados do Autor(a)</p>';

	    					echo '<div class="row">
	    							<div class="input-field col s12">';
									$data = array(
									        'name'          => 'nome',
									        'id'            => 'nome',
									        'maxlength'     => '100',
									        'class'         => 'validate',
							        		'value'			=> set_value('nome')
									);
									echo form_input($data);
							        echo '<label for="nome">Nome*</label></div>';

					        echo '<div class="input-field col s12">';
							$data = array(
							        'name'          => 'email',
							        'id'            => 'email',
							        'maxlength'     => '100',
							        'class'         => 'validate',
							        'type'			=> 'email',
							        'value'			=> set_value('email')
							);
							echo form_input($data);
					        echo '<label for="email" data-error="Por favor, digite um email válido!" data-success="Formato válido!">E-mail*</label></div>';

					        echo '<div class="input-field col s12">';
					        $data = array(
						        'name'          => 'enviar',
						        'id'            => 'enviar',
						        'type'          => 'submit',
						        'content'       => 'Enviar<i class="material-icons right">send</i>',
						        'class'			=> 'btn waves-effect waves-light right'
							);

							echo form_button($data);
					        // echo form_submit('enviar', 'Enviar', array('class' => 'right waves-effect waves-light btn'));
					        echo '</div></div>';

	    				// echo form_fieldset_close();
					    echo '</div>';

	    			echo form_close();

				?>

				<!-- Modal Structure -->
				<div id="mapa" class="modal modal-fixed-footer">
					<div class="modal-content">
						<!-- <h4>Indique a localização no mapa</h4> -->
						<div id="googleMap"></div>
					</div>
					<div class="modal-footer center">
						<a onclick="fechaMapaReportar()" class="waves-effect waves-green btn-flat" style="float: none;">Feito</a>
					</div>
				</div>
			</div>
			<div class="col s9"> 
				<span class="light grey-text right">* Campos obrigatórios.</span>
			</div>
		<?php } //fim else logado?>
	</div>
</div>