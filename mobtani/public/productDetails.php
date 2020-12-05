<?php
include '../includes/settings.php' ;
include '../includes/functions.php';

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
	
	$parameters['message'] = nl2br( $_POST['message'] );
	$parameters['Userid'] = $aaa -> uid();
	$parameters['Productid'] = $Productid;
	$comment -> save( $parameters );
	
	unset($comment);
}	

$product = new Product( $db );
$row = $product -> get( $Productid );
	
unset($product);
//unset($db);	
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
				نام دوره: <?php echo $row['name']; ?>
			</h2>
			<img src = '<?php echo $row['imgSrc']; ?>' class = 'card-img-top'>
			<h3>مشخصات</h3>
			<p>
				قیمت: <?php echo $row['price']; ?> تومان<br>
				توضیحات: <?php echo $row['description']; ?>
			</p>
			<h3>زمان تشکیل</h3>
			<p>
				روزهای <?php echo $row['weekday']; ?> 
				از <?php echo $row['timeFrom']; ?> تا <?php echo $row['timeTo']; ?>
			</p>
			<section>
				<a href = 'editProduct.php?id=<?php echo $row['id']; ?>' class = 'btn btn-primary'>ویرایش</a>
				<a href = 'deleteProduct.php?id=<?php echo $row['id']; ?>' class = 'btn btn-danger'>حذف</a>
			</section>
			<hr>
			<form action = "#comments" method = "post">			
				<h2>نظر جدید</h2>
				<textarea name = "message" id = "message" class="form-control" placeholder = "نظر شما ..."></textarea>	
				<input type = "submit" name = "submit" value = "ثبت" class="btn btn-success mt-2"><br><br>
			</form>
			<?php
			$comment = new Comment( $db );
			$table = $comment -> test($Productid);
			$count = count( $table ); // تعداد کامنت‌ها
			echo "<h3 id = 'comments'>نظرات ({$count})</h3>";
			?>
			<section class = 'container'>
			<?php			
			foreach($table as $row){
				//get_template_part('commentCard');
				include '../includes/templates/comment.php';
			}
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
		
	</body>
</html>