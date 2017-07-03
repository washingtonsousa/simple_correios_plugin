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
 *  
 */


defined( 'ABSPATH' ) or die( 'No script here please!' );

require("secondaryOptions.php");


function enqueue_Scripts_plugin() {

wp_register_script('jquery_pl', plugin_dir_url( __FILE__ ) .'/js/jquery.js', array(), '3', false);
wp_enqueue_script('jquery_pl');
wp_register_script('calc_frete_prazo', plugin_dir_url( __FILE__ ) .'/js/calc_frete_prazo.js', array(), '1.0', false);
wp_enqueue_script('calc_frete_prazo');
wp_register_style('style_frete',  plugin_dir_url( __FILE__ ) .'/css/style.css', array(), '1.0', 'all', false);
wp_enqueue_style('style_frete');

}

function getHTML() {

$url = plugin_dir_url( __FILE__ );
$cepOrigin = get_option( 'correiowsx_options' );
$ProductArray = getProductArray();
require_once("deliveryHTML.php");

}


function getProductArray() {

global $product;

$weight = (float) $product->get_weight();
$width = (float) $product->get_width();
$height = (float) $product->get_height();
$length = (float) $product->get_length();

$minimalProductArray = array(

"weight" => $weight,
"width" =>  $width,
"height" => $height,
"length" => $length
);



return $minimalProductArray;
}

add_action ('wp_enqueue_scripts' , 'enqueue_Scripts_plugin', 0);
add_action('woocommerce_before_add_to_cart_form', 'getHTML');


?>

