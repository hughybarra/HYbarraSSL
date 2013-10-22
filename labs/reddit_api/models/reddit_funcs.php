<?php
	class reddit_funcs{
		public function login($reddit_dictionary, $url){
			//open connection
			$ch = curl_init();
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, $url);
			// tell curl we will be sending data
			curl_setopt($ch,CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// attach data to the request 
			curl_setopt($ch, CURLOPT_POSTFIELDS,$reddit_dictionary);
			//execute post
			$result = json_decode(curl_exec($ch), true);
			//close connection
			curl_close($ch);
			
			
			// parsing json response from Reddit
			$mod_hash = $result["json"]["data"]["modhash"];
			$cookie   = $result["json"]["data"]["cookie"];
			
			// passing response vars to Session vars
			$_SESSION["mod_hash"] = $mod_hash;
			$_SESSION["reddit_cookie"]= $cookie;
			return $mod_hash;
		}// end reddit login function
		public function get_front_page(){
			$url = "http://www.reddit.com/.json";
			// open connection 
			$ch = curl_init();
			// set the url etc..
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = json_decode(curl_exec($ch), true);
			// close connection 
			curl_close($ch);
			// echo var_dump($result);
			return $result;
		}// end get front page function
	}// end class 