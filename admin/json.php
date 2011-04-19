<?php
header("Content-type: application/json");
require_once('classes/Membership.php');
$membership = New Membership();
$membership->confirm_Member();

require_once("../lib/siteconfig.php");
if ( isset($_POST['requestuserdata']) ){
	$id = cleanQuery($_POST['requestuserdata']);

	$usr_result=mysql_query("SELECT * FROM tbl_users WHERE USR_ID=".$id." ORDER BY USR_Displayname;");
	
	if(mysql_num_rows($usr_result)  == 1){
		$row = mysql_fetch_assoc($usr_result);
		//print_r($row);
		$arr = array("id" => $row["USR_ID"],"Username" => $row["USR_username"], "DisplayName" => $row["USR_Displayname"],"email" => $row["USR_email"], "Activo" =>$row["USR_Activo"]);
		$result=array("status" => "Ok", "message" => mysql_error());
		$result+=$arr;
	}
	else{
		$result=array("status" => "Error", "message" => mysql_error());		
	} 
	echo json_encode($result);
}