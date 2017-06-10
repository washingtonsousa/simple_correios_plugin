<?php
header('Content-Type: text/html; charset=utf-8');

class CorreiosAPICallBack {



public function __construct($cep,$peso, $comprimento, $altura, $larg, $nmpacotes, $dir) {

$this->Calcula($cep, $peso, $comprimento, $altura, $larg, $nmpacotes, $dir );

}


public function Calcula($cep,$peso, $comprimento, $altura, $larg , $nmpacotes, $dir) {


$pac_varejo = '04510';
$sedex_varejo = '04014';

 $data['nCdEmpresa'] = '';
 $data['sDsSenha'] = '';
 $data['sCepOrigem'] = '08311060';
 $data['sCepDestino'] = $cep;
 $data['nVlPeso'] = $peso;
 $data['nCdFormato'] = '1';
 $data['nVlComprimento'] = $comprimento;
 $data['nVlAltura'] = $altura;
 $data['nVlLargura'] = $larg;
 $data['nVlDiametro'] = '0';
 $data['sCdMaoPropria'] = 'n';
 $data['nVlValorDeclarado'] = '0';
 $data['sCdAvisoRecebimento'] = 'n';
 $data['StrRetorno'] = 'xml';
 //$data['nCdServico'] = '40010';
 $data['nCdServico'] = $pac_varejo.','.$sedex_varejo;
 $data = http_build_query($data);

 $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

 $curl = curl_init($url . '?' . $data);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 $result = curl_exec($curl);
 $result = simplexml_load_string($result);
 
echo '<table class="shop_table"><thead><th>Serviço</th><th>Quantidade</th><th>Valor</th><th>Prazo (Dias úteis) </th><thead>';

foreach($result -> cServico as $row) {
 
 if($row -> Erro == 0) {

 
    
  echo '<tr>';
    if (  $row ->  Codigo  == $pac_varejo ) {

        echo '<td>PAC Comum';
     echo '<img src="'.$dir.'img/pac_comum.png" class="img-responsive icon_frete" /></td>';
    }
    
    if (  $row ->  Codigo  == $sedex_varejo ) {

        echo '<td>Sedex Comum';
    echo '<img src="'.$dir.'img/sedex_comum.png" class="img-responsive icon_frete" /></td>';
    }



     echo '<td>'.$nmpacotes.'x R$'. $row ->  Valor   . '</td>>';
    echo '<td>'.$row -> PrazoEntrega . ' dia(s) útil/úteis</td>';

     echo "</tr>";

 } else {


       echo '<tr>';
    if (  $row ->  Codigo  == $pac_varejo ) {

        echo '<td>PAC Comum';
     echo '<img src="'.$dir.'img/pac_comum.png" class="img-responsive icon_frete" /></td>';
    }
    
    if (  $row ->  Codigo  == $sedex_varejo ) {

        echo '<td>Sedex Comum';
    echo '<img src="'.$dir.'img/sedex_comum.png" class="img-responsive icon_frete" /></td>';
    }



     echo '<td>'.$nmpacotes.'</td><td> R$'. $row ->  Valor   . '</td>';
    echo '<td>'.$row -> PrazoEntrega . ' dia(s) útil/úteis</td>';

    echo '<div class="hidden">'. $row -> MsgErro . '</div>'; 
    echo "</tr>";

 }

 }

echo '</table>';

}




}

$dir = $_GET['dir'];
$CEP = $_GET['CEP'];
$peso = $_GET['peso'];
$comprimento = $_GET['comp'];
$altura = $_GET['altura'];
$larg =  $_GET['largura'];
$qty = $_GET['qty'];

$teste = new  CorreiosAPICallBack($CEP, $peso, $comprimento, $altura, $larg, $qty, $dir);

?>