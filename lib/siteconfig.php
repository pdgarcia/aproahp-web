<?php
$profile='dev';

switch($profile){
  case 'prod':
  	$base_url ="http://www.aproahp.org";
  	$dbhost = "lldf923.servidoresdns.net"; 
  	$user = "qiq132"; 
  	$pass = "NQfFNd8a8m"; 
  	$database = "qiq132";
  	break;
	case 'dev':
    $base_url	= "http://localhost/~pdgarcia/aproahp";
    $dbhost		= "localhost"; 
    $user		  = "root"; 
    $pass		  = "root"; 
    $database	= "aproahp";
    break;
}
	date_default_timezone_set('Europe/Madrid');
	
	$captchaPublicK = "6LebM8kSAAAAAC1u-6O6N0miArWrRwHtadH0Vv7S";
	$captchaPrivateK = "6LebM8kSAAAAAN6M5MmojlfjfNAlTttpKEeSVMnp";

//--------------------------------------------------------------------------
	if(!$dbconnect = mysql_connect($dbhost, $user, $pass)) {
		echo "Connection failed to the host " . $dbhost ;
		exit;
	} // if
	if (!mysql_select_db($database,$dbconnect)) {
		echo "Cannot connect to database ". $database ;
		exit;
	} // if

/**
* cleanQuery function
* @param $string text to be escaped
* @return string escaped string
* @author  
*/
	function cleanQuery($string) {
		if(get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}
		if (phpversion() >= '4.3.0') {
			$string = mysql_real_escape_string($string);
		}
		else {
			$string = mysql_escape_string($string);
		}
		return $string;
	}

/**
* neat_trim function
* Trim text to the previous word to the required caracters
* @param $str text to be trimed
* @param $n number of caracteres to trim
* @param $delim end string to set if the string is longer that the number of caracteres to trim 
* @return trimed string
* @author  
*/
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

	function prep_url($str = '') {
		if ($str == 'http://' OR $str == '') {
			return '';
		}
		$url = parse_url($str);
		if ( ! $url OR ! isset($url['scheme'])) {
			$str = 'http://'.$str;
		}
		return $str;
	}
	
	function config_value($key){
		$cfg_result=mysql_query("SELECT * FROM tbl_config where cfg_key='".trim($key)."'");
		if(mysql_num_rows($cfg_result)!=1)
		{
			#echo "[ERROR]-Falta elemento de Configuración";
			return 0;
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

/**
 * paginationlinks($rows,$pagenum,$page_rows)
 * barra de paginación
 * @param $rows=cantidad de elementos
 * @param $pagenum=pagina actual
 * @param $page_rows=cantidad de elementos por pagina
 * 
 * @return string
 * 
 */
	function pagination($rows,$pagenum,$page_rows){

		$last = ceil($rows/$page_rows);
		$linkbase = $_SERVER['PHP_SELF'];
		$_pagi_query_string = "?";
		$plinks='';
		$limites='';

		if($rows > $page_rows){	
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
				$plinks.="<div id=pagination>";
				if ($pagenum == 1) {} 
				else{
					$plinks.=" <a href='".$linkbase."pagenum=1'> <<</a> ";
					$plinks.=" ";
					$previous = $pagenum-1;
					$plinks.=" <a href='".$linkbase."pagenum=$previous'> <</a> ";
				}
				$showpages=2;
				$pagemin=(($pagenum - $showpages)<1)?1:($pagenum - $showpages);
				$pagemax=(($pagenum + $showpages)>$last)?$last:($pagenum + $showpages);
				if($pagemin>1){$plinks.="&nbsp;<a href='".$linkbase."pagenum=".($pagemin - 1)."'>..</a>";}

				for($x=$pagemin;$x<=$pagemax;$x++){
					if($x==$pagenum){
						$plinks.="&nbsp;<strong>$x</strong>";
					}else{
						$plinks.="&nbsp;<a href='".$linkbase."pagenum=$x'>$x</a>";	
					}
				}
				if($pagemax<$last){$plinks.="&nbsp;<a href='".$linkbase."pagenum=".($pagemax + 1)."'>..</a>";}
				$plinks.="&nbsp;";

				if ($pagenum == $last) {} 
				else{
					$next = $pagenum+1;
					$plinks.=" <a href='".$linkbase."pagenum=$next'> ></a> ";
					$plinks.=" ";
					$plinks.=" <a href='".$linkbase."pagenum=$last'> >></a> ";
				}
				$plinks.="</div>";
			}
			$limites = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;
		}
		return(array ( "links" => $plinks,"limites" => "$limites"));
	}
?>