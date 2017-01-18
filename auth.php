<?php
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['username'])) { $username = $_POST['username']; if ($username == '') { unset($username);} } 
  //заносим введенный пользователем логин в переменную $username, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password= $_POST['password']; if ($password == '') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($username) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $username = trim($username);
    $password = trim($password);
// подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
$result = mysql_query("SELECT * FROM user WHERE username='$username'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result); //обработка запроса
    if (empty($myrow['password']))
    {
    //если пользователя с введенным логином не существует
    exit ( "<script> alert(\"Извините, введённый вами login не существует.\"); 
        window.location = \"login.php\"; </script>");
   
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['username'] = $myrow['username']; 
    $_SESSION['name'] = $myrow['name'];
    $_SESSION['email'] = $myrow['email'];
    $_SESSION['id'] = $myrow['id'];
    $_SESSION['view_name'] = $myrow['view_name'];
    $_SESSION['user_logo'] = $myrow['user_logo'];
    $_SESSION['usergroup'] = $myrow['usergroup'];
    


    //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
    }
 else {
    //если пароли не сошлись

   echo ( "<script> alert(\"Извините, введённый вами login или пароль неверный.\"); 
        window.location = \"login.php\"; </script>");
    }
    }
    ?>