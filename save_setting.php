<?php 
	session_start();

	if ( isset($_POST ['new_name'] )) { $new_name = $_POST ['new_name']; if ($new_name == '') { unset($new_name);}}
	if ( isset ($_POST ['new_username'] )) { $new_username = $_POST ['new_username']; if ($new_username == '') { unset($new_username);}}
	if ( isset ($_POST ['new_email'])) { $new_email = $_POST ['new_email']; if ($new_email == ''){
		unset ($_POST ['new_email']); }}
	if ( isset ($_POST ['new_view_name'])) { $new_view_name = $_POST ['new_view_name']; if ($new_view_name == ''){
		unset ($_POST ['new_view_name']); }}
	if ( isset ($_POST ['new_password'])) { $new_password = $_POST ['new_password']; if ($new_password == ''){
		unset ($_POST ['new_password']); }}


		
	if (!empty($new_name) or !empty($new_username) or !empty($new_email) or !empty($new_password)){
			
		

	$new_name = stripslashes($new_name);
	$new_name = htmlspecialchars($new_name);
	$new_username = stripslashes($new_username);
	$new_username = htmlspecialchars($new_username);
	$new_email = stripslashes($new_email);
	$new_email = htmlspecialchars($new_email);
	$new_password = stripslashes($new_password);
	$new_password = htmlspecialchars($new_password);

	$new_name = trim($new_name);
	$new_username = trim($new_username);
	$new_email = trim($new_email);
	$new_password = trim($new_password);

		if($new_view_name == "name"){
			$new_view_name = 0;
		} 
		else {
			$new_view_name = 1;
		}

		include ("bd.php");
		/* фильтруем все спец-символы. защита от SQL Injection */
        $new_username = mysql_real_escape_string($new_username);
        $new_email = mysql_real_escape_string($new_email);
        $new_name = mysql_real_escape_string($new_name);
        $new_password = mysql_real_escape_string($new_password);

        $id = $_SESSION['id'];//+
       $result = mysql_query("SELECT username FROM user WHERE username='$new_username'",$db);
    	$myrow = mysql_fetch_array($result);
    		if (!empty($myrow['username'])) {
       	 exit ("<script> alert(\"Извините, введённый вами логин уже зарегистрирован. Введите другой логин.\"); 
        	window.location = \"http://polenov/ws-user/cabinet.php\"; </script>");
    	}
    	
        $query = " UPDATE user SET name = '$new_name', username = '$new_username', email = '$new_email', password  = 
        '$new_password', view_name = '$new_view_name' WHERE id ='$id'";
     
          if($result == mysql_query($query)) {
               exit ("<script> alert(\"Информация обновлена\"); 
        	window.location = \"http://polenov/ws-user/cabinet.php\"; </script>");
            } else {
            	  exit ("<script> alert(\" При изменении информации произошла ошибка Информация не была записана.\"); 
        	window.location = \"http://polenov/ws-user/cabinet.php\"; </script>");
            }
   $unloading = mysql_query("SELECT * FROM user WHERE id='$id'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($unloading); //обработка запроса

    $_SESSION['username'] = $myrow['username']; 
    $_SESSION['name'] = $myrow['name'];
    $_SESSION['email'] = $myrow['email'];
    $_SESSION['id'] = $myrow['id'];
    $_SESSION['view_name'] = $myrow['view_name'];
    $_SESSION['user_logo'] = $myrow['user_logo']; 
		
	    exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=ws-user/cabinet.php'></head></html>");

} else{
	 exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=ws-user/cabinet.php'></head></html>");
}
