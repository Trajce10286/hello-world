<?php

function ip_hit_count() {

	$ip_address = $_SERVER['REMOTE_ADDR'];

	$ip_file = 'ip.txt';


	$ip_read = file($ip_file);
			foreach ($ip_read as $ip) {
			 $each_ip = trim($ip);

			if ($ip_address==$each_ip) {
				 $found = $each_ip;

				 $handle = fopen($ip_file, 'a');
				fwrite($handle, $found."\n");
				fclose($handle);

				break;
			}
			else {
				 $found = false;
			}

			if ($found==false) {
				$filename = 'count.txt';

				$handle = fopen($filename, 'r');
				$current = fread($handle, filesize($filename));
				fclose($handle);

				$current_inc = $current + 1;

				$handle = fopen($filename, 'w');
				fwrite($handle, $current_inc);
				fclose($handle);


				// $handle = fopen($ip_file, 'a');
				// fwrite($handle, $ip_address."\n");
				// fclose($handle);



			}

		}


}

?>