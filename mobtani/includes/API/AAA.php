<?php
class AAA{
	function __construct(){
		if( session_status() !== PHP_SESSION_ACTIVE )
			session_start();	
	}
	function login( $id ){
		//$_SESSION['authenticated'] = true;
		$_SESSION['uid'] = $id;
	}
	function logout(){
		unset( $_SESSION['uid'] );
	}
	function isAuthenticated(){
		return isset( $_SESSION['uid'] );
	}
}
?>