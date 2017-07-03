<div class="freteWrappper">
CEP: <input type="text" name="CEP" id="CEP" >
<input type="hidden" name="url" value="<?= $url ?>">
<input type="hidden" name="peso" value="<?= $ProductArray["weight"]; ?>">
<input type="hidden" name="largura" value="<?= $ProductArray["width"]; ?>">
<input type="hidden" name="altura" value="<?= $ProductArray["height"]; ?>">
<input type="hidden" name="comprimento" value="<?= $ProductArray["length"]; ?>">
<input type="hidden" name="cepOrigem" value="<?= $cepOrigin; ?>">

<button class='btn btn-primary btn-sm' id='Calc_frete' > Calcular Frete </button><br />


<div id="FreteBox">
</div>


</div>