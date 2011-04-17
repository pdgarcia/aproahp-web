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
	
	if(isset($_POST['submitusuario'])) {
		$Username=cleanQuery($_POST['inp_username']);
		$Password=md5(cleanQuery($_POST['inp_password']));
		$Displayname=cleanQuery($_POST['inp_Displayname']);
		$Email=cleanQuery($_POST['inp_email']);
		
		$sqlstring="INSERT INTO tbl_users (USR_Username,USR_Password,USR_Displayname,USR_email,USR_Activo) VALUES ('$Username','$Password','$Displayname','$Email','1');";

		if(mysql_query($sqlstring)){
			echo "Usuario agregada.....";
		}
		else{	
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
	if(isset($_POST['borrarusuario'])) {
		$ID=cleanQuery($_POST['borrarusuario']);
		
		if(mysql_query("DELETE FROM tbl_users WHERE USR_ID='$ID';")){
			echo "Usuario Borrado.....";
		}
		else{	
			echo "Error: ".mysql_error();
		}
	}
	if(isset($_POST['cambiarestado'])) {
	
		$id=cleanQuery($_POST['cambiarestado']);
		$usr_result=mysql_query("SELECT * FROM tbl_users WHERE USR_ID='$id';");

		if(mysql_num_rows($usr_result) == 1){
			$row = mysql_fetch_assoc($usr_result);
			print_r($row);
			if(trim($row["USR_Activo"]) == 1){
				$res=mysql_query("UPDATE tbl_users SET USR_Activo=0 WHERE USR_ID='$id';");
			}else{
				$res=mysql_query("UPDATE tbl_users SET USR_Activo=1 WHERE USR_ID='$id';");
			}
		}
		else{	
			echo "El usuario no existe"; 
			die();
		}
	}
?>
<div id='usuarios'>
	<h3>Usuarios</h3><br/>
	<div id="adduser" >Agregar Usuario</div>
	<div id='usuariosform'  title='Agregar Nuevo Usuario'>
		<p class="validateTips">Todos los campos son necesarios.</p>
		<form id='frm_adduser' method='post' action='<?=$paginaactual?>'>
		<label for="inp_username">Usuario:</label><input type='text' name='inp_username' id='inp_username' class='text ui-widget-content ui-corner-all'><br/>
		<label for="inp_Displayname">Nombre:</label><input type='text' name='inp_Displayname' id='inp_Displayname' class='text ui-widget-content ui-corner-all'><br/>
		<label for="inp_email">Correo:</label><input type='text' name='inp_email' id='inp_email' class='text ui-widget-content ui-corner-all'><br/>
		<label for="inp_password">Password:</label><input type='password' name='inp_password' id='inp_password' class='text ui-widget-content ui-corner-all'><br/>
		<input type="hidden" name="inp_id" id="inp_id" value="">
		</form>
	</div>

<?php
		echo "<table class='ui-widget ui-widget-content'>";
		echo "<thead  class='ui-widget-header'><td>Acciones</td><td>Usuario</td><td>Nombre</td><td>Email</td></thead>";
		$usr_result=mysql_query("SELECT * FROM tbl_users ORDER BY USR_Displayname;");
		for ($x = 0, $numrows = mysql_num_rows($usr_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($usr_result);

			echo "<tr><td><div class=edit rel='".$row["USR_ID"]."'>Editar</div><div class=borrar rel='".$row["USR_ID"]."'>Borrar</div><div rel='".$row["USR_ID"]."' class=activar";
			if(trim($row["USR_Activo"]) =="1") echo ">Desactivar"; else echo ">Activar";
			echo"</div></td><td>".$row["USR_username"]."</td><td>".$row["USR_Displayname"]."</td><td>".$row["USR_email"]."</td></tr>";
	    }  

		echo "</table>";
?>
</div><!-- fin div noticias -->
</div><!-- fin content -->
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function() {
	var username = $( "#inp_username" ),
	displayname = $( "#inp_Displayname" ),
	email = $( "#inp_email" ),
	password = $( "#inp_password" ),
	allFields = $( [] ).add( username ).add( displayname ).add( email ).add( password ),
	tips = $( ".validateTips" );
	
	function updateTips( t ) {
	tips
		.text( t )
		.addClass( "ui-state-highlight" );
	setTimeout(function() {
		tips.removeClass( "ui-state-highlight", 1500 );
		}, 500 );
	}
	function checkLength( o, n, min, max ) {
		if ( o.val().length > max || o.val().length < min ) {
			o.addClass( "ui-state-error" );
			updateTips( "Length of " + n + " must be between " +
				min + " and " + max + "." );
			return false;
		} else {
			return true;
		}
	}
	
	function checkRegexp( o, regexp, n ) {
		if ( !( regexp.test( o.val() ) ) ) {
			o.addClass( "ui-state-error" );
			updateTips( n );
			return false;
		} else {
			return true;
		}
	}

	
		$( "#usuariosform" ).dialog({
			autoOpen: false,
			height: 300,
			width: 450,
			modal: true,
			buttons: {
				"Agregar usuario": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( username, "Usuario", 3, 16 );
					bValid = bValid && checkLength( displayname, "DisplayName", 3, 16 );
					bValid = bValid && checkLength( email, "email", 6, 80 );
					bValid = bValid && checkLength( password, "password", 5, 16 );

					bValid = bValid && checkRegexp( username, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
					
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

					if ( bValid ) {
						$.post("usuarios.php", { 
							submitusuario: '1',
							inp_username: $("#inp_username").attr('value'),
							inp_Displayname: $("#inp_Displayname").attr('value'),
							inp_email: $("#inp_email").attr('value'),
							inp_password: $("#inp_password").attr('value') },
					  		function( data ) {
					  			var content = $( data ).find( '#usuarios table' );
					    		$("#usuarios table").html( content );
					  		}
						); 
						$( this ).dialog( "close" );
					}
				},
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
	
	
	
	
	$('#adduser').button().click(function() {
			$( "#usuariosform" ).dialog( "open" );
	});


	$('.borrar').live('click',function(){
		var botonborrar= $(this);
		
		var $dialog = $('<div></div>')
			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>El Usuario sera borrado, ¿esta usted seguro?</p>')
			.dialog({
			resizable: false,
			height:150,
			modal: true,
			title:'¿Borrar?',
			buttons: {
				"Borrar": function() {
					$.post("usuarios.php", { borrarusuario: botonborrar.attr('rel') },
					  function( data ) {
					  	var content = $( data ).find( '#usuarios table' );
					    $("#usuarios table").html( content );
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
		$.post("noticias.php", { editarnoticia: $(this).attr('rel') },
		  function( data ) {
		  	var content = $( data ).find( '#noticias ul' );
		    $("#noticias ul").html( content );
		  }
		);
	});
	$('.activar').live('click',function(){
		$.post("usuarios.php", { cambiarestado: $(this).attr('rel') },
		  function( data ) {
		  	var content = $( data ).find( '#usuarios table' );
		    $("#usuarios table").html( content );
		  }
		);
	});
});
</script>
</body>
</html>
