<?php
// strpos need $string, $find and od koja pozicija da pocne da broo.


$offset = 0;
$find = 'is';
$find_lenght = strlen($find);


$string = 'This is a string, and it is an example.';

While ($string_position = strpos($string, $find, $offset)) {
	echo '<strong>'.$find.'</strong> found at'.$string_position.'<br>';
$offset = $string_position + $find_lenght;	
}

?>