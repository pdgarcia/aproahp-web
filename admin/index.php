<?php
	require_once 'classes/Membership.php';
	$membership = New Membership();
	$membership->confirm_Member();

	require_once("../lib/siteconfig.php");

	foreach($_POST as $nombre_campo => $valor){
		$asignacion = "\$" . $nombre_campo . "='" . cleanQuery($valor) . "';";
		eval($asignacion);
	}

	$Mensaje='';
	if(isset($funcion)) {
		switch($funcion){
			case add:
				$userid=$_SESSION['UserID'];
				list($day,$month,$year)=explode("/",$inp_fecha);
				$fecha = $year."-".$month."-".$day;

				$sqlstring="INSERT INTO tbl_noticias (NOT_Fecha,NOT_Autor,NOT_Titulo,NOT_Resumen,NOT_Texto) VALUES ('$fecha','$userid','$inp_titulo','$inp_resumen','$inp_texto');";

				if(mysql_query($sqlstring)){
					$Mensaje= ".....Noticia agregada....." . mysql_error();
				}
				else{		
					$Mensaje= "Error: " . mysql_error();
				}
				break;
			case edit:
				$userid=$_SESSION['UserID'];
				list($day,$month,$year)=explode("/",$inp_fecha);
				$fecha = $year."-".$month."-".$day;

				if(mysql_query("UPDATE tbl_noticias SET NOT_Fecha='$fecha' ,NOT_Autor='$userid' ,NOT_Titulo='$inp_titulo',NOT_Resumen='$inp_resumen',NOT_Texto='$inp_texto' WHERE NOT_ID='$inp_notid';")){
					$Mensaje= ".....Noticia cambiada....." . mysql_error();
				}
				else{		
					$Mensaje= "Error: ".mysql_error();
				}
				break;
			case del:
				if(mysql_query("DELETE FROM tbl_noticias WHERE NOT_ID='$inp_notid';")){
					$Mensaje= ".....Noticia borrada....." . mysql_error();
				}
				else{		
					$Mensaje= "Error: ".mysql_error();
				}
				break;
		}
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
		<p><?=$Mensaje?></p>
</div>
<?php require("header.php")?>
<!-- inicio content -->
<div id='noticias'>
	<h3>Noticias</h3><br>
		<div id="addnoticia" >Agregar Noticia</div>
		<div id='noticiasform'>
			<div id="loader" style="display:none"><img style="margin: 50px auto;position: relative;display: block;" src="../images/ajax-loader.gif" alt="Esperando Datos"></div>
			<form id='frm_noticia' method='post' action='<?=$paginaactual?>'>
				<label for="inp_fecha">Fecha:<img src="images/b_calendar.png" alt="Calendario" width="16" height="16" /></label><input type='text' name='inp_fecha' id='inp_fecha' maxlength='10' class='text ui-widget-content ui-corner-all'><br/>
				<label for="inp_titulo">Titulo:</label><input type='text' name='inp_titulo' id='inp_titulo' maxlength='50' class='text ui-widget-content ui-corner-all'><br/>
				<label for="inp_resumen">Resumen:</label><textarea cols="80" rows="5" name='inp_resumen' id='inp_resumen' maxlength='255' class='text ui-widget-content ui-corner-all'></textarea><br/>
				<label for="inp_texto">Texto:</label><textarea cols="80" rows="20" name='inp_texto' id='inp_texto' maxlength='5000' class='text ui-widget-content ui-corner-all'></textarea><br/>
				<input type="hidden" name="inp_notid" id="inp_notid" value="">
				<input type="hidden" name="funcion" id="funcion" value="">
			</form>
		</div>
	

<?php
		echo "<div id='noticiaslist'><ul>";
		if(isset($_GET['pagenum'])){
			$pagenum = $_GET['pagenum']; 
		}else{
			$pagenum = 1;
		}

		$not_result = mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID ORDER BY `NOT_FECHA` DESC") or die(mysql_error());
		$rows = mysql_num_rows($not_result);

		$page_rows = 3;

		$pdata=pagination($rows,$pagenum,$page_rows);
		echo ($pdata['links']);	

		$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID ORDER BY NOT_FECHA DESC ".$pdata['limites'].";");
		for ($x = 0, $numrows = mysql_num_rows($not_result); $x < $numrows; $x++) {
			$row = mysql_fetch_assoc($not_result);
			$datetime = date("d/m/y", strtotime($row["NOT_FECHA"]));

			echo "<li class=noticia><div class=edit rel='".$row["NOT_ID"]."'>Editar</div><div class=borrar rel='".$row["NOT_ID"]."'>Borrar</div><span class=highlight>".$row["NOT_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["USR_Displayname"]."</span> el <span class=highlight>".$datetime."</span><br><div class=resumen>".nl2br($row["NOT_resumen"])."</div><br>".nl2br(neat_trim($row["NOT_texto"],1000))."</li>";
		}

		echo "</ul></div>";
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
	if($("#mensaje p").text() != ""){
		$("#mensaje" ).center().show( 'bounce','' , 1000).fadeOut(200);
	}

	$('#inp_fecha').datepicker();
	var frm_noticia = $("#frm_noticia").validate({
		rules: {
			inp_fecha: {
				required: true,
				date: true
			},
			inp_titulo: {
				required: true,
				maxlength: 50
			},
			inp_resumen: {
				required: true,
				maxlength: 255
			},
			inp_texto: {
				required: false,
				maxlength: 5000
			}
		},
	});

	$( "#noticiasform" ).dialog({
		autoOpen: false,
		height: 650,
		width: 650,
		modal: true,
		beforeClose: function(event, ui) {
			frm_noticia.resetForm();
			$('form :input').val('')
		},
		close: function() {
		}
	});

	$('#addnoticia').button().click(function() {
			$( "#noticiasform" ).dialog({
				title: "Agregar Nueva Noticia",
				buttons: {
					"Agregar Noticia": function() {
						$('#funcion').val('add');
						if ( $("#frm_noticia").valid() ) {
							$("#frm_noticia").submit();
							$( this ).dialog( "close" );
						}
					},
					"Cancelar": function() {
						$( this ).dialog( "close" );
					}
				}
		 });
	
		$( "#noticiasform" ).dialog( "open" );
	});

	$('.edit').live('click',function(){
		var notid = $(this).attr('rel');
		$.ajax({
			url: 'json.php',
			type: 'POST',
			dataType: 'json',
			data:({requestnoticiadata : notid}),
			beforeSend:function(){
				$( "#noticiasform form" ).hide();
				$("#loader").show();
			},
			success:function(data){
				if(data.status == 'Ok'){
					$("#inp_fecha").val(data.fecha);
					$("#inp_titulo").val(data.titulo);
					$("#inp_resumen").val(data.resumen);
					$("#inp_texto").val(data.texto);
				}else{
					alert("error consultando datos".data.message);
				}
			},
			complete:function(){
				$("#loader").hide();
				$( "#noticiasform form" ).show();
			}
		});
		$( "#noticiasform" ).dialog({
				title: "Modificar Noticia",
				buttons: {
					"Editar usuario": function() {
						$('#funcion').val('edit');
						$('#inp_notid').val(notid);
						if ( $("#frm_noticia").valid() ) {
							$("#frm_noticia").submit();
							$( this ).dialog( "close" );
						}
					},
					"Cancelar": function() {
						$( this ).dialog( "close" );
					}
				}
		 });
		$( "#noticiasform" ).dialog( "open" );
	});

	$('.borrar').live('click',function(){
		var botonborrar= $(this);
		var $dialog = $('<div></div>')
			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>La noticia sera borrada, ¿esta usted seguro?</p>')
			.dialog({
			resizable: false,
			height:180,
			modal: true,
			title:'¿Borrar?',
			buttons: {
				"Borrar": function() {
					$.post("index.php", { funcion: 'del',inp_notid: botonborrar.attr('rel') },
					  function( data ) {
					    $("#noticiaslist").html( $( data ).find( '#noticiaslist' ).html() );
						$("#mensaje").html( $( data ).find( '#mensaje' ).html() );
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
