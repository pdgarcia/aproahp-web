<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link rel="icon" href="../favicon.ico" type="image/x-icon"/>

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8" />    
<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8" />
   
	<title>Web oficial de Aproahp</title>
</head>

<body onload="MM_preloadImages('images/rinconagente_over_03.gif','images/rinconagente_over_06.gif','images/rinconagente_over_08.gif','images/rinconagente_over_10.gif')">

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
			
			$page_rows = 3;
			$pdata=pagination($rows,$pagenum,$page_rows);
			echo ($pdata['links']);	

			echo("<ul>");
			$doc_result=mysql_query("SELECT * FROM tbl_documentos,tbl_Users WHERE DOC_Autor=USR_ID AND DATE(`DOC_FECHA`) <= DATE( NOW( ) ) AND DOC_Categoria = $categoria ORDER BY DOC_Fecha DESC ".$pdata['limites'].";");
			for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {  
				$row = mysql_fetch_assoc($doc_result);
				$datetime = date("d/m/y", strtotime($row["DOC_Fecha"])); 
				echo("<a href='documentos.php?docid=".$row['DOC_ID']."'><li class='noticia'>".$row['DOC_Titulo']." - Publicado por ".$row['USR_Displayname']." el ".$datetime.'<br>'.$row['DOC_Resumen']."</li></a>");
	    	}
			echo("</ul>");
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
				echo("<li>".$row['DOC_Titulo']." - Publicado por ".$row['USR_Displayname']." el ".$datetime." en ".$row['CAT_Nombre']."<br>".$row['DOC_Resumen']."<br>".$row['DOC_Texto']."<br><a href='".$uploadfolder."/".$row['DOC_Attach']."'><img src='../images/fticonos/icon_".$tipo.".gif'></li>");
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
        <a href="documentos.php?catid=4" title="modelos"     onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('modelos','','images/rinconagente_over_08.gif',1)"><img src="images/rinconagente_08.gif" width="223" height="105" border="0" id="modelos" /></a>
        <a href="documentos.php?catid=3" title="acuerdos"    onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('acuerdos','','images/rinconagente_over_10.gif',1)"><img src="images/rinconagente_10.gif" width="223" height="105" border="0" id="acuerdos" /></a>
		<a href="documentos.php?catid=5" title="actas"    onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('actas','','images/rinconagente_over_10.gif',1)"><img src="images/rinconagente_10.gif" width="223" height="105" border="0" id="actas" /></a>
	</div>	
</div>

<!-- fin content -->
</div>
<div style="clear: both;">&nbsp;</div>
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	function MM_swapImgRestore() { //v3.0
	  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	function MM_preloadImages() { //v3.0
	  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
	    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
	    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}
	
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
	    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_swapImage() { //v3.0
	  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}
</script>

</body>
</html>
