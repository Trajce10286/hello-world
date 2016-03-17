<?php

require 'connect.inc.php';

?>

<form action="conn_db.php" method="GET">
	Choose a food type:
	<select name="uh">
		<option value="u">Unhealty</option>
		<option value="h">Healty</option>
	</select><br><br>

	<input type="submit" value="submit">
</form>

<?php
if (isset($_GET['uh']) && !empty($_GET['uh'])){

	$uh = strtolower($_GET['uh']);
	
	if ($uh=='u' || $uh=='h') {

		$query = "SELECT `food`, `calories` FROM `food` WHERE `healty_unhealty`='$uh'  ORDER BY `calories` ASC ";

			if($query_run = mysql_query($query)) {

				if(mysql_num_rows($query_run)==NULL){

					echo 'Result not found.';

				} else {

				while ($query_row = mysql_fetch_assoc($query_run)) {
					
					$food = $query_row['food'];
					$calories = $query_row['calories'];

					echo $food. ' has '.$calories.' calories.<br>';
				}   
			}
		}
	}

	} else {

	  echo mysql_error();
}



// Database Hit Counter

$user_ip = $_SERVER['REMOTE_ADDR'];

function update_count() {
	$query = "SELECT `count` FROM `hit_count`";
	if(@$query_run = mysql_query($query)){
		$count = mysql_result($query_run, 0, 'count');
		$count_inc = $count + 1;
	}

	$query_update = "UPDATE `hit_count` SET `count`='$count_inc'";
	if(@$query_update_run = mysql_query($query_update)){}


}


function ip_add($ip){
	$query = "INSERT INTO `hits_ip`(`ip`) VALUES ('$ip')";
	$query_run = mysql_query($query);
}


function ip_exists($ip){
	global $user_ip; 

	$query = "SELECT `ip` FROM `hits_ip` WHERE `ip`='$ip'";
	$query_run = mysql_query($query);
	$num_rows = mysql_num_rows($query_run);

	if($num_rows==0){
		return false;
	}else if($num_rows>=1){
	 return true;
	}

}


if(!ip_exists($user_ip)){
	update_count();
	ip_add($user_ip);
}

?>