<div class="parallax-container hero pages parallax-container_topo">
	<div class="parallax">
		<?php if (empty($artigo[0]->capa_artigo)) { ?>
			<img src="<?php echo base_url('assets/img/padrao.jpg') ?>">
		<?php } else { ?>
			<img src="<?php echo base_url('painel/assets/uploads/images/' . $artigo[0]->capa_artigo) ?>">
		<?php } ?>
	</div>
</div>
<br>
<?php //var_dump($arquivos); ?>
<div class="container artigoBody">
	<div class="row">
		<div class="col m9 s12 left">
			<?php /* div class="container">
				<h5 class="header center"><?php echo $artigo[0]->titulo_artigo?></h5>
				<div class="row center">
					<h5 class="header col s12 light"><?php echo $artigo[0]->subtitulo_artigo?></h5>
				</div>
			</div*/ ?>
			<div class="row">
				<div class="col s12">
					<div class="artigoTitulo">
						<h5 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>"><?php echo $artigo[0]->titulo_artigo?></h5>
					</div>
					<h6><?php echo $artigo[0]->subtitulo_artigo ?></h6>
				</div>
			</div>
			<div class="row">
				<div id="contentArtigo" class="col s12">
					<!-- <a class="waves-effect waves-light btn tooltipped tamanhoFont" data-position="bottom" data-delay="50" data-tooltip="Tamanho da fonte"> -->
						<i class="material-icons tooltipped tamanhoFont" data-position="bottom" data-delay="50" data-tooltip="Tamanho da fonte">format_size</i>
					<!-- </a> -->
				</div>
			</div>
			<div class="row">
				<div id="contentArtigo" class="col s12 left artigoTextos">
					<?php echo $artigo[0]->texto_artigo?>
				</div>
			</div>
			<div class="row">
				<?php if (!empty($artigo[0]->video_url_artigo)) { ?>
					<div class="video-container">
			        	<iframe width="853" height="480" src="<?php echo $artigo[0]->video_url_artigo?>" frameborder="0" allowfullscreen></iframe>
			        </div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col s6 right right-align artigoTextos">
					<p><!--Por--> <?php echo /*$artigo[0]->usuario?>, em <?php echo */str_replace('#', 'de', date('d # M # Y', strtotime($artigo[0]->adicionado_em)))?></p>
				</div>
				<?php /* div class="col s6">
					<p class="right">Atualizado em <?php echo str_replace('#', 'de', date('d # M # Y', strtotime($artigo[0]->modificado_em)))?></p>
				</div */ ?>
			</div>
			<div class="row">
				<?php foreach ($tags as $tag): ?>
					<!-- <a href="<?php //echo current_url() . '/'. $tag->slug_tag; ?>" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php //echo $tag->tag; ?>"> -->
						<div class="chip white-text <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?> artigoTextos">
							<?php echo $tag->tag?>
						</div>
					<!-- </a> -->
				<?php endforeach; ?>
			</div>
		</div>
		<?php if (!empty($arquivos)) { ?>
			<div class="col m3 s12 right menuArquivos artigoTextos">
				<h6>Arquivos: </h6>
				<?php foreach ($arquivos as $arquivo): ?>
					<a href="<?php echo base_url('painel/assets/uploads/files') . '/'. $arquivo->arquivo; ?>" class="waves-effect waves-light" target="_blank">
						<?php echo $arquivo->titulo?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php } ?>
	</div>
</div>

<div class="parallax-container valign-wrapper white-text parallax-container_artigo">
	<div class="container">
	<?php
		//envia a url atual para a controller Hit retornar para o mesmo artigo após tratar
		$this->session->set_userdata('referred_from', current_url());

		//verifica na session se este artigo já foi avaliado
		$respondido = $this->session->userdata($artigo[0]->slug_artigo);
	    if ($respondido != TRUE) {
	?>
		<div class="row">
			<div class="col s12 center">
				<h5 class="destaqueLink center">Este artigo foi útil?</h5>
			</div>
		</div>	
		<div class="row center">
			<a href="<?php echo base_url('/hit/indicador_1') . '/' . $artigo[0]->slug_artigo . '/' . $perfil_atual[0]->slug_perfil; ?>" class="btn z-depth-0 waves-effect waves-light green">Sim</a>
			<a href="<?php echo base_url('/hit/indicador_2') . '/' . $artigo[0]->slug_artigo . '/' . $perfil_atual[0]->slug_perfil; ?>" class="btn z-depth-0 waves-effect waves-light red">Não</a>
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
</div>

<?php if ($perfil_atual[0]->slug_perfil == 'cidada_o') { ?>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col s12 center">
				<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
					<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">perfis</h2>
				</div>
				<h6>Selecione um perfil para ver conteúdo direcionado.</h6>
			</div>
		</div>
		<div class="row">
			<?php
					//var_dump($perfis);
					foreach ($perfis as $perfil):
						/*if ($perfil->slug_perfil == 'cidada_o') {
                            continue;
                        }*/
						$attr_link = array(
							'class' => 'tooltipped',
							'data-position' => 'bottom',
							'data-delay' => '50',
							'data-tooltip' => $perfil->descricao_perfil,
							'onclick' => 'hitArtigoParaPerfil(\'' . $artigo[0]->slug_artigo .'\', \'' . $perfil->slug_perfil . '\')'
						);
						/*$image = array(
							'src'   => 'painel/assets/uploads/images/' . $perfil->capa_perfil,
							'alt'   => $perfil->descricao_perfil,
							'title' => $perfil->descricao_perfil
			);*/ ?>
			<div class="col s4 m3 l2 center">
				<div class="card profile">
					<a href="<?php echo base_url($perfil->slug_perfil); ?>" class="hoverable waves-effect waves-<?php echo $home[0]->cor; ?> tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php echo $perfil->perfil?>">
						<div class="card-content">
							<img width="80%" src="<?php echo base_url('painel/assets/uploads/images/' . $perfil->capa_perfil); ?>"/>
							<div class="valign-wrapper myCardTitle">
								<span class="light valign"><?php echo $perfil->perfil?></span>
							</div>
						</div>
					</a>
					<!-- <div class="card-action">
						<?php echo anchor($perfil->slug_perfil, 'escolher', $attr_link) ?>
					</div> -->
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<script type="text/javascript">
		function hitArtigoParaPerfil(slug_artigo, slug_perfil) {
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "<?php echo base_url('/hit/add_count_acesso_artigo_para_perfil')?>?slug_artigo=" + slug_artigo + "&slug_perfil=" + slug_perfil, true);
			xhttp.send();		
		}
	</script>
<?php } ?>

<script type="text/javascript">
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "<?php echo base_url('/hit/add_count_artigo_acesso') . '?slug_artigo=' . $artigo[0]->slug_artigo . '&slug_perfil=' . $perfil_atual[0]->slug_perfil?>", true);
	xhttp.send();
</script>