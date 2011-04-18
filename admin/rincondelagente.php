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
	
	if(isset($_POST['borrarentrada'])) {
		$ID=cleanQuery($_POST['borrarentrada']);
		
		if(mysql_query("DELETE FROM tbl_blog WHERE BLG_ID='$ID';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "noticia borrada.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
	if(isset($_POST['cambiaruser'])) {
		$ID=cleanQuery($_POST['userid']);
		setconfig_value("rincon_adminuser",$ID);
	}
	
	$cfg_result=mysql_query("SELECT * FROM tbl_users where usr_ID=".config_value("rincon_adminuser").";");
	if(mysql_num_rows($cfg_result)!=1) 
	{
		echo "[ERROR]-Falta elemento de Configuracion";
	}else{
		$row = mysql_fetch_assoc($cfg_result);
	}

	echo "<div id=configuracion> Configuracion de la Pagina Rincon del Agente<br> cuando se escriba una nueva entrada, se enviara un mail al usuario <strong>".$row["USR_Displayname"]."</strong>, para cambiarlo seleccione de la lista:";
	echo "<form id='frm_user' method='post' action='".$paginaactual."'>";
	echo "<select name='userid'>";
	$user_result=mysql_query("SELECT * FROM tbl_users ORDER BY USR_Displayname");
	for ($x = 0, $numrows = mysql_num_rows($user_result); $x < $numrows; $x++) {  
		$row = mysql_fetch_assoc($user_result);
		echo "<option value=".$row["USR_ID"].">".$row["USR_Displayname"]."</option>";
	}
	echo "</select>";
	echo "<input type='submit' value='Cambiar' name='cambiaruser' id='cambiaruser'>";
	echo "</form>";

	echo "</div><hr>";
	echo "<div id=blog>";

	echo "<ul>";
	$blg_result=mysql_query("SELECT * FROM tbl_blog ORDER BY blg_fecha DESC;");
	for ($x = 0, $numrows = mysql_num_rows($blg_result); $x < $numrows; $x++) {  
		$row = mysql_fetch_assoc($blg_result);
		$datetime = date("d/m/y g:i A", strtotime($row["BLG_Fecha"]));
		if($row["BLG_Email"]!=""){
			$emaillink="<a href='mailto:".$row["BLG_Email"]."'>".$row["BLG_Email"]."</a>";
		}else {$emaillink=" ";}

		echo "<li class= post><div class=borrar rel='".$row["BLG_ID"]."'>Borrar</div><span class=highlight>".$row["BLG_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["BLG_Autor"]." - ".$emaillink."</span> el <span class=highlight>".$datetime."</span><br>".nl2br($row["BLG_Comentario"])."</li>";
	}  

	echo "</ul>";
	echo "</div><!-- fin div blog-->";


?>
</div><!-- fin content -->
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function() {

	$('.borrar').live('click',function(){
		var botonborrar= $(this);
		
		var $dialog = $('<div></div>')
			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>La entrada sera borrada, ¿esta usted seguro?</p>')
			.dialog({
			resizable: false,
			height:150,
			modal: true,
			title:'¿Borrar?',
			buttons: {
				"Borrar": function() {
					$.post("rincondelagente.php", { borrarentrada: botonborrar.attr('rel') },
					  function( data ) {
					  	var content = $( data ).find( '#blog ul' );
					    $("#blog ul").html( content );
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
});
</script>
</body>
</html>
