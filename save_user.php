<?php

if (isset($_POST['name'])) { $name = $_POST['name'];  if ($name == '')  {   unset($name);}}
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['email'])) { $email = $_POST['email'];  if ($email == '') { unset($email);}}

if (isset($_POST['username'])) { $username = $_POST['username'];  if ($username == '')  {unset($username);}} 
       
 if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);}}
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty( $name) or empty($email) or empty($username) or empty($password))  //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
 {
    exit ("<script> alert(\"Вы ввели не всю информацию! Пожалуйста заполните все поля.\"); 
        window.location = \"http://polenov/signup.php\"; </script>");
}
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$username = stripslashes($username);
$username = htmlspecialchars($username);
$password = stripslashes($password);
$password = htmlspecialchars($password);
 //удаляем лишние пробелы
$name = trim($name);
$email = trim($email);
$login = trim($login);
$password = trim($password);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT username FROM user WHERE username='$username'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['username'])) {
        exit ("<script> alert(\"Извините, введённый вами логин уже зарегистрирован. Введите другой логин.\"); 
        window.location = \"http://polenov/signup.php\"; </script>");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO user (name,username , email, password) VALUES('$name','$username','$email','$password')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
        echo "<script> alert(\"Вы успешно зарегистрированы!\"); 
        window.location = \"index.php\"; </script>";
    }
    else {
        echo "Ошибка! Вы не зарегистрированы.";

    }
    ?>