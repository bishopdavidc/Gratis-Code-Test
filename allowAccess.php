<?php
class allowAccess {
	function checkLogin() {
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		if ( session_id() == '' ) {
			session_start();
		}
		if ( !$_SESSION[ "user" ] ) {
			$_SESSION[ "user" ] = "";
			header( "Location: index.php" );
			exit();
		}
	}
}