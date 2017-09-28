<?php

	
	use Aws\S3\Exception\S3Exception;
	
	class FileUplaoder{
		private $bucket;
		private $s3;
		
		public function __construct($bucket, $s3){
				$this->bucket = $bucket;
				$this->s3 = $s3;
		}
		
		function uploadS3File($files, $tempUploadDir, $uploadDir, $tmpName, $newFileName){
			
			
			
			
			if($files[$tmpName]['tmp_name'] != "") {
				
				///file details
				$name = $files[$tmpName]['name'];
				
				$extension = explode('.', $name);
				$extension = strtolower(end($extension));
				
				//check if writable
				if ( !(is_dir($tempUploadDir) && is_writable($tempUploadDir)) ) {
					return 1;
				}
				
				//move file
				if( !(move_uploaded_file($files[$tmpName]["tmp_name"], $tempUploadDir . $name)))
					return 2;
				

				try{
					
					$this->s3->putObject([
						'Bucket' => $this->bucket,
						'Key' => $uploadDir . $newFileName,
						'Body' => fopen($tempUploadDir . $name , 'rb'),
						'ACL' => 'public-read'
					]);

					unlink($tempUploadDir . $name);
					return 0;
					
					
		 
				}catch(S3Exception $e) {
					return 3;
				} 

			}	
			
		}
		
		function testFunc(){
			echo $this->bucket;
		}
		
		
	}


?>