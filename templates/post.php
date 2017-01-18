<?php
session_start();
include('../bd.php');
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM post WHERE id_post='$id'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result); //обработка запроса
    if (empty($myrow['id_post']))
    {
    exit ( "<script> alert(\"Извините, данной записи не существует.\"); 
        window.location = \"../ws-content/painting.php\"; </script>");
    } else {
    	if ($myrow['id_post'] == $id){
    		$id_post = $myrow['id_post']  ;
    		$title = $myrow['title'] ;
    		$url_text = $myrow['url_text'] ;
    		$img_post = $myrow['img_post'] ; 
    		$id_comment = $myrow['id_comment'] ;
    		$date_post = $myrow['date_post'] ;
    		$id_museum = $myrow['id_museum'] ;


    		$filename = $url_text;
    		if (file_exists($filename)){ //проверка на существование
    			$fp =fopen($filename, "r");
    		while (!feof($fp)){
    			$buuf .=fgets($fp);
    		}
    		fclose($fp);
    		$content_text = $buuf;
    	} else
    	   $buuf = "<pre> <p style='color:red;'>Запись не найдена</p>";
    		

    		
    	}
    	
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><? echo $title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" href="../css/reset.css" media="screen" title="no title">
	<link rel="stylesheet" href="../css/style.css" media="screen" title="no title">
	<link rel="stylesheet" href="../css/painting.css">
	<link rel="shortcut icon" href="../image/book.png" type="image/x-icon">
	<script src="../js/new_post.js"></script>
</head>
<body>
	<a id="qwe" href="../ws-content/painting.php#<?echo $id_post?>">Назад</a>
	<div class="cover" id="top">
		<header>
			<div class="group_header">
				<div class="logo"><a href="/"></a></div>
				<menu>
					<li><a href="/">Главная</a></li>
          			<li><a href="../ws-content/biography.php">Биография</a></li>
          			<li><a href="../ws-content/painting.php">Живопись</a></li>
          			<li><a href="../ws-content/museums.php">Музеи</a></li>
          			<li><a href="http://www.polenovo.ru/" target="_blank">Поленово</a></li>
				</menu>
			</div>
			<div class="black">
				<div class="authorization">
					<div class="login">
						 <?php
  if (empty($_SESSION['username']) or empty($_SESSION['id'])){
           echo "<a href='../login.php'>Войти</a> ";
        } else  
       { if($_SESSION['usergroup'] == 'admin') {
       echo "<ul class='nav'>
        <li><a href='../ws-admin/admin.php'>".$_SESSION['username']."</a>
         <ul class='submenu'>
              <li><a href='../ws-user/out.php'>выход</a></li>
             </ul></li>  
          </ul>
          </nav>";
        } else
        { if($_SESSION['usergroup'] == ''){
           echo "<ul class='nav'>
            <li><a href='../ws-user/cabinet.php'>".$_SESSION['username']."</a>
              <ul class='submenu'>
              <li><a href='../ws-user/cabinet.php'>Настройки</a></li>
              <li><a href='../ws-user/my_comments.php'>Комментарии</a></li>
              <li><a href='../ws-user/out.php'>выход</a></li>
             </ul>
             </li>  
            </ul>
          </nav>";
        }
}
}
?>
					</div>
				</div>
			</div>
		</header>
		<div class="content_view">
			<div class="photos-content_view">
				<div class="mask">
					<img src="../ws-content/p/<? echo $img_post;?>" alt="">
				</div>
			</div>
			<div class="photos-content_info">
				<p ><h1 style="text-align: center; font-size: 22px"><? echo $title;?></h1></p>
				<? echo $buuf;?>
<?
$result2 = mysql_query("SELECT * FROM museum WHERE id_museum='$id_museum'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow2 = mysql_fetch_array($result2); //обработка запроса
    if (empty($myrow2['id_museum']))
    {
    		$museum = " нигде =)";
   
    } else {
    	if ($myrow2['id_museum'] == $id_museum){
    		$museum = $myrow2['name_museum'];
    		$link_museum = $myrow2['link_museum'];
    } else{
    		
    }
}
?>
						<span  class="link_museums">Картину можно увидеть: <a target="_blank" href="<? echo $link_museum;?>" ><?
						echo $museum ?></a> </span><br>
						<span  class="comments_u"><h2>Комментарии пользователей - <? echo$_SESSION['user_comments']; ?></h2> </span> 
					</div>

					<div class="comment_user">
						<div class="user">
							<div class="logo_user"><img src="../ws-user/i/<? echo $_SESSION['user_logo']?>"></div>
							<div class="user_name_date_comment">
								<div class="user_name_date"> <span><?  if ($_SESSION['view_name'] ==0){
										echo $_SESSION['name'];
									} elseif ($_SESSION['view_name'] == 1) {
										echo $_SESSION['username'];
									}
									
									?>
										
									</span> <span>7 Декабря</span></div>
								<div class="user_comment" style=" width: 100%; font-size: 18px;">Замечательная картина, яркие цвета радуют глаз)) Хочу побыстрее увидеть картину в живую</div>
								</div>

							</div>
					
							

								<div class="new_comment" id="new_comment">			
									<button onclick="new_post()">Добавить коммент</button>								
								</div>
							</div>
						</div>

	
						<footer style="position: relative;     margin-top: 60px;">
							<img src="../image/Logo.png" alt="" />
							<span>Практическая работа студента 3 курса <br>
								Толелева Кирилла</span>   
							</footer>
						</body>
						</html>