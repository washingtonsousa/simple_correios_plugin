<?php header('Content-Type: text/html; charset=utf-8'); ?>

<table class="shop_table"><thead><th>Serviço</th><th>Quantidade</th><th>Valor</th><th>Prazo (Dias úteis) </th><thead>
<?php

foreach ($result -> cServico as $row) : 
 
 ?>

  <tr> 
 <?php  if  (  $row ->  Codigo  == $this->pac_varejo ) : ?>

<td>PAC Comum 
    <img src="<?= $dir.'img/pac_comum.png' ?>" class="img-responsive icon_frete" /></td>
    
    <?php elseif (  $row ->  Codigo  == $this->sedex_varejo ) : ?>

        <td>Sedex Comum
      <img src="<?= $dir.'img/sedex_comum.png'; ?>"  class="img-responsive icon_frete" /></td>
    
    <?php endif; ?>



      <td><?= $nmpacotes ?> </td><td> R$ <?= $row ->  Valor;   ?> </td>
     <td> <?= $row -> PrazoEntrega  ?>  dia(s) útil/úteis</td>

     <div class="hidden"><?= $row -> MsgErro; ?> </div>
     </tr>

 <?php 


endforeach; ?>

 </table>
