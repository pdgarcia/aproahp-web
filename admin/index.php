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
			echo ".....Noticia agregada.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}

	if(isset($_POST['editnoticia'])) {
		$fecha=cleanQuery($_POST['inp_fecha']);
		$titulo=cleanQuery($_POST['inp_titulo']);
		$resumen=cleanQuery($_POST['inp_resumen']);
		$texto=cleanQuery($_POST['inp_texto']);
		$notid=cleanQuery($_POST['inp_notid']);
		$userid=$_SESSION['UserID'];
		
		list($day,$month,$year)=explode("/",$fecha);
		$fecha = $year."-".$month."-".$day;
				
		if(mysql_query("UPDATE tbl_noticias SET NOT_Fecha='$fecha' ,NOT_Autor='$userid' ,NOT_Titulo='$titulo',NOT_Resumen='$resumen',NOT_Texto='$texto' WHERE NOT_ID='$notid';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo ".....Noticia cambiada.....";
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
		<div id="addnoticia" >Agregar Noticia</div>
		<div id='noticiasform'>
			<div id="loader" style="display:none"><img style="margin: 50px auto;position: relative;display: block;" src="../images/ajax-loader.gif" alt="Esperando Datos"></div>
			<form id='frm_noticia' method='post'>
				<label for="inp_fecha">Fecha:<img src="images/b_calendar.png" alt="Calendario" width="16" height="16" /></label><input type='text' name='inp_fecha' id='inp_fecha' class='text ui-widget-content ui-corner-all'><br/>
				<label for="inp_titulo">Titulo:</label><input type='text' name='inp_titulo' id='inp_titulo' class='text ui-widget-content ui-corner-all'><br/>
				<label for="inp_resumen">Resumen:</label><textarea cols="80" rows="5" name='inp_resumen' id='inp_resumen' class='text ui-widget-content ui-corner-all'></textarea><br/>
				<label for="inp_texto">Texto:</label><textarea cols="80" rows="20" name='inp_texto' id='inp_texto' class='text ui-widget-content ui-corner-all'></textarea><br/>
				<input type="hidden" name="inp_id" id="inp_id" value="">
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
		
		$last = ceil($rows/$page_rows); 
		
		if ($pagenum < 1)
			{ $pagenum = 1; }
		elseif ($pagenum > $last)
			{ $pagenum = $last; }
			
		paginationlinks($rows,$pagenum,$page_rows);	
		$limites = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;
		
		$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID ORDER BY NOT_FECHA DESC $limites;");
		for ($x = 0, $numrows = mysql_num_rows($not_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($not_result);
			$datetime = date("d/m/y", strtotime($row["NOT_FECHA"]));

			echo "<li class=noticia><div class=edit rel='".$row["NOT_ID"]."'>Editar</div><div class=borrar rel='".$row["NOT_ID"]."'>Borrar</div><span class=highlight>".$row["NOT_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["USR_Displayname"]."</span> el <span class=highlight>".$datetime."</span><br><div class=resumen>".nl2br($row["NOT_resumen"])."</div><br>".nl2br($row["NOT_texto"])."</li>";
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
	$('#inp_fecha').datepicker();
	 $("#frm_noticia").validate({
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
			$('#frm_noticia input').val('')
		},
		close: function() {
		}
	});
	
	$('#addnoticia').button().click(function() {
			$( "#noticiasform" ).dialog({
				title: "Agregar Nueva Noticia",
				buttons: {
					"Agregar Noticia": function() {
		        		if ( $("#frm_noticia").valid() ) {
							$.post("index.php", { 
								submitnoticia: '1',
								inp_fecha: $("#inp_fecha").val(),
								inp_titulo: $("#inp_titulo").val(),
								inp_resumen: $("#inp_resumen").val(),
								inp_texto: $("#inp_texto").val() },
						  		function( data ) {
						  			var content = $( data ).find( '#noticiaslist' );
						    		$("#noticiaslist").html( content );
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
	
		$( "#noticiasform" ).dialog( "open" );
	});
/////////////////////////////////////////////////////////////
	$('.edit').live('click',function(){
	// Edit form
		var notid = $(this).attr('rel');
		//Load data
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
				$("#loader").hide();
				$( "#noticiasform form" ).show();
				if(data.status == 'Ok'){
					$("#inp_fecha").val(data.fecha);
					$("#inp_titulo").val(data.titulo);
					$("#inp_resumen").val(data.resumen);
					$("#inp_texto").val(data.texto);
				}else{
					alert("error consultando datos".data.message);
				}
			}
		});
		$( "#noticiasform" ).dialog({
				title: "Modificar Noticia",
				buttons: {
					"Editar usuario": function() {
		        		if ( $("#frm_noticia").valid() ) {
							$.post("index.php", { 
								editnoticia: '1',
								inp_fecha: $("#inp_fecha").attr('value'),
								inp_titulo: $("#inp_titulo").attr('value'),
								inp_resumen: $("#inp_resumen").attr('value'),
								inp_texto: $("#inp_texto").attr('value'),
								inp_notid: notid },
						  		function( data ) {
						  			var content = $( data ).find( '#noticiaslist' );
						    		$("#noticiaslist").html( content );
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
		$( "#noticiasform" ).dialog( "open" );
	});

////////////////////////////////////////////////////////////	
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
					  	var content = $( data ).find( '#noticiaslist' );
					    $("#noticiaslist").html( content );
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
