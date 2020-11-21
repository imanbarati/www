<?php
include 'Table.php';
include 'Product.php';
// ....

class DB{
	var $dbc;
	var $executeError = false;
	
	function __construct($transaction = false, $SelectDB = true){ // تابعي که با ایجاد شیء از کلاس، اتوماتیک فراخوانی می‌شود		
		// 1. اتصال به ديتابيس
		$this -> dbc = new mysqli ( DBHOST, DBUSER, DBPASS );
		
		if( $SelectDB )
			$this -> dbc -> select_db( DBNAME );
		$this -> dbc -> set_charset( CHARSET );
		
		if( $transaction ){
			//$this -> dbc -> autocommit( false );//
			$this -> dbc -> begin_transaction();
		}
	}
	function execute( $sql ){
		// 3. اجرای کوئری
		$result = $this -> dbc -> query( $sql );
		
		global $alert;
		if ( $this -> dbc -> error ){
			$this -> executeError = true;
			$alertMessage = "خطا در اجرای فرمان!<section lang = 'en'>{$this -> dbc -> error}</section>";
			$alert -> alerts( $alertMessage );
		}
		else{
			$alertMessage = "با موفقیت اجرا شد!<section lang = 'en'>{$sql}</section>";
			$alert -> alerts( $alertMessage, 'success' );	
		}
		
		if( $result !== true && $result !== false){
			$table = $result -> fetch_all( MYSQLI_ASSOC ); // جدول نتیجه به صورت آرایه انجمنی
			return $table;
		}
		else{
			return $result;
		}
	}
	function commit(){
		if( $this -> executeError ){ // اگر خطا در تراکنش
			$this -> dbc -> rollback(); // بازگشت به حالت قبل از تراکنش
			
			$alertMessage = 'عدم اجرای تراکنش!<section lang = "en">' . $this -> dbc -> error . '</section>';
			mobtani_alerts($alertMessage);
		}
		else{	
			$this -> dbc -> commit(); // نهایی کردن تغییرات
			
			$alertMessage = 'تراکنش با موفقیت اجرا شد!';
			mobtani_alerts($alertMessage, 'success');
		}
	}
	function __destruct(){ // با حذف شیء، این تابع فراخوانی می‌شود
		// 4. بستن اتصال
		$this -> dbc -> close();
	}		
}
?>