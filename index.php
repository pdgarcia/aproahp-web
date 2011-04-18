<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Web oficial de Aproahp</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="alternate" href="rssnoticias.php" title="Noticias de la Aproahp" type="application/rss+xml" />

<link rel="stylesheet" href="css/reset.css"   type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8" />

</head>

<body>

<div id="container"> <!-- inicio container -->
		
<?php require("header.php");?>

	<div id="content"><!-- inicio content -->
		
		<div id="feature" class="box-red">
			<h2 class="section"><b>Artículo</b></h2>
			<div class="content"><img src="images/foto_ins.gif" width="179" height="155" alt="Foto Ins"class="right" /> 
			<h1>Bienvenidos a Aproahp</h1>
			<p class="byline"><small>Carlos Sicilia</small></p>
			<p>La Asociación Profesional de Agentes de la Hacienda Pública, es una Organización de ámbito nacional regida por los principios de funcionamiento democrático y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda Pública.</p>
			<p><a href="#"><strong>Quieres saber más de nosotros&hellip;</strong></a></p>
			</div>
		</div>
		
		<div class="two-cols"> <!--inicio two-columns-->
			
			<div class="box-blue col-one">
				<h2 class="section"><b>Boletín</b></h2>
				<div class="content">
					<p>Nuestra Revista-Boletín, vio la luz por primera vez en junio de 1996.
					En ellos podrá
					conocer la evolución de nuestro colectivo y de la Asociación. <a href="#">Leer más&hellip;</a></p>
				</div>
			</div>
			
			<div class="box-yellow col-two">
				<h2 class="section"><b>Documentos</b></h2>
				<div class="content">
					<ul class="list">
						<?php
							require_once("lib/siteconfig.php");
							$cat_result=mysql_query("SELECT * FROM tbl_categorias ORDER BY cat_nombre;");
							for ($x = 0, $numrows = mysql_num_rows($cat_result); $x < $numrows; $x++) {  
								$row = mysql_fetch_assoc($cat_result);  
								echo "<li><a href='rinconagente/documentos.php?catid=".$row["CAT_ID"]."'>". $row["CAT_Nombre"]."</a></li>";  
						    }  
						?>
					</ul>
				</div>
			</div>
		
		</div><!--fin two-columns-->
	
	</div><!-- fin content --> 
	
	<div id="sidebar"><!-- inicio sidebar -->
		
		<div class="col-one"><!-- col-one -->
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="130" height="550" id="banner_aproahp" align="middle">
			<param name="allowScriptAccess" value="sameDomain">
			<param name="movie" value="images/banner_aproahp.swf">
			<param name="quality" value="high">
			<param name="bgcolor" value="#FFFFFF">
			<embed src="images/banner_aproahp.swf" quality="high" bgcolor="#FFFFFF" width="130" height="550" name="banner_aproahp" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
			</object>
		</div><!-- fin col-one -->
			
		<div class="col-two"><!-- col-two -->
			
			<div class="box-noticias">
				<h2 class="section"><a href="rssnoticias.php"><img src="images/rsslogo16x16.gif" id="rssicon" width="16" height="16" alt="RSS Noticias"></a><b>Noticias</b></h2>
				<div class="content">
					<div class="news">
						<ul id="spy">
						<?php include("data.php");?>
						</ul>
					</div>
				</div>
			</div>
		
			<div class="box-red">
				<h2 class="section"><b>Participa</b></h2>
				<div class="small">
						<p><a href="contacto/contacto.php"><img src="images/iconitos_14.gif" width="17" height="14" alt="Iconitos 14" class="izda">Contacte con nosotros</a><br/>
						<a href="contacto/contacto.php"><img src="images/iconitos_09.gif" width="16" height="16" alt="Iconitos 09" class="izda">Direcciones y teléfonos</a><br/>
						<a href="rinconagente/rinconagente.php"><img src="images/iconitos_07.gif" width="21" height="21" alt="Iconitos 07" class="izda">Opine</a><br/>
				</div>
			</div>
			
		</div><!-- fin col-two -->
		
	</div><!-- fin sidebar -->
	
	<div style="clear: both;">&nbsp;</div>

</div><!-- fin container -->

<!-- inicio footer -->
<?php require("footer.html");?>
<!-- fin footer -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.spy.js" type="text/javascript" charset="utf-8"></script>
<script src="js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function () {
    $('ul#spy').simpleSpy(3,5000,'data.php').bind('mouseenter', function () {
        $(this).trigger('stop');
    }).bind('mouseleave', function () {
        $(this).trigger('start');
    });
});
</script>
</body>
</html>
