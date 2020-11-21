<?php
include '../includes/settings.php' ;
include '../includes/functions.php';

if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن
		
	$imgSrc = '/mobtani/public/assets/images/uploads/image.jpg';
	
	$db = new db();
	$product = new Product( $db );
	
	$parameters = array(
		'name'			=> $_POST['name'],
		'price'			=> $_POST['price'],
		'weekday'		=> $_POST['weekday'],
		'timeFrom'		=> $_POST['timeFrom'],
		'timeTo'		=> $_POST['timeTo'],
		'imgSrc'		=> $imgSrc,
		'description' 	=> $_POST['description'],
		//'status'		=> 'active',
		);
	$product -> save( $parameters );
	
	unset($product);
	unset($db);
	
	//mobtani_redirect('showProducts.php');
	/*
	// 2. ايجاد کوئري
	$sql = "INSERT INTO Product (name, price, weekday, timeFrom, timeTo, imgSrc, description) 
	VALUES('{$_POST['name']}', {$_POST['price']},'{$_POST['weekday']}', '{$_POST['timeFrom']}', '{$_POST['timeTo']}', '{$imgSrc}', '{$_POST['description']}')";
	$alert = $db -> execute( $sql );
	*/
}
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>افزودن محصول</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "container">
		<h1>تماس با ما</h1>
		<?php echo $alert -> alerts();?>
		<form action = "" method = "post">	
			<h3>مشخصات دوره</h3>
			<label for = "name">نام دوره</label>
			<input type = "text" name = "name" id = "name" class="form-control"><br>
			
			<label for = "price">قیمت</label>
			<input type = "number" name = "price" id = "price" class="form-control" min = "0" step = "1000"> تومان<br>
			<label for = "description">توضیحات </label>
			<textarea name = "description" id = "description" class="form-control"></textarea><br>
			<h3>زمان برگزاری</h3>
			<label for = "weekday">روز هفته</label>
			<select name = "weekday" id = "weekday" class="form-control">
				<option value = "saturday">شنبه</option>
				<option value = "sunday">یک‌شنبه</option>
				<option value = "monday">دوشنبه</option>
				<option value = "tuesday">سه‌شنبه</option>
				<option value = "wednesday">چهارشنبه</option>
				<option value = "thursday">پنج‌شنبه</option>
				<option value = "friday">جمعه</option>
			</select>
			<br>
			<label for = "timeFrom">زمان کلاس از </label>
			<input type = "time" name = "timeFrom" id = "timeFrom" value = "00:00" class="form-control"><br>
			<label for = "timeTo">زمان کلاس تا </label>
			<input type = "time" name = "timeTo" id = "timeTo" value = "00:00" class="form-control">
			<br>
			
			<input type = "submit" name = "submit" value = "ارسال" class="btn btn-success">
		</form>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	</body>
</html>