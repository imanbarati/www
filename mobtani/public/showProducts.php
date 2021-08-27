<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;
	
	$aaa = new AAA();
	
	$db = new db();
	$product = new Product( $db );

	$table = $product -> getAll();
	
	unset($product);
	unset($db);	
?>
<!doctype html>
<html lang = "fa" class = "container-fluid">
	<head>
		<meta charset = "utf-8">
		<title>نمایش محصولات</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "row">
		<?php get_header();?>
		<main class = "col">
			<?php new Alert(); echo $alert -> alerts();?>
			<section class = "container-fluid">
				<h2>محصولات</h2>
				<section class = "row">
				<?php
					foreach($table as $row){ // به ازای هر سطر از جدول
						include '../includes/templates/productCard.php';
					}
				?>
				</section>
			</section>
		</main>
		<?php
		get_sidebar();
		get_footer();
		?>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
		<script src="https://kit.fontawesome.com/e36ff0bc6c.js" crossorigin="anonymous"></script>
	</body>
</html>