<?php
require_once 'classes/Membership.php';
$membership = New Membership();
$membership->confirm_Member();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<link rel="icon" href="../favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
	<title>Web oficial de Aproahp(Página de Administración)</title>
</head>
<body>
<div id="container">
<?php require("header.php")?>
<!-- inicio content -->
<?php
	require_once("../lib/siteconfig.php");
	//print_r($_POST);
	if(isset($_POST['submitnoticia'])) {
		$fecha=cleanQuery($_POST['inp_fecha']);
		$Titulo=cleanQuery($_POST['inp_titulo']);
		$resumen=cleanQuery($_POST['inp_resumen']);
		$texto=cleanQuery($_POST['inp_texto']);
		$userid=$_SESSION['UserID'];
		
		list($day,$month,$year)=explode("/",$fecha);
		$fecha = $year."-".$month."-".$day;
		
		$sqlstring="INSERT INTO tbl_noticias (NOT_Fecha,NOT_Autor,NOT_Titulo,NOT_Resumen,NOT_Texto) VALUES ('$fecha','$userid','$Titulo','$resumen','$texto');";

		if(mysql_query($sqlstring)){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Categoria agregada.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}

	if(isset($_REQUEST['submitenlace']) && ($_REQUEST['submitenlace'] =='editar')) {
		$fecha=cleanQuery($_POST['inp_fecha']);
		$Titulo=cleanQuery($_POST['inp_titulo']);
		$resumen=cleanQuery($_POST['inp_resumen']);
		$texto=cleanQuery($_POST['inp_texto']);
		$userid=$_SESSION['UserID'];
				
		if(mysql_query("UPDATE tbl_enlaces SET LINK_Nombre='$Nombre' ,LINK_Address='$Address' ,LINK_Descripcion='$Descripcion' WHERE LINK_ID='$id';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Enlace cambiado.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
	if(isset($_POST['borrarnoticia'])) {
	
		$ID=cleanQuery($_POST['borrarnoticia']);
		
		if(mysql_query("DELETE FROM tbl_noticias WHERE NOT_ID='$ID';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "noticia borrada.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
?>
<div id='noticias'>
	<h2>Noticias</h2><br>
	<div id='noticiasform'>
		<form id='frm_enlace' method='post' action='<?=$paginaactual?>'>
		<label for="inp_fecha">Fecha:</label><input type='text' name='inp_fecha' id='inp_fecha'><img src="images/b_calendar.png" alt="Calendario" width="16" height="16" /><br/>
		<label for="inp_titulo">Titulo:</label><input type='text' name='inp_titulo' id='inp_titulo'><br/>
		<label for="inp_resumen">Resumen:</label><textarea cols="80" rows="5" name='inp_resumen' id='inp_resumen'></textarea><br/>
		<label for="inp_texto">Texto:</label><textarea cols="80" rows="20" name='inp_texto' id='inp_texto'></textarea><br/>
		<input type="hidden" name="inp_id" id="inp_id" value="">
		<input type='submit' value='Agregar' name='submitnoticia' id='submitnoticia'><input type="reset" value="Cancelar">
		</form>
	</div>

<?php
		echo "<ul>";
		$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID ORDER BY NOT_FECHA DESC;");
		for ($x = 0, $numrows = mysql_num_rows($not_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($not_result);
			$datetime = date("d/m/y", strtotime($row["NOT_FECHA"]));

			echo "<li class=noticia><div class=edit rel='".$row["NOT_ID"]."'>Editar</div><div class=borrar rel='".$row["NOT_ID"]."'>Borrar</div><span class=highlight>".$row["NOT_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["USR_Displayname"]."</span> el <span class=highlight>".$datetime."</span><br><div class=resumen>".nl2br($row["NOT_resumen"])."</div><br>".nl2br($row["NOT_texto"])."</li>";
	    }  

		echo "</ul>";
		mysql_free_result($not_result);
?>
</div><!-- fin div noticias-->
</div><!-- fin content -->
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function() {
	$('#inp_fecha').datepicker({ dateFormat: "dd/mm/yy" });
	
	$('.borrar').live('click',function(){
		var botonborrar= $(this);
		
		var $dialog = $('<div></div>')
			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>La noticia sera borrada, ¿esta usted seguro?</p>')
			.dialog({
			resizable: false,
			height:150,
			modal: true,
			title:'¿Borrar?',
			buttons: {
				"Borrar": function() {
					$.post("index.php", { borrarnoticia: botonborrar.attr('rel') },
					  function( data ) {
					  	var content = $( data ).find( '#noticias ul' );
					    $("#noticias ul").html( content );
					  }
					);
					$( this ).dialog( "close" );
				},
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});
	$('.edit').live('click',function(){
		$.post("index.php", { editarnoticia: $(this).attr('rel') },
		  function( data ) {
		  	var content = $( data ).find( '#noticias ul' );
		    $("#noticias ul").html( content );
		  }
		);
	});
});
</script>
</body>
</html>
