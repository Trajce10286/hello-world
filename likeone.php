<?php

if (isset($_POST['search_name'])){
	$search_name = $_POST['search_name'];

		if(!empty($search_name)){

			if (strlen($search_name)>4){

				$query = "SELECT `name`	FROM `people` WHERE `name` LIKE '%".mysql_real_escape_string($search_name)."%'";
				@$query_run = mysql_query($query);

				$num_rows = mysql_num_rows($query_run);
				
				if($num_rows >=1){

					echo $num_rows.'results found. <br>';

					while($q_array = mysql_fetch_assoc($query_run)){
						echo $q_array['name'].'<br>';
					}

				} else{
					echo 'Doesn\'t found.';
				}
			} else {
				echo 'Your keyword must be 5 characters or more';
			}
		}

}






?>


<form action="likeone.php" method="POST">
	
	Name: <input type="text" name="search_name">  <input type="submit" value="Search">

</form>