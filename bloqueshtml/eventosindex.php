<?php
include 'include/meses.php';
$eventos = new eventos("chor");
$arra = json_decode($eventos->geteventos(0,2));
$arra2 = json_decode($eventos->geteventos(2,2));
?>

<div class="container">
    <h3><i class="glyphicon glyphicon-calendar"></i> <?php echo agendacultural; ?></h3>
    <p class="eum"><?php echo eventosinicio; ?></p>
    <?php if (isset($arra)): ?>

        <div class="news-grids">
            <div class="row">
                <?php foreach (@$arra as $value): ?>
                    <?php
                    $arrhora = explode(":", $value->hora);
                    $arrfecha = explode("-", $value->fecha);
                    $dia = $arrfecha[2];
                    $mes = $arrfecha[1];
                    $mes = getmes($mes);
                    $hora = $arrhora[0] . ":" . $arrhora[1];
                    ?>
                    <div class="col-md-6 news-grid eventind">
                        <div class="col-xs-4 news-grid-left">

                            <p><?php echo $dia; ?> <?php echo $mes ?> <span><?php echo $hora ?></span></p>


                        </div>
                        <div class="col-xs-8 news-grid-right">
                            <h4 class="eventonombre"><?php echo $value->nombre; ?></h4>
                            <span>Tipo de evento: <?php echo $value->tipo; ?></span> 
                            <p>
                                <?php echo $value->descripcion; ?></p>

                            <div class="more">
                                <a  href="/proximos_eventos/evento.php?id=<?php echo $value->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Ver máis</a>
                            </div>

                        </div>

                        <div class="clearfix"> </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="row">
                <?php if (isset($arra2)): ?>
                <?php foreach (@$arra2 as $value): ?>
                    <?php
                    $arrhora = explode(":", $value->hora);
                    $arrfecha = explode("-", $value->fecha);
                    $dia = $arrfecha[2];
                    $mes = $arrfecha[1];
                    $mes = getmes($mes);
                    $hora = $arrhora[0] . ":" . $arrhora[1];
                    ?>
                    <div class="col-md-6 news-grid eventind">
                        <div class="col-xs-4 news-grid-left">

                            <p><?php echo $dia; ?> <?php echo $mes ?> <span><?php echo $hora ?></span></p>


                        </div>
                        <div class="col-xs-8 news-grid-right">
                            <h4 class="eventonombre"><?php echo $value->nombre; ?></h4>
                            <span>Tipo de evento: <?php echo $value->tipo; ?></span> 
                            <p>
                                <?php echo $value->descripcion; ?></p>

                            <div class="more">
                                <a  href="/proximos_eventos/evento.php?id=<?php echo $value->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Ver máis</a>
                            </div>

                        </div>

                        <div class="clearfix"> </div>
                    </div>

                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <h2 style="text-align: center;"><?php echo noeventos; ?></h2>
        <?php endif; ?>

        <div class="clearfix"> </div>

    </div>

</div>