<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
    
	<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8">
  
	<title>Web oficial de Aproahp</title>
</head>

<body>
	
<div id="container"><!-- inicio content -->

<?php require("../header.php");?>

	<div id="dcha-a">
		<div class="resalte">
	
		</div>
	</div>
	<div id="izda-a">
	<?php
		require_once("../lib/siteconfig.php");
		
		if(isset($_GET['noticia'])) {
		$noticia=cleanQuery($_GET['noticia']);

		$sqlstring="SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND NOT_ID=".$noticia.";";

		$not_result=mysql_query($sqlstring);
		
		if(mysql_num_rows($not_result)!=1){
			echo "No existe esa Noticia.....";
		}
		else{
			$row = mysql_fetch_assoc($not_result);
			$datetime = date("d/m/y", strtotime($row["NOT_FECHA"]));

			echo "<li class=noticia><span class=highlight>".$row["NOT_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["USR_Displayname"]."</span> el <span class=highlight>".$datetime."</span><br><div class=resumen>".nl2br($row["NOT_resumen"])."</div><br>".nl2br($row["NOT_texto"])."</li>";
		}
		}else{
		
		if(isset($_GET['pagenum'])){
			$pagenum = $_GET['pagenum']; 
		}else{
			$pagenum = 1;
		}
			
		//$not_result = mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID ORDER BY NOT_FECHA DESC") or die(mysql_error());
		$not_result = mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND DATE(`NOT_FECHA`) <= DATE( NOW( ) ) ORDER BY `NOT_FECHA` DESC") or die(mysql_error());
		$rows = mysql_num_rows($not_result);
		
		$page_rows = 3;
		
		$last = ceil($rows/$page_rows); 
		
		if ($pagenum < 1)
			{ $pagenum = 1; }
		elseif ($pagenum > $last)
			{ $pagenum = $last; }
			
		paginationlinks($rows,$pagenum,$page_rows);	
		
		echo "<ul>";
		
		$limites = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;
		//$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID ORDER BY NOT_FECHA DESC $limites;");
		$not_result = mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND DATE(`NOT_FECHA`) <= DATE( NOW( ) ) ORDER BY `NOT_FECHA` DESC $limites;") or die(mysql_error());
		for ($x = 0, $numrows = mysql_num_rows($not_result); $x < $numrows; $x++) {  
			$row = mysql_fetch_assoc($not_result);
			$datetime = date("d/m/y g:i A", strtotime($row["NOT_FECHA"]));

			echo "<a href=".$paginaactual."?noticia=".$row["NOT_ID"]." ><li class=noticia><span class=highlight>".$row["NOT_Titulo"]."</span><br>Escrito por: <span class=highlight>".$row["USR_Displayname"]."</span> el <span class=highlight>".$datetime."</span><br><div class=resumen>".nl2br($row["NOT_resumen"])."</div><br>".neat_trim($row["NOT_texto"],400)."</li></a>";
	    }  

		echo "</ul>";
		}
?>

	</div>
	
<div style="clear: both;">&nbsp;</div>
</div><!-- fin content -->

<?php require("../footer.html");?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/script.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
