<?php
	class api
	{
		const API_URL = 'http://api.theopensourceproject.org/api.php';
		private static function send_post_data($data){
			$url =  parse_url(self::API_URL);
			$boundary = md5(microtime(true));
			$post = '';
			foreach ($data as $name => $value){
				$post .= "--{$boundary}\r\n";
				$post .= "Content-Disposition: form-data; name=\"{$name}\"\r\n\r\n";
				$post .= "{$value}\r\n";
			}
			$post .= "--{$boundary}--\r\n";
			if(isset($url['query'])){
				$head = "POST {$url['path']}?{$url['query']} HTTP:/1.1\r\n";
			}else{
				$head = "POST {$url['path']} HTTP:/1.1\r\n";
			}
			$head .= "Host: {$url['host']}\r\n";
			$head .= "Content-Type: multipart/form-data; boundary=\"{$boundary}\"\r\n";
			$head .= "Content-Length: " . strlen($post) . "\r\n";
			$head .= "Connection: close\r\n\r\n";
			$socket = fsockopen($url['host'], ((isset($url['port'])) ? $url['port'] : 80));
			fwrite($socket, "{$head}{$post}");
			$var = explode("\r\n\r\n", stream_get_contents($socket));
			return end($var);
		}
		public static function action($act, $id){
			$request = array(
				'act'	       => $act,
				'id'      => $id,
			);
			return json_decode(self::send_post_data($request), true);
		}
		public static function login($email, $password){
			$request = array(
				'act'	       => "login",
				'email'      => $email,
				'password' => $password,
			);
			return json_decode(self::send_post_data($request), true);
		}
	}
?>
