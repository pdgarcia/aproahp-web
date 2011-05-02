<?php
	require_once 'classes/Membership.php';
	$membership = New Membership();
	$membership->confirm_Member();

	require_once("../lib/siteconfig.php");
	$filesizemax=10000000;
	$uploadfolder="../UPLDocumentos";

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
				$inp_fecha = $year."-".$month."-".$day;

				$nombre_archivo = $_FILES['inp_file']['name'];
				$tipo_archivo   = $_FILES['inp_file']['type'];
				$tamano_archivo = $_FILES['inp_file']['size'];
				$tmpn_archivo   = $_FILES['inp_file']['tmp_name'];

				if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc") || strpos($tipo_archivo, "jpg")) && ($tamano_archivo < $filesizemax))) {
				    $Mensaje="La extensión o el tamaño de los archivos no es correcta.";
				}else{
					$nuevonombre_archivo= time()."_".$nombre_archivo;
					if (move_uploaded_file($tmpn_archivo, $uploadfolder."/".$nuevonombre_archivo)){
						$sqlstring="INSERT INTO tbl_Documentos (DOC_Fecha,DOC_Autor,DOC_Categoria,DOC_Titulo,DOC_Resumen,DOC_Texto,DOC_Attach) VALUES ('$inp_fecha','$userid','$inp_categoria','$inp_titulo','$inp_resumen','$inp_texto','$nuevonombre_archivo');";
						
						if(mysql_query($sqlstring)){
							$Mensaje="Documento agregado.....";
						}
						else{
							$Mensaje="Error: ".mysql_error();
						}
					}else{
						$Mensaje="Ocurrió algún error al subir el fichero. No pudo guardarse.";
					}
				} 
				break;
			case edit:
				$userid=$_SESSION['UserID'];
				list($day,$month,$year)=explode("/",$inp_fecha);
				$inp_fecha = $year."-".$month."-".$day;
				
				$nombre_archivo = $_FILES['inp_file']['name'];
				$tipo_archivo   = $_FILES['inp_file']['type'];
				$tamano_archivo = $_FILES['inp_file']['size'];
				
				if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc") || strpos($tipo_archivo, "jpg")) && ($tamano_archivo < $filesizemax))) {
				    $Mensaje="La extensión o el tamaño de los archivos no es correcta.";
				}
				if(mysql_query("UPDATE tbl_Documentos SET DOC_Fecha='$inp_fecha' ,DOC_Autor='$userid' ,DOC_Titulo='$inp_titulo',DOC_Resumen='$inp_resumen',DOC_Texto='$inp_texto' WHERE DOC_ID='$inp_docid';")){
					$Mensaje= "Documento modificado....." . mysql_error();
				}
				else{
					$Mensaje= "Error: ".mysql_error();
				}
				break;
			case del:
				if(mysql_query("DELETE FROM tbl_documentos WHERE DOC_ID='$inp_docid';")){
					$Mensaje="Documento borrado.....";
					//unlink();
				}
				else{
					$Mensaje="Error: ".mysql_error();
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
<?php require("header.php");?>
<!-- inicio content -->
<div id='documentos'>
	<h3>Documentos</h3><br/>
	<div id="adddocumento">Agregar Documento</div>
	<div id="docsform">
		<div id="loader" style="display:none"><img style="margin: 50px auto;position: relative;display: block;" src="../images/ajax-loader.gif" alt="Esperando Datos"></div>
		<form id="frm_documentos" method="post" action="<?=$paginaactual?>" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?=$filesizemax?>">
			<label for="inp_fecha">Fecha:<img src="images/b_calendar.png" alt="Calendario" width="16" height="16" /></label><input type='text' name='inp_fecha' maxlength='10' id='inp_fecha'><br/>
			<label for="inp_titulo">Titulo:</label><input type='text' name='inp_titulo' maxlength='50' id='inp_titulo'><br/>
<?php
			echo "<select name='inp_categoria'>";
			$cat_result=mysql_query("SELECT * FROM tbl_Categorias ORDER BY Cat_Nombre;");
			for ($x = 0, $numrows = mysql_num_rows($cat_result); $x < $numrows; $x++) {
				$row = mysql_fetch_assoc($cat_result);
				echo "<option value=".$row["CAT_ID"].">".$row["CAT_Nombre"]."</option>";
			}
			echo "</select>";
			mysql_free_result($cat_result);
?>
			<label for="inp_resumen">Resumen:</label><textarea cols="80" rows="5" name='inp_resumen' maxlength='255' id='inp_resumen'></textarea><br/>
			<label for="inp_texto">Texto:</label><textarea cols="80" rows="20" name='inp_texto' maxlength='5000' id='inp_texto'></textarea><br/>
			<input name="inp_file" type="file"><br/>
			<input type="hidden" name="inp_docid" id="inp_docid" value="">
			<input type="hidden" name="funcion" id="funcion" value="">
		</form>
	</div>

<?php
		echo "<div id='documentoslist'>";
		if(isset($_GET['pagenum'])){
			$pagenum = $_GET['pagenum']; 
		}else{
			$pagenum = 1;
		}

		$doc_result = mysql_query("SELECT * FROM tbl_Categorias,tbl_documentos,tbl_Users WHERE DOC_Autor=USR_ID AND DOC_Categoria = CAT_ID ORDER BY DOC_FECHA DESC;") or die(mysql_error());
		$rows = mysql_num_rows($doc_result);

		$page_rows = 3;

		$pdata=pagination($rows,$pagenum,$page_rows);
		echo ($pdata['links']);

		echo "</ul>";
		$doc_result=mysql_query("SELECT * FROM tbl_Categorias,tbl_documentos,tbl_Users WHERE DOC_Autor=USR_ID AND DOC_Categoria = CAT_ID ORDER BY DOC_FECHA DESC ".$pdata['limites'].";");
		for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($doc_result);
			$datetime = date("d/m/y", strtotime($row["DOC_Fecha"]));
			$parts = Explode('.', $row['DOC_Attach']);
			$tipo= $parts[count($parts) - 1];
			echo("<li class=documento><div class=edit rel='".$row["DOC_ID"]."'>Editar</div><div class=borrar rel='".$row["DOC_ID"]."'>Borrar</div><span class=highlight>".$row['DOC_Titulo']."</span><br>Publicado por <span class=highlight>".$row['USR_Displayname']."</span> el <span class=highlight>".$datetime."</span> en <span class=highlight>".$row['CAT_Nombre']."</span><br>".$row['DOC_Resumen']."<br><a href='".$uploadfolder."/".$row['DOC_Attach']."'><img src='../images/fticonos/icon_".$tipo.".gif'></a></li>");
		}
		echo "</ul></div>";
		mysql_free_result($doc_result);	

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

	var frm_documentos = $("#frm_documentos").validate({
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
			},
			inp_file: {
				required: true,
				maxlength: 5000,
				accept: "pdf|doc|jp?g",
				message: "solo se aceptan ficheros (pdf|doc|jpg)"
			}
		},
	});

	$( "#docsform" ).dialog({
		autoOpen: false,
		height: 650,
		width: 750,
		modal: true,
		beforeClose: function(event, ui) {
			frm_documentos.resetForm();
			$('form :input').val('')
		},
		close: function() {
		}
	});

	$('#adddocumento').button().click(function() {
		$( "#docsform" ).dialog({
				title: "Agregar Nuevo Documento",
				buttons: {
					"Agregar Documento": function() {
						$('#funcion').val('add');
						if ( $("#frm_documentos").valid() ) {
							$("#frm_documentos").submit();
							$( this ).dialog( "close" );
						}
					},
					"Cancelar": function() {
						$( this ).dialog( "close" );
					}
				}
		}).dialog( "open" );
	});

	$('.edit').live('click',function(){
		var docid = $(this).attr('rel');
		$.ajax({
			url: 'json.php',
			type: 'POST',
			dataType: 'json',
			data:({requestdocdata : docid}),
			beforeSend:function(){
				$( "#docsform form" ).hide();
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
				$( "#docsform form" ).show();
			}
		});
		$( "#docsform" ).dialog({
				title: "Modificar Documento",
				buttons: {
					"Editar Documento": function() {
						$('#funcion').val('edit');
						$('#inp_docid').val(docid);
						if ( $("#frm_documentos").valid() ) {
							$("#frm_documentos").submit();
							$( this ).dialog( "close" );
						}
					},
					"Cancelar": function() {
						$( this ).dialog( "close" );
					}
				}
		 }).dialog( "open" );
	});

	$('.borrar').live('click',function(){
		var botonborrar= $(this);
		var $dialog = $('<div></div>')
			.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>El documento sera borrada, ¿esta usted seguro?</p>')
			.dialog({
			resizable: false,
			height:150,
			modal: true,
			title:'¿Borrar?',
			buttons: {
				"Borrar": function() {
					$.post("documentos.php", { funcion: 'del',inp_docid: botonborrar.attr('rel') },
						function( data ) {
							$("#documentoslist").html( $( data ).find( '#documentoslist' ).html() );
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
