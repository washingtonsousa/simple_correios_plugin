# simple_correios_plugin
Plugin simples para Wordpress/Woocommerce usando API dos Correios

Notas da versão 1.0

A versão 1.0 deste plugin possibilita aos utilizadores do Wordpress e Woocommerce adicionar um campo de cálculo de frete automático que utiliza a API oficial dos Correios para consulta dos dados e disponibiliza a informação direto na tela para o cliente.

Compatível com Woocommerce 3.0

# Diretórios e arquivos

Abaixo segue a estrutura de diretórios e arquivos do plugin:

/Diretório raiz

    *css
      *style.css
    *img
      *pac_comum.png
      *sedex_comum.png
    $js
     *calc_frete_prazo.js
     *jquery.js
     
  *index.php
  
  *main-class.php
  
  *default-template.php
  
  *secondaryOptions.php
  
  *deliveryHTML.php
  
  
 # Linguagens utilizadas
 
 Php puro (Com base nas APIs Codex Wordpress e Woocommerce)
 
 Codex Wordpress = https://developer.wordpress.org
 Codex Woocommerce = https://docs.woocommerce.com/wc-apidocs/package-WooCommerce.Functions.html
 
 Framework jQuery 3.0
 
 XHTML
 
 CSS3 Tableless
  
 # Funcionamento do plugin

Este plugin tem dois arquivos de template (deliveryHTML.php e default-template.php) sendo dividas as responsabilidades:

deliveryHTML.php

Exibe o form de consulta do frete e após executar a consulta exibe os resultados renderizados no arquivo default-template.php.

O frete é feito com base no CEP de origem preenchido nas opções do plugin e com o CEP de destino preenchido no formulário renderizado na página do produto.

Documentação em progresso...


   
    







