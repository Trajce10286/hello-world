<?php

$food = array('healty'=>
						array('salad', 'vegetables', 'pasta'),
				'unhealty'=>
						array('pizza', 'ice cream'));

foreach ($food as $element => $inner_array) {
	echo '<strong>'.$element.'</strong><br>';
foreach ($inner_array as $item) {
	echo $item.'<br>';
	}
}

?>