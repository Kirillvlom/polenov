<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавить пост</title>
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
				<li><a href="admin.php">Мои настройки</a></li>
				<li style="background-color: rgba(149, 145, 145, 0.22);"><a href="add_post.php">Добавить запись</a></li>
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
			<div class="title"><span>Добавление новой записи</span></div>
			<div class="setting">
                <form enctype="multipart/form-data" action="save_post.php" method="post">
               		<div class="d_setting">
                      <div class="center">
                        <div class="titles"> <input type="text" name="new_title" placeholder="Заголовок" /></div>
                        <div class="con"> <textarea rows="10" cols="45" name="new_text" placeholder="Текст"></textarea></div>
                        <div class="muses"> <span>Выберите музей</span>
                              <p><select name="select">
                              <option value='0'>Пусто</option>";
                              <? 
                                include('../bd.php');
                                $result = "SELECT * FROM museum";
                                $myrow = mysql_query($result,$db);
                        if (mysql_num_rows($myrow) > 0 ){
                         $row = mysql_fetch_array($myrow);
                          do{
                           echo "<option value='".$row['id_museum']."'>".$row['name_museum']."</option>";

                          }
                         while ( $row = mysql_fetch_array($myrow));
                       }
       ?>
                                  
                                 
                                </select>
                              </p>
                        </div>
                        <div class="img_post"><span id="img_span">Добавить фото</span><input type="file" name="picture" /> 
                          </div>
                      </div>

               			 <input class="new_post" style="clear:both;" type="submit" name="">
               		</div>
              </form>
			</div>
		</div>

	</div>
</body>
</html>
