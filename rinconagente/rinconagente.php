<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">    
<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8">

	<title>Web oficial de Aproahp</title>
</head>

<body onload="MM_preloadImages('images/rinconagente_over_03.gif','images/rinconagente_over_06.gif','images/rinconagente_over_08.gif','images/rinconagente_over_10.gif','images/actas.gif','images/actas_over.gif')">

<div id="container"><!-- inicio container -->
	<?php require("../header.php");
		require("../lib/siteconfig.php");
		if(isset($_POST['agregarcomentario'])) {
			$Titulo=cleanQuery($_REQUEST['inp_titulo']);
			$Autor=cleanQuery($_REQUEST['inp_autor']);
			$Email=cleanQuery($_REQUEST['inp_email']);
			$Comentario=cleanQuery($_REQUEST['inp_comentario']);

			if(mysql_query("INSERT INTO tbl_blog (blg_titulo,blg_autor,blg_email,blg_comentario) VALUES ('$Titulo','$Autor','$Email','$Comentario');")){
				$result=array("status" => "Ok", "message" => mysql_error());
				echo "Comentario agregado.....";

				$cfg_result=mysql_query("SELECT * FROM tbl_users where usr_ID=".config_value("rincon_adminuser")."");
				if(mysql_num_rows($cfg_result)!=1) 
				{
					echo "[ERROR]-Falta elemento de Configuracion";
				}else{
					$row = mysql_fetch_assoc($cfg_result);
				}
				$header = "From: web@aproahp.com \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/plain";

				$mensaje = "El usuario " . $Autor . ", a dejado un mensaje en la pagina Rincon del Agente \r\n";
				$mensaje .= "Titulo: " . $Titulo . " \r\n";
				$mensaje .= "Email: " . $Email . " \r\n";
				$mensaje .= "Comentario " . $Comentario;

				$para = $row["USR_email"];
				$asunto = 'Contacto desde webmaster';

				//print_r($header);
				//print_r($mensaje);

				mail($para, $asunto, utf8_decode($mensaje), $header);
			}
			else{
				echo "Error: ".mysql_error();
			}
		}
	?>
		<div id="izda-a">
			<div class="resalte">
				<p><strong>Esta zona de nuestra WEB quiere ser un escaparate de tus opiniones.
				Si tienes alguna idea, comentario, sugerencia ó colaboración
				del tipo o del tema que quieras y
				te apetece hacerla pública o compartirla con los compañeros,
				puedes enviarla y la publicaremos en esta sección y en nuestro Boletín Informativo
				si así lo deseas.</strong></p>
			</div>
			<div id='blog'>
			<h1>Rincón del Agente</h1>
			<form id='rinconform' method='post' action='<?php echo $paginaactual ?>'>
				<table>
					<tr><td class='label1form'><label for='inp_titulo'>Título:</label></td><td><input type='text' name='inp_titulo' maxlength='50'></td></tr>
					<tr><td class='label1form'><label for='inp_autor'>Autor:</label></td><td><input type='text' name='inp_autor' maxlength='50'></td></tr>
					<tr><td class='label1form'><label for='inp_email'>Email:</label></td><td><input type='text' name='inp_email' maxlength='50'>&nbsp;(Opcional, no será mostrado a otros usuarios)</td></tr>
					<tr><td colspan=2><label for='inp_comentario'>Comentario:</label></td></tr>
					<tr><td colspan=2><textarea style="width:600px;height:180px;" name='inp_comentario' maxlength='5000'></textarea></td></tr>
					<tr><td colspan=2><input type='submit' value='Enviar' name='agregarcomentario'></td></tr>
				</table>
			</form>
			<?php
			if(!isset($_GET['pagenum'])){
				$pagenum = 1;
			}else{
				$pagenum = $_GET['pagenum'];
			}
			$blg_result = mysql_query("SELECT * FROM tbl_blog ORDER BY blg_fecha DESC") or die(mysql_error()); 
			$rows = mysql_num_rows($blg_result);

			$page_rows = 5;

			$pdata=pagination($rows,$pagenum,$page_rows);
			echo ($pdata['links']);

			echo "<ul>";
			$blg_result=mysql_query("SELECT * FROM tbl_blog ORDER BY blg_fecha DESC ".$pdata['limites'].";") or die(mysql_error());;
			for ($x = 0, $numrows = mysql_num_rows($blg_result); $x < $numrows; $x++) {  
				$row = mysql_fetch_assoc($blg_result);
				$datetime = date("d/m/y g:i A", strtotime($row["BLG_Fecha"]));

				echo "<li class= post><span class=highlight>".$row["BLG_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["BLG_Autor"]."</span> el <span class=highlight>".$datetime."</span><br>".nl2br($row["BLG_Comentario"])."</li>";
			}
			echo "</ul>";
			echo "</div><!-- fin div blog-->";
		?>
		</div>
	
	<div id="dcha-a">
	<div class="box-yellow">
		<h2 class="section"><b>Documentos</b></h2>

		<a href="documentos.php?catid=1" title="comunicados" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('comunicados','','images/rinconagente_over_03.gif',1)"><img src="images/rinconagente_03.gif" width="223" height="105" border="0" id="comunicados" /></a>
		<a href="documentos.php?catid=2" title="docs_usoint" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('docs_uso','','images/rinconagente_over_06.gif',1)"><img src="images/rinconagente_06.gif" width="223" height="105" border="0" id="docs_uso" /></a>
		<a href="documentos.php?catid=4" title="modelos" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('modelos','','images/rinconagente_over_08.gif',1)"><img src="images/rinconagente_08.gif" width="223" height="105" border="0" id="modelos" /></a>
		<a href="documentos.php?catid=3" title="acuerdos" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('acuerdos','','images/rinconagente_over_10.gif',1)"><img src="images/rinconagente_10.gif" width="223" height="105" border="0" id="acuerdos" /></a>
		<a href="documentos.php?catid=5" title="actas" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('actas','','images/actas_over.gif',1)"><img src="images/actas.gif" width="223" height="105" border="0" id="actas" /></a>
	</div>
</div>

<div style="clear: both;">&nbsp;</div>

</div><!-- fin content -->

<?php require("../footer.html");?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function() {
$("#rinconform").validate({
	rules: {
		inp_titulo: {
			required: true,
			maxlength: 50
		},
		inp_autor: {
			required: true,
			maxlength: 50
		},
		inp_email: {
			required: false,
			email: true,
			maxlength: 50
		},
		inp_comentario: {
			required: true,
			maxlength: 5000
		}
	}
});
});
</script>
</body>
</html>
