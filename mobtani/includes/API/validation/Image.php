<?php
class Image{
	private $fileInformationArray;
	public function __construct( $fileInformationArray ){
		$this -> fileInformationArray = $fileInformationArray;
	}
	public function isValid( $maxSize = 500000 ){
		//if return false;
		if( $this -> fileInformationArray['error'] === 0 ){
			// بررسی کن تصویر باشد
			// getimagesize( fileInformationArray['tmp_name'] );
			if( strpos( $this -> fileInformationArray['type'], 'image/') !== 0 ){
				$alertMessage = "خطا - فایل حتما تصویر باشد!";
				$GLOBALS['alert'] -> alerts( $alertMessage );
				return false;
			}
			if( $this -> fileInformationArray['size'] > $maxSize ){				
			$alertMessage = 'حجم تصویر کوچکتر از ' . ($maxSize / 1024) . ' کیلوبایت باشد!';
				$GLOBALS['alert'] -> alerts( $alertMessage );
				return false;
			}
			return true;
		}
		else{
			$alertMessage = "خطا در ارسال فایل به سرور!";
			$GLOBALS['alert'] -> alerts( $alertMessage );
			return false;
		}
	}
	public function commit(){		
		$extension = pathinfo( $this -> fileInformationArray['name'] , PATHINFO_EXTENSION );
		$fileName = time() . '.' . $extension;
		
		$uid = $GLOBALS['aaa'] -> uid();
		$destinationPath = $GLOBALS['uploadPath'] . $uid . '/';
		if( ! is_dir($destinationPath) ){ // آیا این فولدر وجود دارد
			//mkdir( $destinationPath, '0777', true );
			mkdir( $destinationPath ); // این فولدر را ایجاد کن
		}
		
		$destinationAddress = $destinationPath . $fileName;
		move_uploaded_file( $this -> fileInformationArray['tmp_name'] , $destinationAddress);
		
		return $uid . '/' . $fileName;
	}
}
?>