<div class="container contentTopo justify">
	<div class="row">
		<div class="col s12">
			<img class="right responsive-img imgPerfil" src="painel/assets/uploads/images/<?php echo $perfil_atual[0]->capa_perfil ?>">
			<h4 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>"><?php echo $perfil_atual[0]->perfil ?></h4>
			<p class="col s12"><?php echo $perfil_atual[0]->descricao_perfil ?></p>
		</div>
	</div>
</div>
<br><br>

	<div class="container section">
		<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
			<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">categorias</h2>
		</div>
		<!-- <div class="row">
			<?php foreach ($categorias as $categoria): ?>
				<a href="<?php echo current_url() . '/'. $categoria->slug_categoria; ?>" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php echo $categoria->categoria?>">
					<div class="chip <?php echo $categoria->cor . ' ' . $categoria->cor_intensidade; ?> white-text">
						<?php echo $categoria->categoria?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>"></div> -->
		<div class="row">
			<?php
			//var_dump($perfis);
			foreach ($categorias as $categoria):
				if (empty($categoria->capa_categoria)) {
					$src = 'painel/assets/uploads/images/dee54-bridge-962786_1280.jpg';
				} else {
					$src = 'painel/assets/uploads/images/' . $categoria->capa_categoria;
				}
				$attr_link = array(
					'title' => $categoria->descricao_categoria,
					'class' => ''
				);
				$image = array(
					'src'   => $src,
					'alt'   => $categoria->descricao_categoria,
					'title' => $categoria->descricao_categoria,
					'width' => '40%'
				); 
			?>
			<div class="col s12 m10">
				<h6><?php echo $categoria->categoria?></h6>
				<div class="card horizontal">
					<div class="card-image">
						<?php echo img($image)?>
					</div>
					<div class="card-stacked">
						<div class="card-content">
							<p class="light"><?php echo $categoria->descricao_categoria?></p>
						</div>
						<div class="card-action">
							<?php echo anchor(current_url() . '/'. $categoria->slug_categoria, 'Ver Mais', $attr_link) ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php  /*
<section class="parallax-container valign-wrapper white-text">
	<div class="section container">
		<div class="row">
			<div class="col s12 center">
				<h6>ESCOLHA DO EDITOR</h6>
				<hr class="divider">
			</div>
		</div>
		<h2 class="header center"><b>Título de um artigo em comum</b></h2>
		<div class="row center">
			<h5 class="header col s12 light">Uma breve descrição do artigo pode ser colocada aqui nesse local.</h5>
			<a href="" class="btn-large waves-effect waves-light read-btn">LER ARTIGO</a>
		</div>
	</div>
	<div class="parallax">
		<img src="library.jpg" alt="Unsplashed background img 2">
		<div class="layer"></div></div>
	</section>

*/ ?>


<script type="text/javascript">
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "<?php echo base_url('/hit/add_count_perfil_acesso') . '?slug_perfil=' . $perfil_atual[0]->slug_perfil?>", true);
	xhttp.send();
</script>