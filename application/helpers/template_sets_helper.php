<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->library('template');

//geral, para todas as pgs. //pode ser sobrescrito em pgs. individuais
$CI->template->set('title', 'Observatorio');
$CI->template->set('description', 'O Observatório de Resíduos visa promover o acesso a informações úteis para tomadas de decisão e a colaboração na gestão responsável de resíduos sólidos.');
$CI->template->set('keywords', 'Observatório de resíduos, reciclagem, gestão de resíduos, coleta de resíduos, Política Nacional de Resíduos Sólidos, plano de gerenciamento de resíduos, geração de resíduos, logística reversa, resíduo reciclável, responsabilidade compartilhada, responsabilidade ambiental, entulho, e-lixo, resíduo de serviço de saúde, lixão, aterro sanitário, aterro industrial.');
$CI->template->set('css_geral', array('materialize.min', 'geral'));
$CI->template->set('js_geral', array('jquery-2.1.1.min', 'materialize.min', 'geral'));

/* End of file template_sets_helper.php */
/* Location: ./system/helpers/template_sets_helper.php */