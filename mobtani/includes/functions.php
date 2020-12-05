<?php
include 'API/DB/DB.php';
include 'API/Alert.php';
include 'API/AAA.php';

function get_header( $name = '' ){
	if( ! empty($name) )
		$name = '-' . $name; // -main
	include "templates/header{$name}.php";
}
function get_footer( $name = '' ){
	if( ! empty($name) )
		$name = '-' . $name; // -main
	include "templates/footer{$name}.php";
}
function get_sidebar( $name = '' ){
	if( ! empty($name) )
		$name = '-' . $name; // -main
	include "templates/sidebar{$name}.php";
}
function get_template_part( $slug, $name = '' ){
	if( ! empty($name) )
		$slug .= '-' . $name; // -main
	//echo "templates/{$slug}.php";
	include "templates/{$slug}.php";
}

function mobtani_redirect( $address ){
	header("Location: {$address}");
	// ... echo javascript for redirect in case of not working header
	die();
}

?>