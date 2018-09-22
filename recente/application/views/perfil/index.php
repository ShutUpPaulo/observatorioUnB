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
                     foreach ($perfil_atual as $atual):
                        echo $atual->perfil;
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
                  <h3 class="header col s12 light">Categorias</h3>
                  <h6 class="header col s12 light">lorem ipsum</h6>
               </div>
               <div class="row">
                  <?php
                  foreach ($perfil_atual as $atual)://ARRAY COM UNICO ELEMENTO (TEM OUTRA FORMA DE FAZER ISSO?)
                     foreach ($categorias as $categoria):
                        // echo '
                        //    <div class="col s12 m3 center">
                        //       <h6>' . $categoria->categoria . '</h6>
                        //       <div class="card blue-grey darken-1">
                        //          <div class="card-content white-text">
                        //             <img src="' . base_url('assets/img/estudante.png') . '" class="profile_icon">
                        //          </div>
                        //          <div class="card-action">
                        // ';
                        // $attr_link = array(
                        //    'title' => $categoria->descricao_categoria,
                        //    'class' => ''
                        // );
                        // echo anchor(
                        //    $atual->slug_perfil . '/' . $categoria->slug_categoria,
                        //    $categoria->categoria,
                        //    $attr_link
                        // );
                        // echo'
                        //          </div>
                        //       </div>
                        //    </div>
                        // ';
                        echo '
                           <div class="col s12 m3 center">
                              <div class="card small">
                                 <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator profile_icon" src="' . base_url('assets/img/background2.jpg') . '">
                                 </div>
                                 <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">' . $categoria->categoria .  '<i class="material-icons right">more_vert</i></span>
                                    <p>
                                       ';
                                       $attr_link = array(
                                          'title' => $categoria->descricao_categoria,
                                          'class' => ''
                                       );
                                       echo anchor(
                                          $atual->slug_perfil . '/' . $categoria->slug_categoria,
                                          $categoria->categoria,
                                          $attr_link
                                       );
                                       echo'
                                    </p>
                                 </div>
                                 <div class="card-reveal blue-grey darken-1 white-text text-darken-4">
                                    <span class="card-title">' . $categoria->categoria .  '<i class="material-icons right">close</i></span>
                                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    ';
                                    $attr_link = array(
                                       'title' => $categoria->descricao_categoria,
                                       'class' => ''
                                    );
                                    echo anchor(
                                       $atual->slug_perfil . '/' . $categoria->slug_categoria,
                                       $categoria->categoria,
                                       $attr_link
                                    );
                                    echo'
                                 </div>
                              </div>
                           </div>
                        ';
                     endforeach;
                  endforeach;
                  ?>
               </div>
            </div>
         </div>
         <div class="parallax"><img src="<?php echo base_url(); ?>assets/img/backgroundperfil.jpg" alt="Unsplashed background img 2"></div>
      </div>