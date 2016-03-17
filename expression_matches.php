
<?php
$string = 'Thishasnospaces';

function has_space($string){
	if (preg_match('/ /', $string)) {
		return true;
	}else {
		return false;
	}
}




if (has_space($string)) {
	echo 'has at least one space.';
} else {
	echo 'Has no spaces.';
}

?>