<?php
	include 'includes/settings.php';
	include 'includes/functions.php';
		
	$db = new DB(false, false); // transaction = false, SelectDB = false	
	
	if( $restartingSetup ){
		$sql = "DROP DATABASE IF EXISTS {$DBNAME}";
		$db -> execute( $sql );
	}
	
	$sql = "CREATE DATABASE IF NOT EXISTS {$DBNAME}
			CHARACTER SET {$CHARSET}
			COLLATE {$COLLATE}";
	$db -> execute( $sql );

	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.Message(
				id INT NOT NULL AUTO_INCREMENT,
				name VARCHAR(30),
				email VARCHAR(30),
				message TEXT,
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.Product( 
				id INT NOT NULL AUTO_INCREMENT,
				name VARCHAR(30),
				price INT,
				weekday VARCHAR(30),
				timeFrom VARCHAR(30),
				timeTo VARCHAR(30),
				imgSrc VARCHAR(255),
				description TEXT,
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.User( 
				id INT NOT NULL AUTO_INCREMENT,
				firstname VARCHAR(50),
				lastname VARCHAR(50),
				email VARCHAR(50),
				password VARCHAR(50),
				state VARCHAR(50),
				city VARCHAR(50),
				role VARCHAR(15),
				imgSrc VARCHAR(255),
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.Comment( 
				id INT NOT NULL AUTO_INCREMENT,
				Userid INT,
				Productid INT,
				message Text,
				parentid INT,
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	unset( $db );
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>نصب برنامه</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "public/assets/css/main.css">
	</head>
	<body class = "container">
		<?php echo $alert -> alerts();?>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>