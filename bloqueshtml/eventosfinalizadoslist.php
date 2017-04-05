<?php

$eventfinalizado = new eventos('chor');
$arreventfin = json_decode($eventfinalizado->geteventosfinalizadosprev(4));

?>
<?php if (isset($arreventfin)): ?>
<ul >
    <?php foreach ($arreventfin as $value): ?>
    <?php 
    
    $arrfecha = explode("-", $value->fecha);
    ?>
    <li><a href="http://atabernadachorima.es/anteriores_eventos/index.php?even=<?php echo $value->id; ?>"><?php echo $value->nombre.": <i>".$arrfecha[2]."-".$arrfecha[1]."-".$arrfecha[0]."</i>" ?></a></li>
    <?php endforeach; ?>
</ul>
<?php else : ?>
    <p>Non hai eventos</p>
<?php endif; ?>