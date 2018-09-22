<div class="parallax-container parallax-container-topo valign-wrapper">
<div class="section no-pad-bot">
<div class="container">
<div class="row center">
<h5 class="header col s12 light">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
</div>
</div>
</div>
<div class="parallax"><img src="<?php echo base_url('assets/img/background2.jpg'); ?>" alt="Unsplashed background img 2"></div>
</div>



      <div id="index-banner" class="parallax-container profile_header">
         <div class="section no-pad-bot">
            <div class="container">
               <br><br>
               <h1 class="header left lime-text text-lighten-4">
                  <?php //ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?)
                     foreach ($categoria as $atual):
                        echo $atual->categoria;
                     endforeach;
                  ?>
               </h1>
            </div>
         </div>
         <div class="parallax"><img src="<?php echo base_url(); ?>assets/img/backgroundheader.png" alt="Unsplashed background img 1"></div>
      </div>
      <div class="container">
         <div class="section">
            <div class="row">
               <div class="col s12 l3 center"><img class="profile_description" src="<?php echo base_url(); ?>assets/img/estudante.png"></div>
               <div class="col s12 l9">
                  <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience. Pellentesque faucibus fringilla nibh nec consequat. Vivamus a feugiat lectus, in tempor sem. Suspendisse vestibulum ex libero, vitae ultricies nunc fermentum eget. Pellentesque scelerisque, orci non rutrum efficitur, lorem justo accumsan nisl, ac mattis velit sem a purus. Nam est odio, pharetra pretium sollicitudin nec, porta ac lorem. Etiam vel vulputate est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam est odio, pharetra pretium sollicitudin nec, porta ac lorem. Etiam vel vulputate est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam est odio, pharetra pretium sollicitudin nec, porta ac lorem. Etiam vel vulputate est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="parallax-container valign-wrapper">
         <div class="section no-pad-bot">
            <div class="container">
               <div class="row center">
                  <h3 class="header col s12 light">Artigos</h3>
                  <h6 class="header col s12 light">lorem ipsum</h6>
               </div>
               <div class="row">
                  <div class="collection">
                  <?php
                  foreach ($perfil_atual as $atual)://ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?)
                     foreach ($categoria as $catAtual)://ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?)
                        foreach ($artigos as $artigo):
                           // echo '
                           //    <div class="col s12 m3 center">
                           //       <h6>' . $artigo->titulo_artigo . '</h6>
                           //       <div class="card blue-grey darken-1">
                           //          <div class="card-content white-text">
                           //             <img src="' . base_url('assets/img/estudante.png') . '" class="profile_icon">
                           //          </div>
                           //          <div class="card-action">
                           // ';
                           $attr_link = array(
                              'title' => $artigo->descricao_artigo,
                              'class' => 'collection-item'
                           );
                           echo anchor(
                              $atual->slug_perfil . '/' . $catAtual->slug_categoria . '/' . $artigo->slug_artigo,
                              $artigo->titulo_artigo,
                              $attr_link
                           );
                           // echo'
                           //          </div>
                           //       </div>
                           //    </div>
                           // ';
                             // <a href="#!" class="collection-item">Alvin</a>
                             // <a href="#!" class="collection-item active">Alvin</a>
                        endforeach;
                     endforeach;
                  endforeach;
                  ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="parallax"><img src="<?php echo base_url(); ?>assets/img/backgroundperfil.jpg" alt="Unsplashed background img 2"></div>
      </div>