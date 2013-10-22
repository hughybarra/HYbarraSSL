<?php

class ViewModel{
	
	public function get_view($myFile = "", $page_data =array()){
		include $myFile;
	}
}
?>