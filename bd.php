<?php 
	$host = 'localhost'; // адрес сервера 
	$database = 'date_base_polenov'; // имя базы данных
	$user = 'root'; // имя пользователя
	$pass = '1234567'; // пароль
	$db = mysql_connect ($host, $user, $pass); //**подключение к бд
		mysql_select_db ("$database", $db); //**выбор базы
?>