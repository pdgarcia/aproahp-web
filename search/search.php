<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Web oficial de Aproahp</title>

<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link rel="icon" href="../favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8" />
</head>
<body>
<div id="container"><!-- inicio content -->
<?php require("../header.php");

define("DEFAULT_STRING", "Buscar..." );

if(isset($_GET["searchinput"]) and $_GET["searchinput"] != ""){
	$term = trim($_GET["searchinput"]);
	$searchinput = $term;
}else{
	$searchinput = DEFAULT_STRING;
}

?>
<div class='resalte'><h1>Busquedas</h1><br/><h3>Busqueda de terminos dentro de los documentos y las noticias</h3></div>
<div id="searchform">
<form method="get" action="search.php">
<fieldset><input id="searchinput" type="text" name="searchinput" value="<?php echo $searchinput ?>"
	onblur="if(this.value.length == 0) this.value='<?php echo $searchinput ?>';"
	onclick="if(this.value == '<?php echo $searchinput ?>') this.value='';" /> <input
	id="searchsubmit" type="submit" value="Search" /></fieldset>
</form>
</div></br>
<?php 
require_once("../lib/siteconfig.php");

// Comparison function
function cmp($a, $b) {
	return ($a["occurs"] > $b["occurs"]) ? -1 : 1;
}

$linknoticias="../noticias/noticias.php";
$linkdocumentos="../rinconagente/documentos.php";

if(!empty($term) and strcmp($term , DEFAULT_STRING)){
	//$term = trim($_GET["searchinput"]);

	$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND DATE(`NOT_FECHA`) <= DATE( NOW( ) ) ORDER BY NOT_FECHA DESC;");

	//loop through and return results
	for ($x = 0, $numrows = mysql_num_rows($not_result); $x < $numrows; $x++) {
	 $row = mysql_fetch_assoc($not_result);

	 if(($occurs=substr_count(strtolower($row["NOT_Titulo"]." ".$row["NOT_resumen"]." ".$row["NOT_texto"]), strtolower($term))) === 0) {
	  continue;
	 } else {
	 	$datetime = date("d/m/y g:i A", strtotime($row["NOT_FECHA"]));
	 	$resultados[] = array("ID" => $row["NOT_ID"], "occurs" => $occurs,"link"=>$linknoticias."?noticia=".$row["NOT_ID"],"source" => "Noticias", "Titulo" => $row["NOT_Titulo"],"Usuario" => $row["USR_Displayname"], "Fecha" => $datetime, "Resumen" => $row["NOT_resumen"]);
	 }
	}

	$doc_result=mysql_query("SELECT * FROM tbl_documentos,tbl_Categorias,tbl_Users WHERE DOC_Autor=USR_ID AND DOC_Categoria = CAT_ID AND DATE(`DOC_FECHA`) <= DATE( NOW( ) );");

	//loop through and return results
	for ($x = 0, $numrows = mysql_num_rows($doc_result); $x < $numrows; $x++) {
	 $row = mysql_fetch_assoc($doc_result);

	 if(($occurs=substr_count(strtolower($row["DOC_Titulo"]." ".$row["DOC_Resumen"]." ".$row["DOC_Texto"]), strtolower($term))) === 0) {
	  continue;
	 } else {
	 	$datetime = date("d/m/y g:i A", strtotime($row["DOC_Fecha"]));
	 	$resultados[] = array("ID" => $row["DOC_ID"], "occurs" => $occurs,"link"=>$linkdocumentos."?docid=".$row["DOC_ID"],"source" => "Documentos: ".$row["CAT_Nombre"], "Titulo" => $row["DOC_Titulo"],"Usuario" => $row["USR_Displayname"], "Fecha" => $datetime, "Resumen" => $row["DOC_Resumen"]);
	 }
	}

	if(!empty($resultados)){
		// Sort the array
		uasort($resultados, "cmp");

		//set GET response and convert data to JSON
		//$response = $_GET["jsoncallback"] . "(" . json_encode($urls) . ")";
		//delay response
		//sleep(1);
		//echo JSON to page
		//echo $response;

		echo "<ul>";
		foreach ($resultados as $item){
			//print_r($item);
			echo "<li class=noticia><a href=".$item["link"]." ><span class=highlight> ".$item["occurs"]." coincidencias en ".$item["Titulo"]."</span><br/>Escrito por: <span class=highlight>".$item["Usuario"]."</span> en ".$item["source"]." el <span class=highlight>".$item["Fecha"]."</span><br><div class=resumen>".$item["Resumen"]."</a></li>";
		}
		echo "</ul>";
	}else{
		echo("<h3>No hay coincidencias</h3>");
	}
}else{
	echo "<h3>Ingrese termino a Buscar</h3>";
}
?> <!-- fin content --></div>
<div style="clear: both;">&nbsp;</div>
<?php require("../footer.html")?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/script.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
