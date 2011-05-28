<?php
	require_once 'classes/Membership.php';
	$membership = New Membership();
	$membership->confirm_Member();
	require_once("../lib/siteconfig.php");

	$Mensaje= '';
	if(isset($_POST['borrarentrada'])) {
		$ID=cleanQuery($_POST['borrarentrada']);
		
		if(mysql_query("DELETE FROM tbl_opositores WHERE OPT_ID='$ID';")){
			$Mensaje= "mensaje borrado.....";
		}
		else{
			$Mensaje= "Error: ".mysql_error();
		}
	}
	if(isset($_POST['cambiaruser'])) {
		$ID=cleanQuery($_POST['userid']);
		setconfig_value("opositores_adminuser",$ID);
	}
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
<div id="mensaje" style="display:none" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header ui-corner-all">Status</h3>
		<p><?php echo $Mensaje ?></p>
</div>
<?php require("header.php")?>
<!-- inicio content -->
<?php
	$cfg_result=mysql_query("SELECT * FROM tbl_users where usr_ID=".config_value("opositores_adminuser")."");
	if(mysql_num_rows($cfg_result)!=1) 
	{
		echo "[ERROR]-Falta elemento de Configuración";
	}else{
		$row = mysql_fetch_assoc($cfg_result);
	}

	echo "<div id=opoconfig> Configuración de la Pagina Opositores<br>Cuando se escriba una nueva entrada, se enviara un mail al usuario <strong>".$row["USR_Displayname"]."</strong>, para cambiarlo seleccione el usuario de la siguiente lista:";
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
	if(isset($_GET['pagenum'])){
		$pagenum = $_GET['pagenum']; 
	}else{
		$pagenum = 1;
	}

	$doc_result = mysql_query("SELECT * FROM tbl_blog ORDER BY blg_fecha DESC;") or die(mysql_error());
	$rows = mysql_num_rows($doc_result);

	$page_rows = 5;

	$pdata=pagination($rows,$pagenum,$page_rows);
	echo ($pdata['links']);
	echo "<ul>";
	$OPT_result=mysql_query("SELECT * FROM tbl_opositores ORDER BY OPT_fecha DESC ".$pdata['limites'].";");
	for ($x = 0, $numrows = mysql_num_rows($OPT_result); $x < $numrows; $x++) {  
		$row = mysql_fetch_assoc($OPT_result);
		$datetime = date("d/m/y g:i A", strtotime($row["OPT_Fecha"]));
		if($row["OPT_Email"]!=""){
			$emaillink="<a href='mailto:".$row["OPT_Email"]."'>".$row["OPT_Email"]."</a>";
		}else {$emaillink=" ";}

		echo "<li class= post><div class=borrar rel='".$row["OPT_ID"]."'>Borrar</div><span class=highlight>".$row["OPT_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["OPT_Autor"]." - ".$emaillink."</span> el <span class=highlight>".$datetime."</span><br>".nl2br($row["OPT_Comentario"])."</li>";
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

	showmsg();

	$('.borrar').live('click',function(){
		var botonborrar= $(this);

		var $dialog = $('<div></div>')
			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>La entrada sera borrada, ¿esta usted seguro?</p>')
			.dialog({
			resizable: false,
			height:180,
			modal: true,
			title:'¿Borrar?',
			buttons: {
				"Borrar": function() {
					$.post("opositores.php", { borrarentrada: botonborrar.attr('rel') },
						function( data ) {
							$("#blog").html( $( data ).find( '#blog' ).html() );
							$("#mensaje").html( $( data ).find( '#mensaje' ).html() );
							showmsg();
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
