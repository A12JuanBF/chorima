<?php $subvista = new vista(); ?>
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h3>A taberna da chorima</h3>
                <p><?php echo piedescripcion; ?></p>
            </div>
            <div class="col-md-3 footer-grid">
                <h3><?php echo nav_ult; ?></h3>
                <?php $subvista->geteventosfinalizados("default"); ?>

            </div>
            <div class="col-md-3 footer-grid">
                <h3><?php echo pielinks; ?></h3>
                <ul>
                    <li><a  href="http://galeguesa.com/index.php?lang=es">A Galeguesa</a></li>
                    <li><a href="https://www.gulagalega.com/">A Gula Galega</a></li>
                    <li><a href="http://www.ladestileriadelasideas.com/">La Destilería de las ideas</a></li>
                    <li><a href="http://ildolcefarniente.es">Il dolce far niente</a></li>

                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h3><?php echo piecontacto; ?></h3>
                <p>Rúa do Vilar 47</p>
                <p>Santiago de Compostela</p>
                <p>C.P - 15704</p>
                <div class="footer-grid-address">
                    <p>Tel. 981 56 13 45</p>


                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="clear"> </div>
<div class="copy-right">
    <p>A taberna da chorima © 2016.  | <a href="https://twitter.com/tabernachorima"><span class="fa fa-twitter"></span></a>  <a href="https://www.facebook.com/A-taberna-da-Chorima-301522663516840/"><span class="fa fa-facebook"></span></a>  <a href="#"><span class="fa fa-google-plus"></span></a>

    </p>
</div>
