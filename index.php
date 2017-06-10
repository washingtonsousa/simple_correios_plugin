<?php
 /*
Plugin Name: Consulta Frete e Prazo Correios
Plugin URI: http://wsxdevstudio.com.br
Description: Plugin de consulta de info dos Correios
Version: 1.0
Author: Washington de Sousa
Author URI: http://wsxdevstudio.com.br
License: GPLv2
*/

/*
 *      Copyright 2012 Aluno da Escola WordPress <email@exemplo.org>
 *
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 3 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );






function enqueue_Scripts_plugin() {

wp_register_script('jquery_pl', plugin_dir_url( __FILE__ ) .'/js/jquery.js', array(), '1.6', false);
wp_enqueue_script('jquery_pl');
wp_register_script('calc_frete_prazo', plugin_dir_url( __FILE__ ) .'/js/calc_frete_prazo.js', array(), '1.6', false);
wp_enqueue_script('calc_frete_prazo');
wp_register_style('style_frete',  plugin_dir_url( __FILE__ ) .'/css/style.css', array(), '3', 'all', false);
wp_enqueue_style('style_frete');

}

function divFreteGen() {

global $product;

$weight = (float) $product->get_weight();
$width = (float) $product->get_width();
$height = (float) $product->get_height();
$length = (float) $product->get_length();
$url = plugin_dir_url( __FILE__ );



echo '<div class="freteWrappper">';
echo 'CEP:<input type="text" name="CEP" id="CEP" >';
echo '<input type="hidden" name="url" value="'.$url.'">';
echo '<input type="hidden" name="peso" value="'.$weight.'">';
echo '<input type="hidden" name="largura" value="'.$width.'">';
echo '<input type="hidden" name="altura" value="'.$height.'">';
echo '<input type="hidden" name="comprimento" value="'.$length.'">';

echo "<button class='btn btn-primary btn-sm' id='Calc_frete' > Calcular Frete </button><br />";
echo '<div id="FreteBox">';
echo '</div>';
echo '</div>';
}

add_action ('wp_enqueue_scripts' , 'enqueue_Scripts_plugin', 0);
add_action('woocommerce_before_add_to_cart_form', 'divFreteGen');


?>