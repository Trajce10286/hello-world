<?php

$offset = 0;

if(isset($_POST['text'])&& isset($_POST['searchfor'])&& isset($_POST['replacewith'])){

	$text = $_POST['text'];
	$search = $_POST['searchfor'];
	$replace = $_POST['replacewith'];

	$search_length = strlen($search);

	if (!empty($text)&& !empty($search)&& !empty($replace)){

		while ($position = strpos($text, $search, $offset)){
			$offset = $position + $search_length;
			$text = substr_replace($text, $replace, $position, $search_length);
		}

		echo $text;
	}
}else{
	echo 'Pleace fill in all fields.'; 
}

?>

<form action="str_replace.php" method="POST">
	<textarea name="text" rows="6" cols="30"></textarea><br><br>
	Search for: <input type="text" name="searchfor"><br><br>
	Replace with: <input type="text" name="replacewith"><br><br>
	<input type="submit" value="Submit">

</form>