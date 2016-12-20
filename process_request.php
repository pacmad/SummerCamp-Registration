
       


<?php
/* Gandikota Ramesh, Sujan    Account :  jadrn018
				CS545, Fall 2015 	project #3	*/
include('helpers.php');
include('p2.php');

check_post_only();
$params = process_parameters();
//validate_data($params);
$temp = store_data_in_db($params);
if($temp==true){
	include('confirmation.php');
}
?>    