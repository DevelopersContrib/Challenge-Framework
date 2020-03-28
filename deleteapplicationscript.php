<?php
	//delete application
	include('header-new.php');
	
	$applicationid = $_GET['appid'];

		if($applicationid == "" || $applicationid == " "){
			echo "No Application id found. 
			<br> Do a query: mychallenge.com/deleteapplicationscript.php?appid=your_app_id
			<br>Deletion Failed.";
		}else{
			$result = mysql_query("DELETE FROM `Applications` WHERE `AppId` = '".$applicationid."' ");
				if(!$result){
					echo "Deletion Failed. Please check Application Id and try again. ".mysql_error();
				}
				else{
					echo "Delete Successful.";
				}
		}
?>