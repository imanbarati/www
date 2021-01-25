<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;

$aaa = new AAA();
if( ! $aaa -> isAuthenticated() ){
	$alert -> alerts('ابتدا وارد شوید!');
	mobtani_redirect('login.php?redirect=addProduct.php');
}
// اگر کاربر حق دسترسی به این صفحه را ندارد به صفحه دیگری ریدایرکت شود

$db = new db();
$product = new Product( $db );

$id = $_GET['id']; // URL دریافت شناسه آیتم از

$row = $product -> delete( $id );
mobtani_redirect('showProducts.php');

unset($product);
unset($db);
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>حذف محصول</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "container">
		<?php echo $alert -> alerts();?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	</body>
</html>