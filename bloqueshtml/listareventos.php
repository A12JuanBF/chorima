<?php
$eventos = new eventos("chor");
$arra = json_decode($eventos->geteventos(10));
$pos = 0;
?>
<?php if (isset($arra)): ?>
    <?php foreach (@$arra as $value): ?>
        <?php
        $arrhora = explode(":", $value->hora);
        $arrfecha = explode("-", $value->fecha);
        $dia = $arrfecha[2];
        $mes = $arrfecha[1];
        $mes = getmes($mes);
        $hora = $arrhora[0] . ":" . $arrhora[1];
        ?>
        <?php if ($pos < 1): ?>
            <div class="eventos col-lg-12 panel panel-default">

                <div class="col-lg-3">
                    <div class="row"><img class="img-thumbnail img-responsive" src="../img-eventos/<?php echo $value->imagenperfil; ?>" title="<?php echo $value->nombre; ?>"/></div>
                    <div class="row">
                        <div class=" news-grid-left">
                            <p><?php echo $dia; ?><span><?php echo $mes; ?></span></p>
                        </div>
                    </div>
                    <div class="row"><h3 class="text-center"><i class="glyphicon glyphicon-time "></i> <?php echo $hora; ?></h3></div>
                    
                    <div class="masproxeven">
                        <a  href="evento.php?id=<?php echo $value->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Ver máis</a>
                    </div>
                    
                </div>

                <div  class="col-lg-9 headdings">

                    <h1 class="chorimacolor"> <?php echo $value->nombre; ?></h1>
                    <h4>Tipo de evento: <?php echo $value->tipo; ?></h4>
                    <p class="textoevento"><?php echo $value->descripcion; ?></p>

                </div>
                <div class="col-lg-9 ">
                    
                </div>

            </div>
            <?php $pos ++; ?>
        <?php else : ?>
            <div class="eventos col-lg-offset-2 col-lg-10 panel panel-default">
                <div class="col-lg-3">

                    <div class="row">
                        <div >
                            <p><b><?php echo $dia; ?> <span><?php echo $mes; ?></span></b></p>
                        </div>

                    </div>
                    <div class="row"><h5><i class="glyphicon glyphicon-time"></i> <?php echo $hora; ?></h5></div>
                    <div><img class="img-thumbnail img-responsive" src="../img-eventos/<?php echo $value->imagenperfil; ?>" title="<?php echo $value->nombre; ?>"/></div>
                    <div >
                        <a  href="evento.php?id=<?php echo $value->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Ver máis</a>
                    </div>
                </div>
                <div  class="col-lg-9 ">

                    <h3 class="text-left chorimacolor"> <?php echo $value->nombre; ?></h3>
                    <h5>Tipo de evento: <?php echo $value->tipo; ?></h5>
                    <p><?php echo $value->descripcion; ?></p>
                    
                </div>
            </div>
        <?php endif; ?>

    <?php endforeach; ?>
<?php else : ?>
    <h2 style="text-align: center;"><?php echo noeventos; ?></h2>
<?php endif; ?>