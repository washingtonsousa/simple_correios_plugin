<?php


class CorreiosAPICallBack {

private $result;
private $pac_varejo = '04510';
private $sedex_varejo = '04014';

public function __construct($cep,$peso, $comprimento, $altura, $larg, $nmpacotes, $dir, $cepOrigin) {

$this->result = $this->Calc($cep, $peso, $comprimento, $altura, $larg, $cepOrigin);
$this->genTemplate($this->result, $nmpacotes, $dir);
}


private function Calc($cep,$peso, $comprimento, $altura, $larg, $cepOrigin) {


 $data['nCdEmpresa'] = '';
 $data['sDsSenha'] = '';
 $data['sCepOrigem'] = $cepOrigin;
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
 $data['nCdServico'] = $this->pac_varejo.','.$this->sedex_varejo;
 $data = http_build_query($data);

 $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

 $curl = curl_init($url . '?' . $data);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 $result = curl_exec($curl);
 $result = simplexml_load_string($result);
 


 return $result;


 }


 private function genTemplate($result, $nmpacotes, $dir) {

require_once("default-template.php");

 }

}

$dir = $_GET['dir'];
$CEP = $_GET['CEP'];
$peso = $_GET['peso'];
$comprimento = $_GET['comp'];
$altura = $_GET['altura'];
$larg =  $_GET['largura'];
$qty = $_GET['qty'];
$cepOrigin = $_GET['cepOrigin'];
 
$render = new  CorreiosAPICallBack($CEP, $peso, $comprimento, $altura, $larg, $qty, $dir, $cepOrigin);

?>