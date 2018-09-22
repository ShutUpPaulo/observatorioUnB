<div class="container contentTopo">
	<div class="row">
		<div class="col m4 s12 center">
			<?php if (empty($categoria[0]->capa_categoria)) { ?>
				<img class="responsive-img" src="<?php echo base_url('painel/assets/uploads/images/dee54-bridge-962786_1280.jpg') ?>">
			<?php } else { ?>
				<img class="responsive-img" src="<?php echo base_url('painel/assets/uploads/images/' . $categoria[0]->capa_categoria) ?>">
			<?php } ?>
		</div>
		<div class="col m8 s12 center">
			<h4 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>"><?php echo $categoria[0]->categoria ?></h4>
			<p class="col s12"><?php echo $categoria[0]->descricao_categoria ?></p>
		</div>
	</div>
</div>
<br><br>
	<section class="section container">
		<div class="row">
			<div class="col s12 center">
				<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
					<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">artigos publicados</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m8">
				<?php foreach ($artigos as $artigo): ?>
					<ul class="collection">
						<li class="collection-item avatar">
							<?php if (empty($artigo->capa_artigo)) { ?>
								<a href="<?php echo $artigo->slug_categoria . '/' . $artigo->slug_artigo ; ?>">
									<img src="<?php echo base_url('assets/img/padrao.jpg'); ?>" alt="imagem" class="circle waves-effect waves-block waves-light">
								</a>
							<?php } else { ?>
								<a href="<?php echo $artigo->slug_categoria . '/' . $artigo->slug_artigo ; ?>">
									<img src="<?php echo base_url('painel/assets/uploads/images/' . $artigo->capa_artigo); ?>" alt="imagem" class="circle waves-effect waves-block waves-light">
								</a>
							<?php } ?>
							<span class="title">
								<a href="<?php echo $artigo->slug_categoria . '/' . $artigo->slug_artigo ; ?>">
									<?php echo $artigo->titulo_artigo; ?>
								</a>
							</span>
							<p><?php echo $artigo->descricao_artigo; ?></p>
							<?php
								$attr_link = array(
									'title' => $artigo->descricao_artigo,
									'class' => 'right'
								);
								echo anchor(
									$artigo->slug_perfil . '/' . $artigo->slug_categoria . '/' . $artigo->slug_artigo,
									// $artigo->titulo_artigo,
									'<i class="material-icons">library_books</i> ler',
									$attr_link
								);
							?>
							<!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
						</li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

<section class="parallax-container valign-wrapper white-text parallax-container_artigo">
	<div class="section container">
	<?php
		$this->session->set_userdata('referred_from', current_url());

		$respondido = $this->session->userdata($categoria[0]->slug_categoria);
	    if ($respondido != TRUE) {
	?>
		<div class="row">
			<div class="col s12 center">
				<h5 class="destaqueLink center">Achou interessante?</h5>
			</div>
		</div>
		
		<div class="row center">
			<a href="<?php echo base_url('/hit/indicador_3') . '/' . $categoria[0]->slug_categoria . '/' . $perfil_atual[0]->slug_perfil; ?>" class="btn z-depth-0 waves-effect waves-light green">Sim</a>
			<a href="<?php echo base_url('/hit/indicador_4') . '/' . $categoria[0]->slug_categoria . '/' . $perfil_atual[0]->slug_perfil; ?>" class="btn z-depth-0 waves-effect waves-light red">Não</a>
		</div>
	<?php
	    } else {
	?>
		<div class="row">
			<div class="col s12 center">
				<h5 class="destaqueLink center">Obrigado por responder!</h5>
			</div>
		</div>
	<?php
	    }
	?>
	</div>
	<div class="parallax">
		<img src="<?php echo base_url('painel/assets/uploads/images/city.jpg')?>" alt="Avalie">
		<div class="layer"></div>
	</div>
</section>

<script type="text/javascript">
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "<?php echo base_url('/hit/add_count_categoria_acesso') . '?slug_categoria=' . $categoria[0]->slug_categoria?>", true);
	xhttp.send();
</script>