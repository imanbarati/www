<?php
class Table{
	var $status = '';
	var $id;
	
	var $db;
	var $tableName;
	
	public function __construct( $db ){
		// مقداردهی اولیه
		$this -> tableName = get_class( $this );// 'Product' نام کلاس را دریافت میکند مثلا
		$this -> db = $db;
	}
	
	private function setParam( $parameters ){
		// پارامترهای ورودی را به مشخصه‌های شیء منتقل میکند
		foreach( $parameters as $var => $value )
			$this -> $var = $value; // $$var: $name, $price
	}
	
	public function get( $id ){ 
		$sql = "SELECT * FROM {$this -> tableName} 
		WHERE id = {$id} AND status != 'deleted'";
		
		$table = $this -> db -> execute( $sql );
		$row = $table[0];
		//$this -> setParam( $row );
		return $row; // برگرداندن اولین سطر
	}
	public function getAll(){
		$sql = "SELECT * FROM {$this -> tableName} 
				WHERE status != 'deleted'";
		
		$table = $this -> db -> execute( $sql );
		return $table;
	}
	private function userAlert( $result, $action ){
		global $alert;
		if( $result ){
			$alertMessage = "{$this -> tableName} با موفقیت {$action} شد!";
			$alert -> alerts( $alertMessage, 'success' );
		}
		else{
			$alertMessage = "خطا در {$action} {$this -> tableName}!";
			$alert -> alerts( $alertMessage );
		}		
	}
	public function delete( $id ){
		$sql = "UPDATE {$this -> tableName} SET
			status = 'deleted'
			WHERE id = {$id}";
			
		$result = $this -> db -> execute( $sql );
		$this -> userAlert($result, 'حذف');
	}
	
	private function tableVars(){
		// مشخصه‌هایی که عناصر جدول است را بر میگرداند
		$vars = get_object_vars( $this ); // همه مشخصه‌های این شیء
		foreach($vars as $key => $value){
			if( $key == 'id' ) // به بعد را از قلم بنداز id
				break;
			
			$result[$key] = $value;
		}
		return $result;
	}
	
	private function coloumnsList( $sep = ', ' ){
		// رشته‌ای شامل اسامی ستون‌های جدول را بر میگرداند
		$vars = $this -> tableVars();
		$columns = array_keys( $vars );
		return join($sep , $columns);
	}
	private function valuesList( $sep = "', '" ){
		// رشته‌ای شامل مقادیر رکورد را بر میگرداند
		$vars = $this -> tableVars();
		$values = array_values( $vars );
		var_dump($vars);
		return "'" . join($sep , $values) . "'";
	}
	private function columnValueList( $sep = ', ' ){
		// = رشته‌ای شامل زوج اسامی و مقادیر جدول جدا شده با
		$vars = $this -> tableVars();
		foreach($vars as $key => $value){
			$varPairs[] = "{$key} = '{$value}'";
		}
		return join($sep , $varPairs);		
	}
	
	protected function add(){
		$coloumnsList	= $this -> coloumnsList();
		$valuesList		= $this -> valuesList();
		$sql = "INSERT INTO {$this -> tableName}({$coloumnsList}) 
			VALUES({$valuesList})";
		$result = $this -> db -> execute( $sql );
		$this -> userAlert($result, 'ثبت');
	}
	protected function update(){
		$columnValueList = $this -> columnValueList();
		$sql = "UPDATE {$this -> tableName}
				SET {$columnValueList}
				WHERE id = {$this -> id}";
		$result = $this -> db -> execute( $sql );
		$this -> userAlert($result, 'ویرایش');	
	}	
	public function save( $parameters ){
		$this -> setParam( $parameters );
		if( isset( $this -> id ) )
			$this -> update();
		else
			$this -> add();
	}
	
	public function find($where, $order, $limitTo = false , $limitFrom = 0){
		// select
	}
}
?>