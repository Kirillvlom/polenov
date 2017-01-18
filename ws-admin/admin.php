<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><? echo $_SESSION['username']?></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  	<link rel="stylesheet" href="../css/reset.css" media="screen" title="no title">
  	<link rel="stylesheet" href="../css/cabinet.css" media="screen" title="no title">
  	<link rel="shortcut icon" href="../image/book.ico" type="image/x-icon">
</head>
<body>
	<div class="center-component">
		<div class="content-menu">
			<menu>
				<li><a href="/"><img src="../image/Logo.png"> </a></li>
				<li style="background-color: rgba(149, 145, 145, 0.22);"><a href="admin.php">Мои настройки</a></li>
				<li><a href="add_post.php">Добавить запись</a></li>
        <li><a href="all_post.php">Все записи</a></li>
        <li><a href="all_user.php">Все пользователи</a></li>
        <li><a href="">Заблокированные пользователи</a></li>
        <li><a href="">Комментарии</a></li>
        <li><a href="add_museum.php">Добавить музей</a></li>
        <li><a href="all_museum.php">Все музеи</a></li>
				<li><a href="../ws-user/out.php">Выйти</a></li>
			</menu>
		</div>	
		<div class="content">
			<div class="title"><span>Добро пожаловать в личный кабинет <? echo $_SESSION['username']?></span></div>
			<div class="setting">
				 <form enctype="multipart/form-data"  action="../ws-user/photo_uploads.php" method="post">
               		<div class="files_photo">
               			<img style="border-radius: 100%; " src="../ws-user/i/<? if ($_SESSION['user_logo'] == ''){
               				echo "default_logo.jpg";
               				} else{
               					echo $_SESSION['user_logo'];
               				}

               				?>" alt="">
               		        <div class="file_upload">+<input type="file" name="picture" /></div>
               		        <input type="submit" value="Загрузить">
               		</div>   </form>

               		<form action="save_setting.php" method="post">
               		<div class="d_setting">
               			<span>Сменить имя : <? echo $_SESSION['name']?></span><input type="text" name="new_name" placeholder=""">
               			<span>Сменить ник : <? echo $_SESSION['username']?></span><input type="text" name="new_username">
               			<span>Изменить почту ; <strong style="color:red; "><? echo $_SESSION['email']?></strong></span><input type="text" name="new_email">
               			<span>Изменить пароль </span><input type="text" name="new_password">
               			<span>Отображение <strong style="color:red;">имени</strong>/<strong style="color:blue;">ника</strong>  </span>

               			<?
               			if( $_SESSION['view_name'] == 0){
               					echo "<input type='radio' name='new_view_name' value='name' checked /> 
               			 		<input type='radio' name='new_view_name' value='nickname'>";
               				} 
               				else{
               					echo "<input type='radio' name='new_view_name' value='name'  /> 
               			 		<input type='radio' name='new_view_name' value='nickname' checked />";
               				}
               			?>
               			

               			 <input style="clear:both;" type="submit" name="">
               		</div>
              </form>
			</div>
		</div>

	</div>
</body>
</html>
