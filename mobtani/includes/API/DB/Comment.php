<?php
class Comment extends Table{
	// ستون‌های جدول
	var $Productid;
	var $Userid;
	var $message;
	var $parentid = 0;
	
	function test($Productid){
		$sql = "SELECT * FROM {$this -> tableName}, User 
				WHERE Productid = {$Productid} AND Userid = User.id AND {$this -> tableName}.status != 'deleted'
				ORDER BY {$this -> tableName}.id DESC";
		
		$table = $this -> db -> execute( $sql );
		return $table;		
	}
}
?>