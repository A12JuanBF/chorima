<?php 


include 'clases/eventos.php';
$eventoult = new eventos("chor");
$ideven = json_decode($eventoult->geteventofinalizado("default"));
$arra = json_decode($eventoult->geteventos(0,6));
header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>
<urlset>
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

    <url>
        <loc>http://atabernadachorima.es/</loc>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>http://atabernadachorima.es/galeria/</loc>
        <changefreq>yearly</changefreq>
        <priority>0.60</priority>
    </url>
    <url>
        <loc>http://atabernadachorima.es/carta/</loc>
        <changefreq>yearly</changefreq>
        <priority>0.60</priority>
    </url>
    <url>
        <loc>http://atabernadachorima.es/proximos_eventos/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <?php if(isset($arra)) :?>
    <?php foreach($arra as $value):?>
    <url>
        <loc>http://atabernadachorima.es/proximos_eventos/evento.php?id=<?php echo $value->id; ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <?php endforeach;?>
    <?php endif;?>
    <?php foreach($ideven as $value):?>
    <url>
        <loc>http://atabernadachorima.es/anteriores_eventos/index.php?even=<?php echo $value->id; ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.40</priority>
    </url>
    <?php endforeach;?>
    <url>
        <loc>http://atabernadachorima.es/ofertas/</loc>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>http://atabernadachorima.es/contacto/</loc>
        <changefreq>yearly</changefreq>
        <priority>0.80</priority>
    </url>
</urlset>