<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Web oficial de Aproahp</title>
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="alternate" href="rssnoticias.php" title="Noticias de la Aproahp" type="application/rss+xml" />
	
	<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8" />
</head>
<body>
	<div id="container"><!-- inicio content -->
<?php require("../header.php");?>
	
	<h3>REVISTA -  </h3>

	<p>Nuestra Revista-Boletín, vio la luz por primera vez en junio de 1996.
	Lógicamente sus contenidos estarán, en muchos casos, obsoletos;
	no obstante, ojear estos boletines puede ser muy interesante para
	conocer la evolución tanto de nuestro colectivo como de la Asociación.</p>
	<table id="boletin">
	<tr>
		<td>Nº. 10 - Agosto 2001<br/><br/>
			<img src="images/Bol10.gif" width="125" height="177" alt="Bol10"></td>
		<td>Nº. 9 - Abril 2001<br/><br/>
			<img src="images/Bol9.gif" width="125" height="177" alt="Bol9"></td>
		<td>Nº. 8 - Junio 2000<br/><br/>
			<img src="images/BOL8.GIF" width="125" height="177" alt="BOL8"></td>
		<td>Nº. 7 - Sept. '99<br/><br/>
			<img src="images/BOL7.GIF" width="125" height="177" alt="BOL7"></td>
	</tr>

	<tr>
	<td>Nº. 6 - Febr. '98<br/><br/>
		<img src="images/BOL6.GIF" width="125" height="177" alt="BOL6"></td>
	<td>Nº. 5 - Julio '98<br/><br/>
		<img src="images/BOL5.GIF" width="125" height="177" alt="BOL5"></td>
	<td>Nº. 4 - Enero '98<br/><br/>
		<img src="images/BOL4.GIF" width="125" height="177" alt="BOL4"></td>
	<td>Nº. 3 - Agosto '97<br/><br/>
		<img src="images/BOL3.GIF" width="125" height="177" alt="BOL3"></td>
	</tr>

	<tr>
	<td>Nº. 2 - Abril '97<br/><br/>
		<img src="images/BOL2.GIF" width="125" height="177" alt="BOL2"></td>
	<td>Nº. 1 - Nov. '96<br/><br/>
		<img src="images/BOL1.GIF" width="125" height="177" alt="BOL1"></td>
	<td>Nº. 0 - Junio '96<br/><br/>
		<img src="images/BOL0.GIF" width="125" height="177" alt="BOL0"></td>
	</tr>

</table>


</div><!-- fin content -->

<!-- inicio footer -->
<?php require("../footer.html");?>
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