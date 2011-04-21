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
<?php require("header.php");?>
<!-- inicio content -->
<?php
	require_once("../lib/siteconfig.php");
	$filesizemax=10000000;
	$uploadfolder="../UPLDocumentos";
	//print_r($_POST);
	if(isset($_POST['submitdoc'])) {
		$fecha=cleanQuery($_POST['inp_fecha']);
		$Categoria=cleanQuery($_POST['inp_categoria']);
		$Titulo=cleanQuery($_POST['inp_titulo']);
		$resumen=cleanQuery($_POST['inp_resumen']);
		$texto=cleanQuery($_POST['inp_texto']);
		$userid=$_SESSION['UserID'];
		
		list($day,$month,$year)=explode("/",$fecha);
		$fecha = $year."-".$month."-".$day;
		
		$nombre_archivo = $_FILES['userfile']['name'];
		$tipo_archivo = $_FILES['userfile']['type'];
		$tamano_archivo = $_FILES['userfile']['size'];
		//print_r($_FILES);
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc")) && ($tamano_archivo < $filesizemax))) {
		    echo "La extensión o el tamaño de los archivos no es correcta.";
		}else{
			$nuevonombre_archivo= time()."_".$nombre_archivo;
		    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $uploadfolder."/".$nuevonombre_archivo)){
				$sqlstring="INSERT INTO tbl_Documentos (DOC_Fecha,DOC_Autor,DOC_Categoria,DOC_Titulo,DOC_Resumen,DOC_Texto,DOC_Attach) VALUES ('$fecha','$userid','$Categoria','$Titulo','$resumen','$texto','$nuevonombre_archivo');";
				
				if(mysql_query($sqlstring)){
					$result=array("status" => "Ok", "message" => mysql_error());
					echo "Documento agregado.....";
				}
				else{
					$result=array("status" => "Error", "message" => mysql_error());		
					echo "Error: ".mysql_error();
				}
		    }else{
		       echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
		    }
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
	if(isset($_POST['borrardocumento'])) {
	
		$ID=cleanQuery($_POST['borrardocumento']);
		
		if(mysql_query("DELETE FROM tbl_documentos WHERE DOC_ID='$ID';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "noticia borrada.....";
			//unlink();
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
?>
<div id='noticias'>
	<h2>Documentos</h2><br/>
	<div id='noticiasform'>
		<form id='frm_enlace' method='post' action='<?=$paginaactual?>' enctype='multipart/form-data'>
		<label for="inp_fecha">Fecha:</label><input type='text' name='inp_fecha' id='inp_fecha'><img src="images/b_calendar.png" alt="Calendario" width="16" height="16" /><br/>
		<label for="inp_titulo">Titulo:</label><input type='text' name='inp_titulo' id='inp_titulo'><br/>
		<input type="hidden" name="MAX_FILE_SIZE" value="<?=$filesizemax?>">
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
		<label for="inp_resumen">Resumen:</label><textarea cols="80" rows="5" name='inp_resumen' id='inp_resumen'></textarea><br/>
		<label for="inp_texto">Texto:</label><textarea cols="80" rows="20" name='inp_texto' id='inp_texto'></textarea><br/>
		<input type="hidden" name="inp_id" id="inp_id" value="">
		<input name="userfile" type="file"><br/>
		<input type='submit' value='Agregar' name='submitdoc' id='submitdoc'><input type="reset" value="Cancelar">
		</form>
	</div>

<?php
		echo "<ul>";
		$doc_result=mysql_query("SELECT * FROM tbl_Categorias,tbl_documentos,tbl_Users WHERE DOC_Autor=USR_ID AND DOC_Categoria = CAT_ID ORDER BY DOC_FECHA DESC;");
		for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($doc_result);
			$datetime = date("d/m/y g:i A", strtotime($row["DOC_Fecha"]));
			$parts = Explode('.', $row['DOC_Attach']);
			$tipo= $parts[count($parts) - 1];
			echo("<li class=documento><div class=edit rel='".$row["DOC_ID"]."'>Editar</div><div class=borrar rel='".$row["DOC_ID"]."'>Borrar</div> Publicado por ".$row['USR_Displayname']." el ".$row['DOC_Fecha']." en ".$row['CAT_Nombre']."<br>".$row['DOC_Titulo'].'<br>'.$row['DOC_Resumen']."<br><a href='".$uploadfolder."/".$row['DOC_Attach']."'><img src='../images/fticonos/icon_".$tipo.".gif'></a></li>");
	   	}
		echo "</ul>";
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
	$('#inp_fecha').datepicker();
	
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
					$.post("documentos.php", { borrardocumento: botonborrar.attr('rel') },
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
		$.post("noticias.php", { editarnoticia: $(this).attr('rel') },
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
