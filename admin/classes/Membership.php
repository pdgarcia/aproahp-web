<?php

require_once '../lib/siteconfig.php';

class Membership {
	
	function validate_user($un, $pwd) {
		//$mysql = New Mysql();
		//$ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));
		$pwd=md5($pwd);
		$query = "SELECT *
				FROM tbl_users
				WHERE USR_username = '$un' AND USR_password = '$pwd' AND USR_Activo = 1
				LIMIT 1;";

		//print_r($query);
		$result=mysql_query($query);
		
		if(mysql_num_rows($result)) {
			$row = mysql_fetch_assoc($result);
			$_SESSION['status'] = 'authorized';
			$_SESSION['UserID'] = $row['USR_ID'];
			$_SESSION['UserName'] = $row['USR_username'];
			$_SESSION['DisplayName'] = $row['USR_Displayname'];
			$_SESSION['Email'] = $row['USR_email'];
			header("location: index.php");
		} else return "El Usuario o la Password no son validos";
		
	} 
	
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
	}
	
	function confirm_Member() {
		session_start();
		if($_SESSION['status'] !='authorized') header("location: login.php");
	}
	
}