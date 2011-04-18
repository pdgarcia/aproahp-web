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
			//print_r($row);
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
		<form id='frm_adduser' method='post' action=''>
		<table>
			<tr><td><label for="inp_username">Usuario:</label></td><td><input type='text' name='inp_username' id='inp_username' class='text ui-widget-content ui-corner-all'></td></tr>
			<tr><td><label for="inp_Displayname">Nombre:</label></td><td><input type='text' name='inp_Displayname' id='inp_Displayname' class='text ui-widget-content ui-corner-all'></td></tr>
			<tr><td><label for="inp_email">Correo:</label></td><td><input type='text' name='inp_email' id='inp_email' class='text ui-widget-content ui-corner-all'></td></tr>
			<tr><td><label for="inp_password">Password:</label></td><td><input type='password' name='inp_password' id='inp_password' class='text ui-widget-content ui-corner-all'></td></tr>
		</table>
		<input type="hidden" name="inp_id" id="inp_id" value="">
		</form>
	</div>

<?php
		echo "<div id='usuarioslist'><table class='ui-widget ui-widget-content'>";
		echo "<thead  class='ui-widget-header'><td>Acciones</td><td>Usuario</td><td>Nombre</td><td>Email</td></thead>";
		$usr_result=mysql_query("SELECT * FROM tbl_users ORDER BY USR_Displayname;");
		for ($x = 0, $numrows = mysql_num_rows($usr_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($usr_result);

			echo "<tr><td><div class='edit' rel='".$row["USR_ID"]."'>Editar</div><div class=borrar rel='".$row["USR_ID"]."'>Borrar</div><div rel='".$row["USR_ID"]."' class=activar";
			if(trim($row["USR_Activo"]) =="1") echo ">Desactivar"; else echo ">Activar";
			echo"</div></td><td>".$row["USR_username"]."</td><td>".$row["USR_Displayname"]."</td><td>".$row["USR_email"]."</td></tr>";
	    }  

		echo "</table></div>";
?>
</div><!-- fin div noticias -->
</div><!-- fin content -->
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(function() {	
	var v = $("#frm_adduser").validate({
	  rules: {
	    inp_username: {
	      required: true,
	      maxlength: 32
	    },
	    inp_Displayname: {
	      required: true,
	      maxlength: 50
	    },
	    inp_email: {
	      required: true,
	      email: true,
	      maxlength: 50
	    },
	    inp_password: {
	      required: true,
	      maxlength: 32
	    }
	  },
	});
	
	$( "#usuariosform" ).dialog({
		autoOpen: false,
		height: 300,
		width: 550,
		modal: true,
		beforeClose: function(event, ui) {
			v.resetForm();
			$('form input').val('')
		},
		close: function() {
		}
	});
	
	$('#adduser').button().click(function() {
			$( "#usuariosform" ).dialog({ 
				buttons: {					"Agregar usuario": function() {
		        		if ( $("#frm_adduser").valid() ) {
							$.post("usuarios.php", { 
								submitusuario: '1',
								inp_username: $("#inp_username").attr('value'),
								inp_Displayname: $("#inp_Displayname").attr('value'),
								inp_email: $("#inp_email").attr('value'),
								inp_password: $("#inp_password").attr('value') },
						  		function( data ) {
						  			var content = $( data ).find( '#usuarioslist table' );
						    		$("#usuarioslist table").html( content );
						  		}
							); 
							$( this ).dialog( "close" );
		        		}
    				},
    				"Cancelar": function() {
						$( this ).dialog( "close" );
					}
    			}
		 });
	
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
					  	var content = $( data ).find( '#usuarioslist table' );
					    $("#usuarioslist table").html( content );
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
	// Edit form
		$( "#usuariosform" ).dialog({ 
				buttons: {
					"Editar usuario": function() {
		        		if ( $("#frm_adduser").valid() ) {
							$.post("usuarios.php", { 
								submitusuario: '1',
								inp_username: $("#inp_username").attr('value'),
								inp_Displayname: $("#inp_Displayname").attr('value'),
								inp_email: $("#inp_email").attr('value'),
								inp_password: $("#inp_password").attr('value') },
						  		function( data ) {
						  			var content = $( data ).find( '#usuarioslist table' );
						    		$("#usuarioslist table").html( content );
						  		}
							); 
							$( this ).dialog( "close" );
		        		}
    				},
    				"Cancelar": function() {
						$( this ).dialog( "close" );
					}
    			}
		 });
	// Edit form	
		$( "#usuariosform" ).dialog( "open" );
/*	
		$.post("noticias.php", { editarnoticia: $(this).attr('rel') },
		  function( data ) {
		  	var content = $( data ).find( '#usuarioslist ul' );
		    $("#usuarioslist ul").html( content );
		  }
		);
*/
	});
	
	$('.activar').live('click',function(){
		$.post("usuarios.php", { cambiarestado: $(this).attr('rel') },
		  function( data ) {
		    $("#usuarioslist table").html( $( data ).find( '#usuarioslist table' ) );
		  }
		);
	});
});
</script>
</body>
</html>
