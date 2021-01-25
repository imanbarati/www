<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;

$aaa = new AAA();
/*
if( ! $aaa -> isAuthenticated() ){
	$alert -> alerts('ابتدا وارد شوید!');
	mobtani_redirect('login.php?redirect=addProduct.php');
}*/

$Productid = $_GET['id'];
$db = new db();

if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن	
	$comment = new Comment( $db );
	
	$parameters = $_POST;
	$parameters['message'] = nl2br( $parameters['message'] );
	$parameters['Userid'] = $aaa -> uid();
	$parameters['Productid'] = $Productid;
	$comment -> save( $parameters );
	
	mobtani_redirect('#comments');
	
	unset($comment);
}	

$product = new Product( $db );
$row = $product -> get( $Productid );
	
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
		<main class = "col container-fluid">
			<?php new Alert(); echo $alert -> alerts();?>
			<h2>
				نام محصول: <?php echo $row['name']; ?>
			</h2>
			<img src = '<?php echo $uploadBrowserPath . $row['imgSrc']; ?>' class = 'card-img-top'>
			<h3>مشخصات</h3>
			<p>
				<span class = 'font-weight-bold'>قیمت:</span> <?php echo number_format( $row['price'] ); ?> تومان<br>
				<span class = 'font-weight-bold'>توضیحات:</span> 
				<?php
				if( ! empty( $row['description'] ) ) echo $row['description'];
				else echo '---';
				?>
			</p>
			<h3>زمان فروش</h3>
			<p>
				روزهای <?php echo $row['weekday']; ?> 
				از <?php echo $row['timeFrom']; ?> تا <?php echo $row['timeTo']; ?>
			</p>
			<hr>
			<section class = "row container">
				<span class = 'col'>
					<?php
					if( $aaa -> can('Product', 'Edit') ){
					?>
						<a href = 'editProduct.php?id=<?php echo $row['id']; ?>' class = 'btn btn-primary'>ویرایش</a>
					<?php
					}
					if( $aaa -> can('Product', 'Delete') ){
					?>
						<a href = 'deleteProduct.php?id=<?php echo $row['id']; ?>' class = 'btn btn-danger'>حذف</a>
					<?php
					}
					?>
				</span>
				<span class = 'col-6 text-left'>
					<?php 
					if( $aaa -> can('Rate', 'Edit') ){
						$rate = new Rate( new DB() );
						$Userid = $aaa -> uid();
						$where = "Userid = {$Userid} AND Productid = {$Productid}";
						$table = $rate -> find($where);
						$vote = 0;
						if( isset( $table[0] ) )
							$vote = $table[0]['vote'];
						include '../includes/templates/rate.php';
					}
					?>
				</span>
			</section>
			<hr>			
			<h2>نظر جدید</h2>
			<form action = "" method = "post" class='form-inline container row mt-2'>
				<textarea name = "message" id = "message" class="form-control col" placeholder = "نظر شما ..."></textarea>
				<span class = "col-3">
					<input type = "submit" name = "submit" value = "ثبت" class="btn btn-success"><br><br>
				</span>
			</form>
			<?php
			function getComments( $parentid = 0 ){
				$comment = new Comment( new DB() );
				global $Productid;
				$table = $comment -> findJoin("Productid = {$Productid} AND parentid = {$parentid}");
				return $table;
			}
			$table = getComments();
			$count = count( $table ); // تعداد کامنت‌ها
			echo "<h3 id = 'comments'>نظرات ({$count})</h3>";
			?>
			<section class = 'container-fluid'>
			<?php
			function showComments( $parentid = 0 , $level = 1 ){
				// لیست کاکنت ها را بازیابی کن
				$table = getComments( $parentid );
				// آن ها را نمایش بده
				foreach($table as $row){
					//get_template_part('commentCard');
					include '../includes/templates/comment.php';
				}
			}
			showComments();
			if( $count == 0 )
				echo '<p>اولین نظر را شما بنویسید</p>';
			?>
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
		<script src = "assets/js/main.js"></script>
	</body>
</html>