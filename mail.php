<?php 
echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Поленов - Регистрация</title>
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
              <span>Регистрация</span>
              <form action="auth.php" method="post">
                <input type="text" name="login" placeholder="Ваше имя""/>
                <input type="text" name="pass" placeholder="Ваша почта"/>
                <input type="text" name="login" placeholder="Логин" />
                <input type="password" name="pass" placeholder="пароль"/>
                <input type="submit" value="Зарегистрироваться" />
              </form>

          </div>
        </div>
    </div>
  </body>
</html>
"
?> 