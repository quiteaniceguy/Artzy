<?php

	
	use Aws\S3\Exception\S3Exception;
	
	class S3Interface{
		private $bucket;
		private $s3;
		
		public function __construct($bucket, $s3){
				$this->bucket = $bucket;
				$this->s3 = $s3;
		}
		
		function uploadS3File($files, $tempUploadDir, $uploadDir, $tmpName, $newFileName){
			
			
			
			//die(var_dump($files) . "<br/>" . $tmpName . "<br/>" . var_dump($files["uploadedAudio"]));
			if($files[$tmpName]['tmp_name'] != "") {
				
				///file details
				$name = $files[$tmpName]['name'];
				
				$extension = explode('.', $name);
				$extension = strtolower(end($extension));
				
				//check if writable
				if ( !is_dir($tempUploadDir)  ) {
					return 1;
				}
				if ( !is_writable($tempUploadDir) ) {
					return 4;
				}
				
				//move file
				if( !(move_uploaded_file($files[$tmpName]["tmp_name"], $tempUploadDir . $name)))
					return 2;
				

				try{
					error_reporting(-1);	
					$this->s3->putObject([
						'Bucket' => $this->bucket,
						'Key' => $uploadDir . $newFileName,
						'Body' => fopen($tempUploadDir . $name , 'rb'),
						'ACL' => 'public-read'
					]);

					unlink($tempUploadDir . $name);

					return 0;
					
					
		 
				}catch(Exception $e) {
					return "the error: " . $e->getMessage();
				} 

			}else{
				return 9;
			}
		
		}
		
		function deleteS3File($fileLocation){
			
			try{
				//var_dump($this->s3);
				$this->s3->deleteObject([
					'Bucket' => $this->bucket,
					'Key' => $fileLocation,
				]);
				
				return 0;
				
				
	 
			}catch(S3Exception $e) {
				return 1;
			} 
			
		}
		
		function testFunc(){
			echo $this->bucket;
		}
		
		
	}


?>
