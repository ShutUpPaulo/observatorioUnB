      <?php foreach ($home as $content): ?>
         <div class="center-align homeTitulo <?php echo $content->cor . ' ' . $content->cor_intensidade; ?>">
            <h5 class="light grey-text text-lighten-3"><?php echo $content->subtitulo; ?></h5>
            <h2 class="light grey-text text-lighten-3"><?php echo $content->titulo; ?></h2>
         </div>
         <div class="slider">
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
         <!-- <div class="parallax-container profiles_options valign-wrapper"> -->
         <div class="">
            <div class="section">
               <div class="container">
                  <div class="row center">
                     <!-- <h3 class="header col s12 light">Quem é você?</h3> -->
                     <h5 class="header col s12 light black-text"><?php echo $content->descricao; ?></h5>
                  </div>
                  <div class="row">
                     <?php
                     //var_dump($perfis);
                     foreach ($perfis as $perfil):
                        echo '
                           <div class="col s12 m3 center">
                              <h6>' . $perfil->perfil . '</h6>
                              <div class="card ' . $perfil->cor . ' ' . $perfil->cor_intensidade .'">
                                 <div class="card-content white-text">
                                    <img src="' . base_url('assets/img/estudante.png') . '" class="profile_icon">
                                 </div>
                                 <div class="card-action">
                        ';
                        $attr_link = array(
                           'title' => $perfil->descricao_perfil,
                           'class' => ''
                        );
                        echo anchor(
                           $perfil->slug_perfil,
                           $perfil->perfil,
                           $attr_link
                        );
                        echo'
                                 </div>
                              </div>
                           </div>
                        ';
                     endforeach;
                     /*?>
                     <div class="col s12 m3 center">
                        <h6>COOPERATIVA</h6>
                        <div class="card blue-grey darken-1">
                           <div class="card-content white-text">
                              <img src="<?php echo base_url('assets/img/cooperativa.png'); ?>" class="profile_icon">
                           </div>
                           <div class="card-action">
                              <a href="#">ESCOLHER</a>
                           </div>
                        </div>
                     </div>
                     <div class="col s12 m3 center">
                        <h6>LÍDER COMUNITÁRIO</h6>
                        <div class="card blue-grey darken-1">
                           <div class="card-content white-text">
                              <img src="<?php echo base_url('assets/img/lider.png'); ?>" class="profile_icon">
                           </div>
                           <div class="card-action">
                              <a href="#">ESCOLHER</a>
                           </div>
                        </div>
                     </div>
                     <div class="col s12 m3 center">
                        <h6>EMPRESA</h6>
                        <div class="card blue-grey darken-1">
                           <div class="card-content white-text">
                              <img src="<?php echo base_url('assets/img/empresa.png'); ?>" class="profile_icon">
                           </div>
                           <div class="card-action">
                              <a href="#">ESCOLHER</a>
                           </div>
                        </div>
                     </div>
                     <div class="col s12 m3 center">
                        <h6>PROFESSOR</h6>
                        <div class="card blue-grey darken-1">
                           <div class="card-content white-text">
                              <img src="<?php echo base_url('assets/img/teacher9.png'); ?>" class="profile_icon">
                           </div>
                           <div class="card-action">
                              <a href="#">ESCOLHER</a>
                           </div>
                        </div>
                     </div> */ ?>
                  </div>
                  <div><?php echo $content->texto; ?></div>
               </div>
            </div>
            <!-- <div class="parallax"><img src="<?php echo base_url('assets/img/backgroundperfil.jpg'); ?>" alt="Unsplashed background img 2"></div> -->
         </div>
      <?php endforeach; ?>