<?php
	header("Content-type: application/json");
	require_once('classes/Membership.php');
	$membership = New Membership();
	$membership->confirm_Member();
	
	require_once("../lib/siteconfig.php");
	
	if ( isset($_POST['requestuserdata']) ){
		$id = cleanQuery($_POST['requestuserdata']);
	
		$usr_result=mysql_query("SELECT * FROM tbl_users WHERE USR_ID=".$id.";");
		
		if(mysql_num_rows($usr_result)  == 1){
			$row = mysql_fetch_assoc($usr_result);
			$arr = array("id" => $row["USR_ID"],"Username" => $row["USR_username"], "DisplayName" => $row["USR_Displayname"],"email" => $row["USR_email"], "Activo" =>$row["USR_Activo"]);
			$result=array("status" => "Ok", "message" => mysql_error());
			$result+=$arr;
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());
		}
		echo json_encode($result);
	}
	
	if ( isset($_POST['requestnoticiadata']) ){
		$id = cleanQuery($_POST['requestnoticiadata']);
	
		$not_result=mysql_query("SELECT * FROM tbl_noticias,tbl_users WHERE NOT_Autor=USR_ID AND NOT_ID=".$id.";");
		
		if(mysql_num_rows($not_result)  == 1){
			$row = mysql_fetch_assoc($not_result);
			//print_r($row);
			$datetime = date("d/m/y", strtotime($row["NOT_FECHA"]));
			$arr = array("id" => $row["NOT_ID"],"fecha" => $datetime, "titulo" => $row["NOT_Titulo"],"resumen" => $row["NOT_resumen"], "texto" =>$row["NOT_texto"]);
			$result=array("status" => "Ok", "message" => mysql_error());
			$result+=$arr;
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());
		}
		echo json_encode($result);
	}
	
	if ( isset($_POST['requestdocdata']) ){
		$id = cleanQuery($_POST['requestdocdata']);
	
		$doc_result=mysql_query("SELECT * FROM tbl_Documentos,tbl_users WHERE DOC_Autor=USR_ID AND DOC_ID=".$id.";");
		
		if(mysql_num_rows($doc_result)  == 1){
			$row = mysql_fetch_assoc($doc_result);
			//print_r($row);
			$datetime = date("d/m/y", strtotime($row["DOC_Fecha"]));
			$arr = array("id" => $row["DOC_ID"],"fecha" => $datetime, "titulo" => $row["DOC_Titulo"],"resumen" => $row["DOC_Resumen"], "texto" =>$row["DOC_Texto"]);
			$result=array("status" => "Ok", "message" => mysql_error());
			$result+=$arr;
		}
		else{
			$result=array("status" => "Error", "message" => mysql_error());
		}
		echo json_encode($result);
	}
?>