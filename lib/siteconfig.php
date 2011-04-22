<?php
	$host = "localhost"; 
	$user = "root"; 
	$pass = ""; 
	$database = "aproahp";

	if(!$dbconnect = mysql_connect($host, $user, $pass)) {
	   echo "Connection failed to the host '$host'.";
	   exit;
	} // if
	if (!mysql_select_db($database,$dbconnect)) {
	   echo "Cannot connect to database '$database'";
	   exit;
	} // if
	
	date_default_timezone_set('Europe/Madrid');
	
	$base_url ="http://localhost/~pdgarcia/aproahp";
	
//-------------------------------------------------------------	


/**
 * cleanQuery function
 * @param $string text to be escaped
 * @return string escaped string
 * @author  
 */
	function cleanQuery($string)
	{
		if(get_magic_quotes_gpc())  // prevents duplicate backslashes
		{
			$string = stripslashes($string);
		}
		if (phpversion() >= '4.3.0')
		{
			$string = mysql_real_escape_string($string);
		}
		else
		{
			$string = mysql_escape_string($string);
		}
		return $string;
	}
	
	function neat_trim($str, $n, $delim='...') {
	   $len = strlen($str);
	   if ($len > $n) {
	       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
	       return rtrim($matches[1]) . $delim;
	   }
	   else {
	       return $str;
	   }
	}
	function prep_url($str = '')
	{
		if ($str == 'http://' OR $str == '')
		{
			return '';
		}

		$url = parse_url($str);

		if ( ! $url OR ! isset($url['scheme']))
		{
			$str = 'http://'.$str;
		}

		return $str;
	}
	
	function config_value($key){
		$cfg_result=mysql_query("SELECT * FROM tbl_config where cfg_key='".trim($key)."'");
		if(mysql_num_rows($cfg_result)!=1)
		{
			echo "[ERROR]-Falta elemento de Configuración";
		}else{
			$row = mysql_fetch_assoc($cfg_result);
			return $row["CFG_value"];
		}
	}
	function setconfig_value($key,$value){
		if(is_array($value)){$value=trim($value);}
		if(mysql_query("UPDATE tbl_config SET CFG_value='".$value."' WHERE cfg_key='".trim($key)."';")){
			return 1;			
		}else{
			echo "[ERROR]-grabando elemento de Configuración";
		}
	}
	
	
	function paginationlinks($rows,$pagenum,$page_rows){ /* $rows=cantidad de elementos, $pagenum=pagina actual, $page_rows=cantidad de elementos por pagina */
		
		$last = ceil($rows/$page_rows);
		$linkbase = $_SERVER['PHP_SELF'];
		$_pagi_query_string = "?";
			
		if (isset($_GET['pagenum'])) unset($_GET['pagenum']); // Eliminamos esa variable del $_GET
		$_pagi_propagar = array_keys($_GET);
		foreach($_pagi_propagar as $var){
		 	if(isset($GLOBALS[$var])){
				// Si la variable es global al script
				$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
			}elseif(isset($_REQUEST[$var])){
				// Si no es global (o register globals est· en OFF)
				$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
			}
		 }
		$linkbase .= $_pagi_query_string;

		if ($pagenum < 1)
			{ $pagenum = 1; }
		elseif ($pagenum > $last)
			{ $pagenum = $last; }
		
		if($last > 1){
			echo "<div id=pagination>";
			if ($pagenum == 1) {} 
			else
			{
				echo " <a href='".$linkbase."pagenum=1'> << Primero</a> ";
				echo " ";
				$previous = $pagenum-1;
				echo " <a href='".$linkbase."pagenum=$previous'> < Anterior</a> ";
			} 
			
			for($x=1;$x<=$last;$x++){
				if($x==$pagenum){
					echo "&nbsp;<strong>$x</strong>";
				}else{
					echo "&nbsp;<a href='".$linkbase."pagenum=$x'>$x</a>";	
				}
			}
			
			echo "&nbsp;";
			
			if ($pagenum == $last) {} 
			else 
			{
				$next = $pagenum+1;
				echo " <a href='".$linkbase."pagenum=$next'>Siguiente ></a> ";
				echo " ";
				echo " <a href='".$linkbase."pagenum=$last'>Último >></a> ";
			} 
			echo "</div>";
		}
	}
	
?>