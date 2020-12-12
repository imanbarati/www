<?php
include('../includes/settings.php');
include '../includes/functions.php';

$aaa = new AAA();
if( ! $aaa -> isAuthenticated() ){
	$alert -> alerts('ابتدا وارد شوید!');
	mobtani_redirect('login.php?redirect=editProduct.php');
}
// اگر کاربر حق دسترسی به این صفحه را ندارد به صفحه دیگری ریدایرکت شود
if( ! $aaa -> can('Product', 'Edit') ){
	$alert -> alerts('دسترسی غیر مجاز!');
	mobtani_redirect('profile.php');
}

$db = new db();
$product = new Product( $db );

$imgSrc = '/mobtani/public/assets/images/uploads/image.jpg';
$id = $_GET['id']; // دریافت شناسه آیتم از URL


if( isset( $_POST['submit'] ) ){ // اگر کاربر دکمه سابمیت را فشرده
		
	// اطلاعات داخل فرم را در جدول ویرایش کن
	$parameters = array(
		'name'			=> $_POST['name'],
		'price'			=> $_POST['price'],
		'weekday'		=> $_POST['weekday'],
		'timeFrom'		=> $_POST['timeFrom'],
		'timeTo'		=> $_POST['timeTo'],
		'imgSrc'		=> $imgSrc,
		'description' 	=> $_POST['description'],
		'id'			=> $id
		);
	$product -> save( $parameters );
	
	
	
	mobtani_redirect('showProducts.php');
}
//else // اگر کاربر میخواهد فرم ویرایش محصول را ببیند
	$row = $product -> get( $id );

unset($product);
unset($db);
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>ویرایش محصول</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "container">
		<h1>ویرایش محصول</h1>
		<?php echo $alert -> alerts();?>
		<form action = "" method = "post">	
			<h3>مشخصات دوره</h3>
			<label for = "name">نام دوره</label>
			<input type = "text" name = "name" id = "name" class="form-control" value = "<?php echo $row['name']; ?>"><br>
			
			<label for = "price">قیمت</label>
			<input type = "number" name = "price" id = "price" class="form-control" min = "0" step = "1000" value = "<?php echo $row['price']; ?>"> تومان<br>
			<label for = "description">توضیحات </label>
			<textarea name = "description" id = "description" class="form-control"><?php echo $row['description'];?></textarea><br>
			<h3>زمان برگزاری</h3>
			<label for = "weekday">روز هفته</label>
			<select name = "weekday" id = "weekday" class="form-control">
				<option value = "saturday" <?php if($row['weekday'] == 'saturday') echo 'selected';?>>شنبه</option>
				<option value = "sunday" <?php if($row['weekday'] == 'sunday') echo 'selected';?>>یک‌شنبه</option>
				<option value = "monday" <?php if($row['weekday'] == 'monday') echo 'selected';?>>دوشنبه</option>
				<option value = "tuesday" <?php if($row['weekday'] == 'tuesday') echo 'selected';?>>سه‌شنبه</option>
				<option value = "wednesday" <?php if($row['weekday'] == 'wednesday') echo 'selected';?>>چهارشنبه</option>
				<option value = "thursday" <?php if($row['weekday'] == 'thursday') echo 'selected';?>>پنج‌شنبه</option>
				<option value = "friday" <?php if($row['weekday'] == 'friday') echo 'selected';?>>جمعه</option>
			</select>
			<br>
			<label for = "timeFrom">زمان کلاس از </label>
			<input type = "time" name = "timeFrom" id = "timeFrom"  value = "<?php echo $row['timeFrom']; ?>" class="form-control"><br>
			<label for = "timeTo">زمان کلاس تا </label>
			<input type = "time" name = "timeTo" id = "timeTo" value = "<?php echo $row['timeTo']; ?>" class="form-control">
			<br>
			
			<input type = "submit" name = "submit" value = "ویرایش" class="btn btn-success">
		</form>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	</body>
</html>