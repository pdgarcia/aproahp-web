<?php
require_once 'classes/Membership.php';
$membership = New Membership();
$membership->confirm_Member();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
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

	if(isset($_REQUEST['agregarcategoria'])) {
		$Nombre=urldecode($_REQUEST['inp_nombre']);
		$Comentarios=urldecode($_REQUEST['inp_comentarios']);
		
		if(mysql_query("INSERT INTO tbl_categorias (CAT_Nombre,CAT_Comentarios) VALUES ('$Nombre','$Comentarios');")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Categoria agregada.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
	if(isset($_REQUEST['agregardocumento'])) {
		$Nombre=urldecode($_REQUEST['inp_nombre']);
		$Comentarios=urldecode($_REQUEST['inp_comentarios']);
		
		if(mysql_query("INSERT INTO tbl_categorias (CAT_Nombre,CAT_Comentarios) VALUES ('$Nombre','$Comentarios');")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Categoria agregada.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
	if((isset($_REQUEST['submitenlace'])) && ($_REQUEST['submitenlace']==='agregar')) {
		
		$Nombre=urldecode($_REQUEST['inp_nombre']);
		$Address=urldecode($_REQUEST['inp_Address']);
		$Descripcion=urldecode($_REQUEST['inp_Descripcion']);
		
		if(mysql_query("INSERT INTO tbl_enlaces (LINK_Nombre,LINK_Address,LINK_Descripcion) VALUES ('$Nombre','$Address','$Descripcion');")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Enlace agregado.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
	if(isset($_REQUEST['submitenlace']) && ($_REQUEST['submitenlace'] =='editar')) {

		$id=urldecode($_REQUEST['inp_id']);	
		$Nombre=urldecode($_REQUEST['inp_nombre']);
		$Address=urldecode($_REQUEST['inp_Address']);
		$Descripcion=urldecode($_REQUEST['inp_Descripcion']);
		
		if(mysql_query("UPDATE tbl_enlaces SET LINK_Nombre='$Nombre' ,LINK_Address='$Address' ,LINK_Descripcion='$Descripcion' WHERE LINK_ID='$id';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Enlace cambiado.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
	if(isset($_REQUEST['borrarenlace'])) {
	
		$ID=urldecode($_REQUEST['borrarenlace']);
		
		if(mysql_query("DELETE FROM tbl_enlaces WHERE LINK_ID='$ID';")){
			$result=array("status" => "Ok", "message" => mysql_error());
			echo "Enlace borrado.....";
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());		
			echo "Error: ".mysql_error();
		}
	}
?>
<div id="tabs">
	<ul>
		<li><a href="#categorias">Categorias</a></li>
		<li><a href="#documentos">Documentos</a></li>
	</ul>
<?php
	echo "<div id='categorias'>";
	echo "<h2>Categorias</h2><br><table>
			<thead><tr><th class=tabhead>Nombre</th><th class=tabhead>Comentario</th><th class=tabhead>&nbsp;</th></tr></thead>
			<tfoot><tr><form method='get' action=''><td><input type='text' name='inp_nombre'</td><td><input type='text' name='inp_comentarios'</td><td><input type='submit' value='Agregar' name='agregarcategoria'></td></form></tr></tfoot>
			<tbody>";
	$cat_result=mysql_query("SELECT * FROM tbl_categorias ORDER BY cat_nombre;");
	for ($x = 0, $numrows = mysql_num_rows($cat_result); $x < $numrows; $x++) {  
		$row = mysql_fetch_assoc($cat_result);  
		echo "<tr><td>". $row["CAT_Nombre"]."</td><td>".$row["CAT_Comentarios"]."</td><td>X</td>";  
    }  
			
	echo "</tbody></table>";
	echo "</div><!-- fin div categorias-->";
	echo "<div id='documentos'>";
	echo "<h2>Documentos</h2><br><table>
			<thead><tr><th class=tabhead>Titulo</th><th class=tabhead>Fecha</th><th class=tabhead>Categoria</th><th class=tabhead>Descripción</th><th class=tabhead>&nbsp;</th></tr></thead>
			<tfoot><tr><form method='get' action=''><td><input type='text' name='inp_nombre'></td><td><input type='text' name='inp_comentarios'></td><td><input type='submit' value='Agregar' name='agregardocumento'></td></form></tr></tfoot>
			<tbody>";
	$doc_result=mysql_query("SELECT * FROM tbl_documentos ORDER BY doc_titulo;");
	for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {  
		$row = mysql_fetch_assoc($doc_result);  
		echo "<tr><td>". $row["DOC_Titulo"]."</td><td>".$row["DOC_Fecha"]."</td><td>".$row["DOC_Categoria"]."</td><td>".$row["DOC_Description"]."</td><td>X</td>";  
    }  
			
	echo "</tbody></table>";
	echo "</div><!-- fin div Documentos-->";
?>

</div>
<!-- fin content -->
</div>
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/script.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
