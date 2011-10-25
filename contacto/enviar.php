<?php
  header("Content-type: application/json");
  require("../lib/siteconfig.php");
  
  $cfg_result=mysql_query("SELECT * FROM tbl_users where usr_ID=".config_value("contacto_adminuser")."");
	if(mysql_num_rows($cfg_result)!=1) 
	{
	  $result=array("status" => "ERROR", "message" => "[ERROR]-Falta elemento de Configuración");
	}else{
		$row = mysql_fetch_assoc($cfg_result);
		$para   = $row["USR_email"];
		
    $nombre   = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $mail     = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $mensaje  = $_POST['mensaje'];

    $header  = 'From: ' . 'webmaster@aproahp.org' . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $body  = "Este mensaje fue enviado por " . $nombre . " " . $apellidos . " \r\n";
    $body .= "Enviado el " . date('d/m/Y', time()) . " \r\n";
    $body .= "Su e-mail es: " . $mail . " \r\n";
    $body .= "Su Telefono es: " . $telefono . " \r\n";
    $body .= "Mensaje: " . $mensaje . " \r\n";
  
    $asunto = 'Contacto desde webmaster';
    
    if(mail($para, $asunto, utf8_decode($body), $header)){
      $result=array("status" => "OK", "message" => "Mensaje Enviado");
    }else{
      $result=array("status" => "ERROR", "message" => "No se pudo enviar el mail");
    }
  }
  echo json_encode($result);
?>
