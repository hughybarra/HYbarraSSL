<?php
	class file_handler{
		public function fileupload($file, $rando){
			$image_path = "";
			$tempfile = $file["tmp_name"];
			// ($file, $file);
			// how do i change the file path ? it is not working 
			
			$target_path = "site_images/uploaded_images/uploaded_image_".$rando;
			move_uploaded_file($tempfile, $target_path);
			$image_path .= $target_path.$rando;
			return $image_path;
		}
	}
?>