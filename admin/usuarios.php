<?phprequire_once 'classes/Membership.php';$membership = New Membership();$membership->confirm_Member();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-type" content="text/html; charset=utf-8" />	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">	<link rel="icon" href="../favicon.ico" type="image/x-icon">    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" charset="utf-8">    <link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" charset="utf-8">	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" charset="utf-8">	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">	<title>Web oficial de Aproahp(Página de Administración)</title></head><body><div id="container"><?php require("header.php")?><!-- inicio content --><?php	require_once("../lib/siteconfig.php");		if(isset($_POST['submitusuario'])) {		$Username=cleanQuery($_POST['inp_username']);		$Password=md5(cleanQuery($_POST['inp_password']));		$Displayname=cleanQuery($_POST['inp_displayname']);		$Email=cleanQuery($_POST['inp_email']);				$sqlstring="INSERT INTO tbl_users (USR_Username,USR_Password,USR_Displayname,USR_email,USR_Activo) VALUES ('$Username','$Password','$Displayname','$Email','1');";		if(mysql_query($sqlstring)){			echo "Usuario agregada.....";		}		else{				echo "Error: ".mysql_error();		}	}		if(isset($_POST['editusuario'])) {		$Username=cleanQuery($_POST['inp_username']);		$Password=cleanQuery($_POST['inp_password']);		$Displayname=cleanQuery($_POST['inp_displayname']);		$Email=cleanQuery($_POST['inp_email']);		$userid=cleanQuery($_POST['inp_userid']);				if(mysql_query("UPDATE tbl_users SET USR_Username='$Username',USR_Displayname='$Displayname',USR_email='$Email' WHERE USR_ID='$userid';")){			if($Password !== "XXXXX"){				$Password=md5($Password);				mysql_query("UPDATE tbl_users SET USR_Password='$Password' WHERE USR_ID='$userid';");			}			echo "Usuario cambiado.....";		}		else{			$result=array("status" => "Error", "message" => mysql_error());			}	}		if(isset($_POST['borrarusuario'])) {		$ID=cleanQuery($_POST['borrarusuario']);				if(mysql_query("DELETE FROM tbl_users WHERE USR_ID='$ID';")){			echo "Usuario Borrado.....";		}		else{				echo "Error: ".mysql_error();		}	}	if(isset($_POST['cambiarestado'])) {			$id=cleanQuery($_POST['cambiarestado']);		$usr_result=mysql_query("SELECT * FROM tbl_users WHERE USR_ID='$id';");		if(mysql_num_rows($usr_result) == 1){			$row = mysql_fetch_assoc($usr_result);			if(trim($row["USR_Activo"]) == 1){				$res=mysql_query("UPDATE tbl_users SET USR_Activo=0 WHERE USR_ID='$id';");			}else{				$res=mysql_query("UPDATE tbl_users SET USR_Activo=1 WHERE USR_ID='$id';");			}		}		else{				echo "El usuario no existe"; 			die();		}	}?><div id='usuarios'>	<h3>Usuarios</h3><br/>	<div id="adduser" >Agregar Usuario</div>	<div id='usuariosform'>		<div id="loader" style="display:none"><img style="margin: 50px auto;position: relative;display: block;" src="../images/ajax-loader.gif" alt="Esperando Datos"></div>		<form id='frm_user' method='post' action=''>		<table>			<tr><td><label for="inp_username">Usuario:</label></td><td><input type='text' name='inp_username' id='inp_username' maxlength='32' class='text ui-widget-content ui-corner-all'></td></tr>			<tr><td><label for="inp_Displayname">Nombre:</label></td><td><input type='text' name='inp_displayname' maxlength='50' id='inp_displayname' class='text ui-widget-content ui-corner-all'></td></tr>			<tr><td><label for="inp_email">Correo:</label></td><td><input type='text' name='inp_email' id='inp_email' maxlength='50' class='text ui-widget-content ui-corner-all'></td></tr>			<tr><td><label for="inp_password">Password:</label></td><td><input type='password' name='inp_password' id='inp_password' maxlength='32' class='text ui-widget-content ui-corner-all'></td></tr>		</table>		<input type="hidden" name="inp_id" id="inp_id" value="">		</form>	</div><?php		echo "<div id='usuarioslist'><table class='ui-widget ui-widget-content'>";		echo "<thead  class='ui-widget-header'><td>Acciones</td><td>Usuario</td><td>Nombre</td><td>Email</td></thead>";		$usr_result=mysql_query("SELECT * FROM tbl_users ORDER BY USR_Displayname;");		for ($x = 0, $numrows = mysql_num_rows($usr_result); $x < $numrows; $x++) {  			$row = mysql_fetch_assoc($usr_result);			echo "<tr><td><div class='edit' rel='".$row["USR_ID"]."'>Editar</div><div class=borrar rel='".$row["USR_ID"]."'>Borrar</div><div rel='".$row["USR_ID"]."' class=activar";			if(trim($row["USR_Activo"]) =="1") echo ">Desactivar"; else echo ">Activar";			echo"</div></td><td>".$row["USR_username"]."</td><td>".$row["USR_Displayname"]."</td><td>".$row["USR_email"]."</td></tr>";	    }  		echo "</table></div>";?></div><!-- fin div noticias --></div><!-- fin content --><?php require("../footer.html")?><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script><script src="../js/jquery.validate.js" type="text/javascript" charset="utf-8"></script><script src="../js/script.js" type="text/javascript" charset="utf-8"></script><script type="text/javascript">$(function() {		 $("#frm_user").validate({	  rules: {	    inp_username: {	      required: true,	      maxlength: 32	    },	    inp_displayname: {	      required: true,	      maxlength: 50	    },	    inp_email: {	      required: true,	      email: true,	      maxlength: 50	    },	    inp_password: {	      required: true,	      minlength: 4,	      maxlength: 32	    }	  },	});		$( "#usuariosform" ).dialog({		autoOpen: false,		height: 300,		width: 650,		modal: true,		beforeClose: function(event, ui) {			$('form input').val('')		},		close: function() {		}	});		$('#adduser').button().click(function() {			$( "#usuariosform" ).dialog({				title: "Agregar Nuevo Usuario",				buttons: {					"Agregar usuario": function() {		        		if ( $("#frm_user").valid() ) {							$.post("usuarios.php", { 								submitusuario: '1',								inp_username: $("#inp_username").val(),								inp_displayname: $("#inp_displayname").val(),								inp_email: $("#inp_email").val(),								inp_password: $("#inp_password").val() },						  		function( data ) {						  			var content = $( data ).find( '#usuarioslist table' );						    		$("#usuarioslist table").html( content );						  		}							); 							$( this ).dialog( "close" );		        		}    				},    				"Cancelar": function() {						$( this ).dialog( "close" );					}    			}		 });				$( "#usuariosform" ).dialog( "open" );	});	$('.borrar').live('click',function(){		var botonborrar= $(this);				var $dialog = $('<div></div>')			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>El Usuario sera borrado, ¿esta usted seguro?</p>')			.dialog({			resizable: false,			height:150,			modal: true,			title:'¿Borrar?',			buttons: {				"Borrar": function() {					$.post("usuarios.php", { borrarusuario: botonborrar.attr('rel') },					  function( data ) {					  	var content = $( data ).find( '#usuarioslist table' );					    $("#usuarioslist table").html( content );					  }					);					$( this ).dialog( "close" );				},				"Cancelar": function() {					$( this ).dialog( "close" );				}			}		});	});	$('.edit').live('click',function(){	// Edit form		var userid = $(this).attr('rel');		//Load data		$.ajax({			url: 'json.php',			type: 'POST',			dataType: 'json',			data:({requestuserdata : userid}),			beforeSend:function(){				$( "#usuariosform form" ).hide();				$("#loader").show();			},			success:function(data){				$("#loader").hide();				$( "#usuariosform form" ).show();				if(data.status == 'Ok'){					$("#inp_username").val(data.Username);					$("#inp_displayname").val(data.DisplayName);					$("#inp_email").val(data.email);					$("#inp_password").val("XXXXX");				}else{					alert("error consultando datos".data.message);				}			}		});				//Load data				$( "#usuariosform" ).dialog({				title: "Modificar Usuario",				buttons: {					"Editar usuario": function() {		        		if ( $("#frm_user").valid() ) {							$.post("usuarios.php", { 								editusuario: '1',								inp_username: $("#inp_username").attr('value'),								inp_displayname: $("#inp_displayname").attr('value'),								inp_email: $("#inp_email").attr('value'),								inp_password: $("#inp_password").attr('value'),								inp_userid: userid },						  		function( data ) {						  			var content = $( data ).find( '#usuarioslist table' );						    		$("#usuarioslist table").html( content );						  		}							); 							$( this ).dialog( "close" );		        		}    				},    				"Cancelar": function() {						$( this ).dialog( "close" );					}    			}		 });		$( "#usuariosform" ).dialog( "open" );	});		$('.activar').live('click',function(){		$.post("usuarios.php", { cambiarestado: $(this).attr('rel') },		  function( data ) {		    $("#usuarioslist table").html( $( data ).find( '#usuarioslist table' ) );		  }		);	});});</script></body></html>