
<div class="row mapBox">
	

		<ul id="slide-out" class="side-nav">
	    	<li>
	    		<a class="waves-effect fechaSidenav no-padding tooltipped " data-position="right" data-delay="50" data-tooltip="Esconde menu do mapa">
	    			<i class="material-icons right <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">arrow_back</i>
	    		</a>
	    	</li>
	    	<li>
	    		<a id="btCentro" class="waves-effect tooltipped collapsible-header" data-position="right" data-delay="50" data-tooltip="Centraliza o mapa na posição inicial">
	    			Posição inicial
	    			<i class="material-icons <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">my_location</i>
	    		</a>
	    	</li>
	    	<!-- <li><div class="divider no-margin"></div></li> -->
	    	<li class="no-padding">
	    		<div class="row">
    				<div class="col s12">
			    		<ul class="tabs mapTabs">
						    <li class="tab col s6 blue darken-4"><a href="#test1" class="white-text">Tô de Olho!</a></li>
						    <li class="tab col s6 deep-orange darken-3"><a href="#test2" class="white-text">PEVs</a></li>
						 </ul>
					</div>
					<div id="test1" class="col s12">
						<ul class="collapsible collapsible-accordion">
							<!-- <li>
					    		<a id="btCentro" class="waves-effect collapsible-header">
					    			Adicionar Lixo Encontrado
					    			<i class="material-icons blue-text text-darken-4">add_location</i>
					    		</a>
					    	</li> -->
							<li>
								<a class="collapsible-header waves-effect">Mais próximos<i class="material-icons right">arrow_drop_down</i><i class="material-icons blue-text text-darken-4">near_me</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#modal1">Lixo encotrado 1</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header waves-effect">Minhas contribuições<i class="material-icons right">arrow_drop_down</i><i class="material-icons blue-text text-darken-4">rate_review</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header waves-effect">Meus favoritos<i class="material-icons right">arrow_drop_down</i><i class="material-icons blue-text text-darken-4">star</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header waves-effect">Todos<i class="material-icons right">arrow_drop_down</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
						</ul>			
					</div>
					<div id="test2" class="col s12">


						<!-- <div class="container">
			<p class="center">
				<a id="btCentro" class="waves-effect waves-teal btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Centraliza o mapa na posição inicial">Posição inicial</a>
			</p>
			<?php 
				/*if (!$this->session->session_id || !$this->session->userdata('logado')) {
					echo '<p class="light justify">
							Faça o login para colaborar indicando incidentes registrados vistos na rua por você.
						</p>
						<a class="waves-effect waves-light btn" href="' . base_url('cadastro/login') . '">Login</a> &nbsp;
						<a class="waves-effect waves-light btn" href="' . base_url('cadastro') . '">Cadastro</a>'
					;
				} else {
					// 
				}
			?>
		</div>
		<div class="boxIncidentes">
			<ul class="collapsible popout" data-collapsible="accordion">
				<li><!-- Modal Trigger -->
  <button data-target="modal1" class="testete">Modal</button></li>
				<?php foreach ($incidentes as $incidente): ?>
					<li>
						<div class="collapsible-header abre_<?php echo $incidente->id_incidente; ?>">
							<span class="teal-text"><i class="material-icons">place</i></span>
							<span class="truncate"><?php echo '(' . nice_date($incidente->adicionado_em, 'd/m/y') . ') ' . $incidente->tipo_incidente; ?></span>
						</div>
						<div class="collapsible-body">
							<div class="card horizontal z-depth-0">
								<div class="card-image">
									<img class="materialboxed" data-caption="<?php echo $incidente->descricao_incidente; ?>" src="<?php echo base_url('painel/assets/uploads/images/incidentes') . '/' . $incidente->imagem_incidente; ?>" alt="<?php echo $incidente->descricao_incidente; ?>">
								</div>
								<div class="card-stacked">
									<div class="card-content">
										<p><?php echo $incidente->descricao_incidente; ?></p>
										<p>Cidade: <?php echo $incidente->cidade; ?></p>
										<p>Estado: <?php echo $incidente->estado; ?></p>
										<?php 
											if (!$this->session->session_id || !$this->session->userdata('logado')) {
												// 
											} else {
												$check_visitor = $this->input->cookie($incidente->id_incidente . '_incidente', FALSE);
												if ($check_visitor == false) {
													echo "<p><a href='" . base_url() . "hit/total_confirmacoes/" . $incidente->id_incidente . "/incidente' class='waves-effect waves-light btn'>Eu vi!</a></p>";
													}
											}
										?>
										<p class="teal-text"><span class="right"><i class='tiny icon material-icons'>visibility</i><?php echo $incidente->total_confirmacoes_existencia; ?></span><i class="material-icons pointer verNoMapa" title="Ver no mapa" data-lat="<?php echo $incidente->latitude; ?>" data-lon="<?php echo $incidente->longitude; ?>">map</i></span>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach; */?>
			  </ul>
		</div> -->





		<ul class="collapsible collapsible-accordion">
							<!-- <li>
					    		<a id="btCentro" class="waves-effect collapsible-header">
					    			Adicionar PEV
					    			<i class="material-icons deep-orange-text text-darken-3">add_location</i>
					    		</a>
					    	</li> -->
							<li>
								<a class="collapsible-header waves-effect">Mais próximas<i class="material-icons right">arrow_drop_down</i><i class="material-icons deep-orange-text text-darken-3">near_me</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header waves-effect">Minhas contribuições<i class="material-icons right">arrow_drop_down</i><i class="material-icons deep-orange-text text-darken-3">rate_review</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header waves-effect">Minhas favoritas<i class="material-icons right">arrow_drop_down</i><i class="material-icons deep-orange-text text-darken-3">star</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
							<li>
								<a class="collapsible-header waves-effect">Todos<i class="material-icons right">arrow_drop_down</i></a>
								<div class="collapsible-body">
								<ul>
									<li><a class="waves-effect" href="#!">First</a></li>
									<li><a class="waves-effect" href="#!">Second</a></li>
									<li><a class="waves-effect" href="#!">Third</a></li>
									<li><a class="waves-effect" href="#!">Fourth</a></li>
								</ul>
								</div>
							</li>
						</ul>			







					</div>
				</div>
	    	</li>
	    </ul>





	    <div class="col s12">




	<div class="abreMenu">
	    <a href="#" data-activates="slide-out" class="button-collapse btn-floating btn-large <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
	      <i class="large material-icons">menu</i>
	    </a>
 	</div>

 	<div class="abreMosaico mosaico waves-effect waves-light btn-floating btn white overYhide">
		<i class="material-icons abreMenuIcon <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">view_module</i>
		<div class="container">
			<div class="row">
				<?php for ($i = 0; $i < 10; $i++) { ?>
				<?php foreach ($incidentes as $incidente): ?>
					<div class="col s6 m4 itemMosaico">
						<!-- <a href="#modal1"> -->
							<div class="card" data-target="modal1">
								<div class="card-content">
									<!-- <img class="materialboxed responsive-img" data-caption="<?php echo $incidente->descricao_incidente; ?>" src="<?php echo base_url('painel/assets/uploads/images/incidentes') . '/' . $incidente->imagem_incidente; ?>" alt="<?php echo $incidente->descricao_incidente; ?>"> -->
									<img class="itemMosaicoImg left" data-caption="<?php echo $incidente->descricao_incidente; ?>" src="<?php echo base_url('assets/img/gestao_de_residuos.jpg') ?>" alt="<?php echo $incidente->descricao_incidente; ?>">
									<p class="">
										<?php echo '(' . nice_date($incidente->adicionado_em, 'd/m/y') . ') ' . $incidente->tipo_incidente; ?>
									</p>
									<!-- <p>
										<?php echo $incidente->descricao_incidente; ?><br>
										Cidade: <?php echo $incidente->cidade; ?><br>
										Estado: <?php echo $incidente->estado; ?>
									</p> -->
									<?php 
										if (!$this->session->session_id || !$this->session->userdata('logado')) {
											// 
										} else {
											$check_visitor = $this->input->cookie($incidente->id_incidente . '_incidente', FALSE);
											if ($check_visitor == false) {
												echo "<p><a href='" . base_url() . "hit/total_confirmacoes/" . $incidente->id_incidente . "/incidente' class='waves-effect waves-light btn'>Eu vi!</a></p>";
											}
										}
									?>
									<p class="teal-text">
										<!-- <button data-target="modal1" class="btn">detalhes</button></li> -->
										<span class="">
											<i class='tiny icon material-icons'>visibility</i>
											<?php echo $incidente->total_confirmacoes_existencia; ?>
										</span>
										<!-- <i class="material-icons pointer verNoMapa" title="Ver no mapa" data-lat="<?php echo $incidente->latitude; ?>" data-lon="<?php echo $incidente->longitude; ?>">map</i> -->
									</p>
								</div>
						    </div>
						<!-- </a> -->
					</div>
				<?php endforeach; ?>
				<?php } ?>
			</div>
		</div>
 	</div>
 	<div class="fechaMosaico hide waves-effect waves-light btn-floating btn <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
		<i class="material-icons white-text text-white">view_module</i>
	</div>

	<div class="fixed-action-btn horizontal click-to-toggle">
	    <a class="btn-floating btn-large red">
	      <i class="large material-icons">build</i>
	    </a>
	    <ul>
	      <li>
	      	<a class="btn-floating blue darken-4 tooltipped" data-position="top" data-delay="50" data-tooltip="Visualizar somente Lixos Encontrados">
	      		<i class="material-icons">report_problem</i>
	      	</a>
	      </li>
	      <li>
	      	<a class="btn-floating deep-orange darken-3 tooltipped" data-position="top" data-delay="50" data-tooltip="Visualizar somente PEVs">
	      		<i class="material-icons">delete</i>
	      	</a>
	      </li>
	      <li>
	      	<a class="btn-floating <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?> tooltipped" data-position="top" data-delay="50" data-tooltip="Adicionar um ponto no mapa">
	      		<i class="material-icons">add_location</i>
	      	</a>
	      </li>
	    </ul>
	  </div>
	  


		<div id="googleMap"></div>
	</div>
	<div class="col s2 hide-on-med-and-up"></div>
</div>



  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet mapaModal">
    <div class="modal-content">
      <h4>Lixo encotrado 1</h4>
      <p>Aqui vem as informações do lixo encontrado preenchidas pelo usuário.</p>
      <img class="materialboxed" width="300" src="<?php echo base_url('assets/img/gestao_de_residuos.jpg') ?>">
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
  </div>