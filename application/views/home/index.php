<?php /*div class="homeParalax container center white-text" style="background-image: url('<?php echo base_url('painel/assets/uploads/images/' . $home_imagens[0]->imagem) ?>');">
	<div class="textParalax">
		<h1><?php echo $home_imagens[0]->titulo; ?></h1>
		<h5><?php echo $home_imagens[0]->descricao; ?></h5>
	</div>
</div */ ?>

<?php /*<div id="topo" class="boxHome"> */?>
	<div class="slider sliderHome">
		<ul class="slides">
			<?php foreach ($home_imagens as $imagem): ?>
				<li>
					<img src="<?php echo base_url('painel/assets/uploads/images') . '/' . $imagem->imagem; ?>">
					<div class="caption right-align">
						<h5><?php echo $imagem->titulo; ?></h5>
						<h4 class="light grey-text text-lighten-3"><?php echo $imagem->descricao; ?></h4>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<br><br>
	<br><br>
<?php /*</div> */?>

<!-- <div class="boxHome"> -->
	<div class="container" id="apresentacao">
		<!-- <div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
			<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Apresentação</h2>
		</div> -->
		<div class="row">
			<div class="col s12">
				<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
					<h1 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Observatório de Resíduos</h1>
				</div>
				<p class="light">
					O Observatório de resíduos recicláveis foi criado em 2009, como uma iniciativa do Laboratório do Ambiente Construído Inclusão e Sustentabilidade, da Faculdade de Arquitetura e Urbanismo, Centro de Desenvolvimento Sustentável e Faculdade UnB Gama (LACIS/FAU/CDS/FGA-UnB), construído em parceria com a Secretaria de Ciência e Tecnologia para Inclusão Social do Ministério da Ciência, Tecnologia e Inovação (SECIS/MCTI).
				</p>
			</div>
			<div class="col s12 m4">
				<div class="icon-block">
					<h2 class="center <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>"><i class="large material-icons">settings</i></h2>
					<p class="light">
						O Observatório passou por sucessivas transformações e adaptações visando identificar formas de contribuir para uma gestão responsável dos resíduos sólidos e está sendo novamente reformulado, enquanto projeto de iniciação científica e de extensão por uma equipe multidisciplinar de professores e alunos, em sintonia com a efetiva implantação da Lei 12.305/2010 que instituiu a Política Nacional de Resíduos Sólidos no compartilhamento de responsabilidade por todo o ciclo de vida dos produtos.
					</p>
				</div>
			</div>
			<div class="col s12 m4">
				<h2 class="center <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>"><i class="large material-icons">nature_people</i></h2>
				<div class="icon-block">
					<p class="light">
						Queremos contribuir para que nosso ambiente seja limpo, saudável, bonito. Queremos qualidade de vida. Nosso objetivo é alcançar o responsável pela aquisição e o descarte, promovendo sensibilização, conscientização e mobilização.
						<br><br>
						Queremos contribuir com a decisão responsável ao adquirir um material ou produto e definir como esse material ou produto será destinado no ambiente ou se voltará para uma cadeia produtiva ao fim de sua vida útil.
					</p>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="icon-block">
					<h2 class="center <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>"><i class="large material-icons">perm_device_information</i></h2>
					<p class="light">
						Esse é o elo que mais precisa ter acesso a dados e informações, que permitam a tomada de decisão com responsabilidade, da aquisição ao descarte. E também para que permita exigir a mesma responsabilidade de seus governantes, fabricantes, importadores e distribuidores.
						<br><br>
						Para uma comunicação mais objetiva e efetiva, identificamos perfis e traçamos hipóteses das principais questões para tomada de decisão sobre a gestão de resíduos.
					</p>
				</div>
			</div>
			<div class="col s12">
				<p class="light">
					Convidamos você para se identificar com um ou mais perfis, para nos informar se essas questões atendem à sua necessidade, compartilhar suas dúvidas e experiências. Sejam bem vindos, vamos formar uma rede colaborativa na gestão de resíduos sólidos e contribuir para que nossos espaços de convivência sejam mais saudáveis.
				</p>
			</div>
		</div>
	</div>

	<div class="container" id="ferramentas">
		<div class="row">
        	<div class="col s12">
          		<div class="card grey lighten-4">
            		<div class="card-content todeolhoCard">
		            	<div class="row">
				            <div class="col s12 center">
								<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
									<h2 class="grey lighten-4 <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Tô de Olho!</h2>
								</div>
							</div>
						</div>
              			<div class="row justify">
			              	<div class="col s12 justify">
			              		<img class="todeolhoImage left" src="<?php echo base_url('assets/img/gestao_de_residuos.jpg') ?>">
								<p class="light">
									Aqui você tem oportunidade de participar, identificando problemas de resíduos dispostos irregularmente e, ou acumulado nas vias públicas, terrenos particulares, praças, parques, margens de lagoas e rios, acúmulo de resíduos vegetais, presença de material cortante no lixo, vetores se multiplicando no lixo (ratos, baratas, moscas, pernilongos), lixo incorreto em caçambas de entulhos, resíduos de serviço de saúde.
								</p>
								<br>
								<p class="light">
									Você pode identificar também resíduos volumosos como colchões e peças de mobília, eletrodomésticos, resíduos de serviço de saúde.
								</p>
								<br>
								<p class="light">
									Nossa ferramenta permite que o usuário retorne para verificar se o problema foi solucionado, ou verifique e valide uma informação colocada por outro usuário.
								</p>
								<br>
								<p class="light">
									O "Tô de Olho!" requer preenchimento de um pequeno formulário. O usuário deve localizar o local do relato no mapa, selecionar o tipo de relato, descrever o relato acrescentando informações que facilitem a localização e incluindo uma foto. O nome e o email não serão divulgados.
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<ul class="collapsible white" data-collapsible="accordion">
								    <li>
										<div class="collapsible-header <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">
											<i class="material-icons">report_problem</i>Lixo Encontrado
										</div>
										<div class="collapsible-body">
											<p class="light">
												Você tem oportunidade de participar, identificando problemas de resíduos dispostos irregularmente e, ou acumulado nas vias públicas, terrenos particulares, praças, parques, margens de lagoas e rios, acúmulo de resíduos vegetais, presença de material cortante no lixo, vetores se multiplicando no lixo (ratos, baratas, moscas, pernilongos), lixo incorreto em caçambas de entulhos, resíduos de serviço de saúde. Você pode identificar também resíduos volumosos como colchões e peças de mobília, eletrodomésticos, resíduos de serviço de saúde.
											</p>
										</div>
								    </li>
								    <li>
										<div class="collapsible-header <?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">
											<i class="material-icons ">delete</i>Pontos de Entrega Voluntária - PEVs
										</div>
										<div class="collapsible-body">
											<p class="light">
												Você pode contribuir informando os Pontos de Entrega Voluntária que conhece em sua cidade em que é possível entregar resíduos recicláveis. Para isso é necessário que faça um pequeno cadastro e informe a localização exata do PEV no mapa. É possível também que você informe que um PEV deixou de funcionar.
											</p>
										</div>
								    </li>
								</ul>
							</div>
						</div>
						<div class="row justify">
			              	<div class="col s12 justify">
								<p class="light">
									Nosso objetivo é possibilitar visibilidade desses problemas à sociedade e aos órgãos governamentais para que tomem as providências necessárias.
								</p>
							</div>
						</div>
						<!-- <p class="light">
							Você pode contribuir de duas formas: compartilhando um projeto seu, uma experiência de sucesso na coleta, segregação, reutilização, reciclagem de resíduos. O formato para divulgação pode ser um vídeo, um texto com fotos. A outra forma de contribuir é enviar uma sugestão, uma proposta para um problema em qualquer ponto da cadeia de resíduos assim como na gestão com uma visão sistêmica. Nosso objetivo é possibilitar o máximo de visibilidade e alcance das experiências de sucesso, assim como de propostas e sugestões formando uma rede de colaboração e cooperação na gestão de resíduos.
						</p> -->
		            </div>
		            <div class="card-action center">
		            	<a class="waves-effect waves-light btn" href="<?php echo base_url('to_de_olho/mapa'); ?>"><i class="material-icons right">map</i>Acessar Mapa</a>
		            </div>
          		</div>
        	</div>
      	</div>
	</div>

	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col s12 center">
				<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
					<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Perfis</h2>
				</div>
			</div>
			<div class="col s12 justify">
				<p class="light">
					A missão do Observatório de Resíduos é inspirar, sensibilizar, promover a interação a mobilização, a colaboração e a capacidade de aprender a aprender. Para facilitar o acesso a informações úteis para tomadas de decisão na gestão responsável de resíduos sólidos, de forma individual ou coletiva, concebemos perfis de atores: cidadã(o), a professor(a), estudante, síndico/líder comunitário, empresária(o), agricultor(a), trabalhador(a). Para elaborar, identificar, organizar e disponibilizar o conteúdo sobre o que cada ator pode e deve fazer para cumprir com sua responsabilidade no ciclo de vida dos produtos, identificamos as ações inerentes a cada perfil. 
				</p>
				<p class="light">
					Convidamos você a identificar (o)s perfis que mais se adequa(m) à sua atividade, navegar no Observatório, participar da rede de ações para identificar problemas, compartilhar experiências e propor soluções e nos informar que conteúdo é mais útil e o que mais você gostaria de ver no Observatório.
				</p>	
			</div>
		</div>
		<div class="row">
			<?php
					//var_dump($perfis);
					foreach ($perfis as $perfil):
						/*if ($perfil->slug_perfil == 'cidada_o') {
                            continue;
                        }*/
						/*$attr_link = array(
							'class' => 'tooltipped',
							'data-position' => 'bottom',
							'data-delay' => '50',
							'data-tooltip' => $perfil->descricao_perfil
						);
						/*$image = array(
							'src'   => 'painel/assets/uploads/images/' . $perfil->capa_perfil,
							'alt'   => $perfil->descricao_perfil,
							'title' => $perfil->descricao_perfil
						);*/ 
			?>
			<div class="col s6 m3 l2 center">
				<div class="card profile">
					<a href="<?php echo base_url($perfil->slug_perfil); ?>" class="hoverable waves-effect waves-<?php echo $home[0]->cor; ?> tooltipped linkCardHome" data-position="bottom" data-delay="50" data-tooltip="<?php echo $perfil->perfil?>">
						<div class="card-content">
							<img width="80%" src="<?php echo base_url('painel/assets/uploads/images/' . $perfil->capa_perfil); ?>"/>
							<div class="valign-wrapper myCardTitle">
								<span class="light valign truncate"><?php echo $perfil->perfil; ?></span>
							</div>
						</div>
					</a>
					<!-- <div class="card-action">
						<?php // echo anchor($perfil->slug_perfil, 'escolher', $attr_link) ?>
					</div> -->
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>


	
	<!-- <div class="container">
		<div class="row">
			<div class="col s12 center">
				<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
					<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Recentes</h2>
				</div>
			</div>
		</div>
		<div id="masonry-grid" class="row">
			<?php foreach ($recentes as $recente): ?>
			<div class="col s12 m6 l4">
				<div class="card">
					<div class="card-image">
						<?php if (empty($recente->capa_artigo)) { ?>
							<a href="<?php echo 'cidada_o/' . $recente->slug_categoria . '/' . $recente->slug_artigo ; ?>" style="background-image: url(assets/img/padrao.jpg);" class="myImgHome waves-effect waves-block waves-light">
						<?php } else { ?>
							<a href="<?php echo 'cidada_o/' . $recente->slug_categoria . '/' . $recente->slug_artigo ; ?>" style="background-image: url(painel/assets/uploads/images/<?php echo $recente->capa_artigo; ?>);" class="myImgHome waves-effect waves-block waves-light">
						<?php }	?>
							
						</a>
					</div>
					<div class="card-content myCardContent">
						<?php 
							$attr_link = array(
								'title' => $recente->descricao_artigo,
								'class' => ''
							);
							echo anchor(
								//$recente->slug_perfil . '/' . $recente->slug_categoria . '/' . $recente->slug_artigo,
								'cidada_o/' . $recente->slug_categoria . '/' . $recente->slug_artigo,
								$recente->titulo_artigo,
								$attr_link
							);
						?>
						<p><?php echo $recente->descricao_artigo; ?></p>				
      					<i class="tiny icon material-icons">query_builder</i>
      					<span><?php echo str_replace('#', 'de', date('d # M # Y', strtotime($recente->adicionado_em)))?></span>
      					<i class="tiny icon material-icons">visibility</i>
      					<span><?php echo $recente->total_acessos_artigo; ?></span>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12 center">
				<div class="myDivider <?php echo $home[0]->cor . ' ' . $home[0]->cor_intensidade; ?>">
					<h2 class="<?php echo $home[0]->cor . '-text text-' . $home[0]->cor_intensidade; ?>">Mais Acessados</h2>
				</div>
			</div>
		</div>
		<div id="masonry-grid" class="row">
			<?php foreach ($mais_acessados as $mais_acessado): ?>
			<div class="col s12 m6 l4">
				<div class="card">
					<div class="card-image">
						<?php if (empty($mais_acessado->capa_artigo)) { ?>
							<a href="<?php echo 'cidada_o/' . $mais_acessado->slug_categoria . '/' . $mais_acessado->slug_artigo ; ?>" style="background-image: url(assets/img/padrao.jpg);" class="myImgHome waves-effect waves-block waves-light">
						<?php } else { ?>
							<a href="<?php echo 'cidada_o/' . $mais_acessado->slug_categoria . '/' . $mais_acessado->slug_artigo ; ?>" style="background-image: url(painel/assets/uploads/images/<?php echo $mais_acessado->capa_artigo; ?>);" class="myImgHome waves-effect waves-block waves-light">
						<?php }	?>
							
						</a>
					</div>
					<div class="card-content myCardContent">
						<?php 
							$attr_link = array(
								'title' => $mais_acessado->descricao_artigo,
								'class' => ''
							);
							echo anchor(
								//$mais_acessado->slug_perfil . '/' . $mais_acessado->slug_categoria . '/' . $mais_acessado->slug_artigo,
								'cidada_o/' . $mais_acessado->slug_categoria . '/' . $mais_acessado->slug_artigo,
								$mais_acessado->titulo_artigo,
								$attr_link
							);
						?>
						<p><?php echo $mais_acessado->descricao_artigo; ?></p>				
      					<i class="tiny icon material-icons">query_builder</i>
      					<span><?php echo str_replace('#', 'de', date('d # M # Y', strtotime($mais_acessado->adicionado_em)))?></span>
      					<i class="tiny icon material-icons">visibility</i>
      					<span><?php echo $mais_acessado->total_acessos_artigo; ?></span>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div> -->
<!-- </div> -->