<?php
$platos = new carta("chor");
if (!isset($_SESSION['lang'])) {
    $lang = "gl";
} else {
    $lang = $_SESSION['lang'];
}
@$arrplatos = json_decode($platos->getplatos($_GET['cat'], $lang));
$cont = 1;
//var_dump($arrplatos);
?>

<?php if (isset($arrplatos)): ?>
    <?php foreach ($arrplatos as $value): ?>
        <?php if ($cont % 2 == 0) : ?>
            <div class="menu1">
                <div class="menu-left piz">
                    <h3><?php echo $value->nombre; ?></h3>
                    <h5><?php echo descripcionplato; ?></h5>
                    <p><?php echo $value->descripcion; ?></p>
                    <ul class="list ins1">
                        <li><?php echo precioplato; ?><span>&#8364 <?php echo $value->precio; ?></span></li>

                    </ul>

                </div>
                <div class="menu-right">
                    <a href="../img-platos/<?php echo $value->imagen; ?>" class="fancybox chorimacolor" title="<?php echo $value->nombre; ?>"><img class="img-responsive img-thumbnail" src="../img-platos/<?php echo $value->imagen; ?>" alt="<?php echo $value->nombre; ?>" title="<?php echo $value->nombre; ?>" class="img-responsive" /></a>
                    <a href="../img-platos/<?php echo $value->imagen; ?>" class="fancybox chorimacolor" title="<?php echo $value->nombre; ?>"><small>Click na imaxe</small></a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <?php $cont ++; ?>
        <?php else : ?>
            <div class="menu1">
                <div class="menu-left">
                    <a href="../img-platos/<?php echo $value->imagen; ?>" class="fancybox chorimacolor" title="<?php echo $value->nombre; ?>"><img class="img-responsive img-thumbnail" src="../img-platos/<?php echo $value->imagen; ?>" alt="<?php echo $value->nombre; ?>" title="<?php echo $value->nombre; ?>" class="img-responsive" /></a>
                    <a href="../img-platos/<?php echo $value->imagen; ?>" class="fancybox chorimacolor" title="<?php echo $value->nombre; ?>"><small>Click na imaxe</small></a>
                </div>
                <div class="menu-right">
                    <h3><?php echo $value->nombre; ?></h3>
                    <h5><?php echo descripcionplato; ?></h5>
                    <p><?php echo $value->descripcion; ?></p>
                    <ul class="list ins1">
                        <li><?php echo precioplato; ?><span>&#8364 <?php echo $value->precio; ?></span></li>

                    </ul>

                </div>
                <div class="clearfix"> </div>
            </div>
            <?php $cont ++; ?>
        <?php endif; ?>


    <?php endforeach; ?> 


<?php endif; ?>


