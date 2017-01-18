<?php 
session_start()
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Поленов - Вход</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="css/reset.css" media="screen" title="no title">
    <link rel="stylesheet" href="css/login_style.css" media="screen" title="no title">
    <link rel="shortcut icon" href="image/book.png" type="image/x-icon">
  </head>
  <body>
    <div class="cover">
        <div class="signin-bg-container">
          <span class="sign_logo"><a  id="qw" href="/"></a></span>
          <div class="sign_content">
              <span>Вход</span>
              <form action="auth.php" method="post">
                <input type="text" name="username" placeholder="Логин" />
                <input type="password" name="password" placeholder="пароль"/>
                <a id="q" href="pasword.php">Забыли пароль?</a>
                <input type="submit" value="Войти" />
              </form>
             
              <div class="txt">
                  <p>Нет аккаунта? <br> <a href="signup.php">Зарегистрируйся</a> </p>
              </div>
          </div>
        </div>
    </div>
  </body>
</html>
