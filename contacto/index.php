<?php
session_start();
if(!isset($_SESSION['lang'])){
    require_once   '../include/lenguagl.php';
}
if(isset($_SESSION['lang']) && $_SESSION['lang']=="es"){
    require_once  '../include/lenguaes.php';
}
if(isset($_SESSION['lang']) && $_SESSION['lang']=="gl"){
    require_once  '../include/lenguagl.php';
}
if(isset($_SESSION['lang']) && $_SESSION['lang']=="en"){
    require_once  '../include/lenguaen.php';
}
include '../vista/vista.php';
include '../clases/eventos.php';
$vista = new vista();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacto | A taberna da chorima</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <!--Llamar a vista para las metas genéricas -->
        <?php $vista->getmeta("default"); ?>
        <?php $vista->geticon("default"); ?>
        
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        
        <link href="../css/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/assets/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/cookiesmensaje.js"></script>
        <script src="../js/idioma.js"></script>
        <script src="../js/jquery.cookie.js"></script>
        <script src="../js/mailcontact.js"></script>
        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <?php
        $vista->mensajecookies();
        ?>
        <!-- header -->
        <?php
        $vista->cabecera("default");
        ?>
        <!-- //header -->
        <!-- contact -->
        <div class="contact">
            <div class="container">
                <div class="contact-main">
                    <h3><?php echo contacto; ?></h3>
                    <div class="contact-top">
                        <div class="col-md-6 contact-top-left">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11694.969216495843!2d-8.544739!3d42.878283!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x13ac270b7b4d165a!2sA+taberna+da+chorima!5e0!3m2!1ses!2ses!4v1472644283613" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6 contact-top-right">
                            <div class="contact-textarea">
                                <form id="contacto">
                                    
                                    <input id="name" type="text" placeholder="<?php echo contactonombre; ?>" required/>
                                    <input id="subject" type="text" placeholder="<?php echo contactoasunto; ?>" required />
                                    <input id="number" type="text" placeholder="<?php echo contactotelefono; ?>"  />
                                    <input id="email" type="email" placeholder="<?php echo contactomail; ?>" required />
                                    <textarea id="message" placeholder="<?php echo contactomensaje; ?>" ></textarea>
                                    <input type="submit" value="<?php echo contactoenviar; ?>" >
                                    <input type="reset" value="<?php echo contactoborrar; ?>" >
                                </form>
                                <div id="load" ><h5 class="text-center">Enviando</h5><img  class="img-responsive"   src="../images/load.gif" alt="loading" title="loading"/></div>
                                 <p id="mailenviado"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //contact -->
        <!--- footer --->
<?php
$vista->pie();
?>
        <!--- //footer --->
        <!-- for bootstrap working -->
        <script src="../js/bootstrap.js"> </script>
        <!-- //for bootstrap working -->
    </body>
</html>