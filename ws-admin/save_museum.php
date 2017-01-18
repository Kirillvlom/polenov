<?php 
	session_start();
	include ("../bd.php");

	$select_delet = $_POST['select'];
	if ($select_delet >0){
		foreach($select_delet as $item){
			$sql = "DELETE FROM museum WHERE id_museum = $item";
		  mysql_query($sql) or die (mysql_error());   
		}
		exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=all_museum.php'></head></html>");
	} else{
		echo "<script>alert('Вы ничего не выбрали')</script>";
		 echo "<script>  window.location = \"add_museum.php\"; </script>";
	}
	
 ?>		
