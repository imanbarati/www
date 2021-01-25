<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;
	
if( isset( $_GET['email'] ) ){
	$user = new User( new DB() );
	$where = "email = '{$_GET['email']}'";
	$table = $user -> find( $where ); // پیدا کردن کاربر با این مشخصات
	
	if( count( $table ) === 0 ){ // اگر چنین کاربری نبود
		echo 'no';
	}
	else
		echo 'yes';	
}
?>