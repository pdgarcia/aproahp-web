<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">    
<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8">

	<title>Web oficial de Aproahp</title>
</head>

<body onload="MM_preloadImages('images/rinconagente_over_03.gif','images/rinconagente_over_06.gif','images/rinconagente_over_08.gif','images/rinconagente_over_10.gif','images/actas.gif','images/actas_over.gif')">

<div id="container"><!-- inicio content -->
	<?php require("../header.php");
		$uploadfolder="../UPLDocumentos";
		require_once("../lib/siteconfig.php");

		if(isset($_GET['catid'])){
			echo "<div id='izda-a'>";
			$categoria=cleanQuery($_GET['catid']);

			$cat_result=mysql_query("SELECT * FROM tbl_categorias WHERE CAT_ID = '$categoria';");

			if(mysql_num_rows($cat_result) != 1){
				echo "<h1>No existe esa categoria</h1>";
			}else{
				$row = mysql_fetch_assoc($cat_result);
				echo "<div class='resalte'><h1>$row[CAT_Nombre]</h1><br/><h3>$row[CAT_Comentarios]</h3></div>";

				if(!isset($_GET['pagenum'])){
					$pagenum = 1;
				}else{
					$pagenum = $_GET['pagenum'];
				}
				$doc_result = mysql_query("SELECT * FROM tbl_documentos,tbl_Users WHERE DOC_Autor=USR_ID AND DATE(`DOC_FECHA`) <= DATE( NOW( ) ) AND DOC_Categoria = $categoria;") or die(mysql_error()); 
				$rows = mysql_num_rows($doc_result);
				mysql_free_result($doc_result);

				$page_rows = 5;
				$pdata=pagination($rows,$pagenum,$page_rows);
				echo ($pdata['links']);	

				echo("<div id='documentoslist'><ul>");
				$doc_result=mysql_query("SELECT * FROM tbl_documentos,tbl_Users WHERE DOC_Autor=USR_ID AND DATE(`DOC_FECHA`) <= DATE( NOW( ) ) AND DOC_Categoria = $categoria ORDER BY DOC_Fecha DESC ".$pdata['limites'].";");
				for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {  
					$row = mysql_fetch_assoc($doc_result);
					$datetime = date("d/m/y", strtotime($row["DOC_Fecha"])); 
					echo("<a href='documentos.php?docid=".$row['DOC_ID']."'><li class='documento'><span class=highlight>".$row['DOC_Titulo']."</span> - publicado por <span class=highlight>".$row['USR_Displayname']."</span> el <span class=highlight>".$datetime.'</span><br>'.$row['DOC_Resumen']."</li></a>");
				}
				echo("</ul></div>");
				mysql_free_result($doc_result);
			}
			echo "</div><div id='dcha-a'><div class='box-yellow'><h2 class='section'><b>Documentos</b></h2>";
		}elseif(isset($_GET['docid'])){
			echo "<div id='izda-a'>";
			$documento=cleanQuery($_GET['docid']);
			$doc_result=mysql_query("SELECT * FROM tbl_documentos,tbl_Categorias,tbl_Users WHERE DOC_Autor=USR_ID AND DOC_Categoria = CAT_ID AND DOC_id = $documento;");
			if(mysql_num_rows($doc_result) < 1){
				echo "<h1>No existe ese Documento</h1>";
			}else{
				for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {
					$row = mysql_fetch_assoc($doc_result);  
					$parts = Explode('.', $row['DOC_Attach']);
					$tipo= $parts[count($parts) - 1];
					$datetime = date("d/m/y", strtotime($row["DOC_Fecha"]));
					echo("<li class='documento'><span class=highlight>".$row['DOC_Titulo']."</span> - publicado por <span class=highlight>".$row['USR_Displayname']."</span> el <span class=highlight>".$datetime."</span> en <span class=highlight>".$row['CAT_Nombre']."</span><br><div class=resumen>".$row['DOC_Resumen']."</div><br>".$row['DOC_Texto']."<br><a href='".$uploadfolder."/".$row['DOC_Attach']."'><img src='../images/fticonos/icon_".$tipo.".gif'></li>");
				}
				mysql_free_result($doc_result);
			}
			echo "</div><div id='dcha-a'><div class='box-yellow'><h2 class='section'><b>Documentos</b></h2>";
		}else{
			echo "<div style='width: 500px; margin: auto;'><div>";	
		}
	?>

		<a href="documentos.php?catid=1" title="comunicados" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('comunicados','','images/rinconagente_over_03.gif',1)"><img src="images/rinconagente_03.gif" width="223" height="105" border="0" id="comunicados" /></a>
		<a href="documentos.php?catid=2" title="docs_usoint" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('docs_uso','','images/rinconagente_over_06.gif',1)"><img src="images/rinconagente_06.gif" width="223" height="105" border="0" id="docs_uso" /></a>
		<a href="documentos.php?catid=4" title="modelos" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('modelos','','images/rinconagente_over_08.gif',1)"><img src="images/rinconagente_08.gif" width="223" height="105" border="0" id="modelos" /></a>
		<a href="documentos.php?catid=3" title="acuerdos" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('acuerdos','','images/rinconagente_over_10.gif',1)"><img src="images/rinconagente_10.gif" width="223" height="105" border="0" id="acuerdos" /></a>
		<a href="documentos.php?catid=5" title="actas" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('actas','','images/actas_over.gif',1)"><img src="images/actas.gif" width="223" height="105" border="0" id="actas" /></a>

</div>

<!-- fin content -->
</div>
<div style="clear: both;">&nbsp;</div>
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>