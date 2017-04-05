<?php
$menu = new carta("chor");
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = "gl";
}
?>
<ol  class=" container breadcrumb">
<?php
@$arrcarta = json_decode($menu->getcategorias($lang));
?>
    <?php if(isset($arrcarta)) :?>
    <?php foreach ($arrcarta as $key => $value): ?>
        <?php 
        
        if(isset($_GET['cat']) && $_GET['cat']==$value->id)
        {
            $nombre=$value->nombre;
            $activo="activegris";
        }
        else{
            $activo="categoria";
            
        }
        ?>
    <li ><a  class=" <?php echo $activo; ?>" href="http://localhost/chorima/carta/index.php?cat=<?php echo $value->id; ?>" ><?php echo $value->nombre; ?></a></li>
    
    <?php 
    
    endforeach; ?>
    <?php        endif;?>
</ol>
<h2 class='text-center'><?php echo @$nombre; ?></h2>
