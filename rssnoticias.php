<?php
	header("Content-Type: application/rss+xml; charset=UTF-8");
	require_once("lib/siteconfig.php");
	
	$noticias_page = $base_url . "/noticias/noticias.php";
 
    $rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
    $rssfeed .= '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>Noticias de la Aproahp</title>';
    $rssfeed .= '<link>'.$noticias_page.'</link>';
    $rssfeed .= '<description>La Asociación Profesional de Agentes de la Hacienda Publica, es una Organización de ambito nacional regida por los principios de funcionamiento democratico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda Publica.</description>';
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<image><url>'.$base_url.'/images/logo.gif</url><title>Noticias de la Aproahp</title><link>'.$noticias_page.'</link></image>';
    $rssfeed .= '<copyright>Copyright (C) 2011 aproahp.com</copyright>';
 
    $query = "SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND DATE(`NOT_FECHA`) <= DATE( NOW( ) ) ORDER BY NOT_FECHA DESC LIMIT 0,15;";
    $result = mysql_query($query) or die ("Could not execute query");
 
    while($row = mysql_fetch_array($result)) {
        extract($row);
        $datetime = date("r", strtotime($NOT_FECHA));
 
        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $NOT_Titulo . '</title>';
        $rssfeed .= '<description>' .neat_trim($NOT_resumen,200). '</description>';
        $rssfeed .= '<link>' . $noticias_page."?noticia=".$NOT_ID . '</link>';
        $rssfeed .= '<pubDate>' .$datetime . '</pubDate>';
        $rssfeed .= '<dc:creator>' . $USR_Displayname . '</dc:creator>';
        $rssfeed .= '<guid isPermaLink="false">' .$noticias_page."?noticia=".$NOT_ID . '</guid>';
        $rssfeed .= '</item>';
        
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>