<?php
require_once("lib/siteconfig.php");
$noticias_page="noticias/noticias.php";
$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND DATE(`NOT_FECHA`) <= DATE( NOW( ) ) ORDER BY NOT_FECHA DESC LIMIT 0,5;");
for ($x = 0, $numrows = mysql_num_rows($not_result); $x < $numrows && $x < $numrows ; $x++) {  
	$row = mysql_fetch_assoc($not_result);
	 
	$datetime = date("d M", strtotime($row["NOT_FECHA"]));
	echo "<li><a href=".$noticias_page."?noticia=".$row["NOT_ID"]." >";
	echo "<div class=noticiafecha>".$datetime."</div>";
	echo "<div class=noticiatitulo>".$row["NOT_Titulo"]."</div>";
	echo "<div class=noticiaresumen>".neat_trim($row["NOT_resumen"],100)."</div>";
	echo "</a></li>";
}

?>