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

	unset( $db );
	$db = new DB();
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
				Roleid INT,
				imgSrc VARCHAR(255),
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.Comment( 
				id INT NOT NULL AUTO_INCREMENT,
				Userid INT,
				Productid INT,
				message TEXT,
				parentid INT,
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.Rate( 
				id INT NOT NULL AUTO_INCREMENT,
				Userid INT,
				Productid INT,
				vote INT,
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$sql = "CREATE TABLE IF NOT EXISTS {$DBNAME}.Role( 
				id INT NOT NULL AUTO_INCREMENT,
				role VARCHAR(15),
				ProductEdit BOOLEAN,
				ProductDelete BOOLEAN,
				ProductDetails BOOLEAN,
				ProductEditOther BOOLEAN,
				ProductDeleteOther BOOLEAN,
				ProductDetailsOther BOOLEAN,
				RateEdit BOOLEAN,
				UserEdit BOOLEAN,
				UserDelete BOOLEAN,
				UserDetails BOOLEAN,
				UserEditOther BOOLEAN,
				UserDeleteOther BOOLEAN,
				UserDetailsOther BOOLEAN,
				status VARCHAR(15),
				PRIMARY KEY(id)
			)ENGINE = INNODB";
	$db -> execute( $sql );
	
	$role = new Role( $db );	
	$parameters = array(
		'id'					=> 1,
		'role'					=> 'normal',
		'ProductEdit'			=> 0,
		'ProductDelete'			=> 0,
		'ProductDetails'		=> TRUE,
		'ProductEditOther'		=> 0,
		'ProductDeleteOther'	=> 0,
		'ProductDetailsOther'	=> 0,
		'RateEdit'				=> TRUE,
		'UserEdit'				=> TRUE,
		'UserDelete'			=> TRUE,
		'UserDetails'			=> TRUE,
		'UserEditOther'			=> 0,
		'UserDeleteOther'		=> 0,
		'UserDetailsOther'		=> TRUE
		);
	$role -> save( $parameters );
	
	$role = new Role( $db );	
	$parameters = array(
		'id'					=> 2,
		'role'					=> 'admin',
		'ProductEdit'			=> TRUE,
		'ProductDelete'			=> TRUE,
		'ProductDetails'		=> TRUE,
		'ProductEditOther'		=> TRUE,
		'ProductDeleteOther'	=> TRUE,
		'ProductDetailsOther'	=> TRUE,
		'RateEdit'				=> TRUE,
		'UserEdit'				=> TRUE,
		'UserDelete'			=> TRUE,
		'UserDetails'			=> TRUE,
		'UserEditOther'			=> TRUE,
		'UserDeleteOther'		=> TRUE,
		'UserDetailsOther'		=> TRUE,
		);
	$role -> save( $parameters );
	
	
	
	
	// Temporary variable, used to store current query
	$sql = '';
	// Read in entire file
	$lines = file('iran_cities_v3.sql');
	// Loop through each line
	foreach ($lines as $line)
	{
		// Skip if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$sql .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
			// Perform the query			
			$db -> execute( $sql );
			
			// Reset temp variable to empty
			$sql = '';
		}
	}
	
if( $restartingSetup ){
	
	$sql = "ALTER TABLE {$DBNAME}.ostan
			ADD Column status VARCHAR(15) DEFAULT ''";
	$db -> execute( $sql );
	
	$sql = "ALTER TABLE {$DBNAME}.shahr
			ADD Column status VARCHAR(15) DEFAULT ''";
	$db -> execute( $sql );
	/*
	$sql = "RENAME TABLE
			{$DBNAME}.ostan TO {$DBNAME}.Ostan,
			{$DBNAME}.shahr TO {$DBNAME}.Shahr";
	$db -> execute( $sql );
	*/
}

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