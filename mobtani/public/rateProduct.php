<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;


$aaa = new AAA();
/*
if( ! $aaa -> isAuthenticated() ){
	$alert -> alerts('ابتدا وارد شوید!');
	mobtani_redirect("login.php?redirect=productDetails.php?id={$Productid}");
}*/
$Productid = $_GET['id'];
$Userid = $aaa -> uid();
	
$vote = $_GET['vote'];
if( $vote >= 1 && $vote <= 5 ){
	$rate = new Rate( new DB() );
	$where = "Userid = {$Userid} AND Productid = {$Productid}";
	$table = $rate -> find($where); 
	
	if( $table[0] ){ // آیا این محصول توسط این کاربر امتیاز گرفته از قبل؟
		// امنیاز را بروز رسانی کن
		$parameters = $table[0];
		$parameters['vote']			= $vote;
		$rate -> save( $parameters );
	}
	else{
		// ایجاد سطر جدید در جدول امتیاز
		$parameters['Userid']		= $Userid;
		$parameters['Productid']	= $Productid;
		$parameters['vote']			= $vote;
		$rate -> save( $parameters );
	}
	mobtani_redirect("productDetails.php?id={$Productid}");
}
?>