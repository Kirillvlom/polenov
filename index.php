<?php 
	session_start();

 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Поленов главная </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  <link rel="stylesheet" href="css/reset.css" media="screen" title="no title">
  <link rel="stylesheet" href="css/style.css" media="screen" title="no title">
  <link rel="shortcut icon" href="image/book.ico" type="image/x-icon">
</head>
<body>
  <div class="cover" id="top">
    <header>
      <div class="group_header">
        <div class="logo"><a href="/"></a></div>
             <menu>
          <li><a href="/">Главная</a></li>
          <li><a href="ws-content/biography.php">Биография</a></li>
          <li><a href="ws-content/painting.php">Живопись</a></li>
          <li><a href="ws-content/museums.php">Музеи</a></li>
          <li><a href="http://www.polenovo.ru/" target="_blank">Поленово</a></li>
        </menu>
      </div>
      <div class="black">
        <div class="authorization">
          <div class="login">
           <?php
      if (empty($_SESSION['username']) or empty($_SESSION['id'])){
    	     echo "<a href='login.php'>Войти</a> ";
        }	else 	
       { if($_SESSION['usergroup'] == 'admin') {
       echo "<ul class='nav'>
        <li><a href='ws-admin/admin.php'>".$_SESSION['username']."</a>
         <ul class='submenu'>
              <li><a href='ws-user/out.php'>выход</a></li>
             </ul></li>  
          </ul>
          </nav>";
        } else
        { if($_SESSION['usergroup'] == ''){
           echo "<ul class='nav'>
            <li><a href='ws-user/cabinet.php'>".$_SESSION['username']."</a>
              <ul class='submenu'>
              <li><a href='ws-user/cabinet.php'>Настройки</a></li>
              <li><a href='ws-user/my_comments.php'>Комментарии</a></li>
              <li><a href='ws-user/out.php'>выход</a></li>
             </ul>
             </li>  
            </ul>
          </nav>";
        }
}
}
    	//echo "<a href='login.php'>".$_SESSION['username']."</a>"; 
    //echo "<a href='ws-user/out.php'>выход</a>"; 
?>
    
    
    
          </div>
        </div>
      </div>
    </header>

    <div class="contents">
      <!-- Slider -->
      <div id="slider">
        <div class="slides">
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Христос и грешница</h1>
                <h2>Многогранность, сложность творчества Поленова не
                 раз ставили в тупик художественных критиков,
                 зрителей и друзей художника.</h2>
               </div>
             </div>
             <div class="image">
              <img src="image\polenov_Hr_Gr_1887.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Речка Оять</h1>
                <h2>С раннего детства Поленову прививалась глубокая любовь к природе.</h2>
              </div>
            </div>
            <div class="image">
              <img src="image\6760.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Горелый лес</h1>
                <h2> Своеобразие художника, его личности было во многом связано с той средой, в которой он сформировался.</h2>
              </div>
            </div>
            <div class="image">
              <img src="image\227472.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Призраки Эллады</h1>
                <h2>Поленов имел незаурядный дар архитектора, музыканта и композитора,  был талантливым педагогом, театральным и общественным деятелем.</h2>
              </div>
            </div>
            <div class="image">
              <img src="image\18116.jpg">
            </div>
          </div>
        </div>
        <div class="switch">
          <ul>
            <li>
              <div class="on"></div>
            </li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>

      <!--slider-->
      <div class="black black_q">
        <p> О Жудожнике  </p>
      </div>
      <div class="select_content">
        <div class="select_content_q" onclick="return location.href = 'ws-content/biography.php'">
          <img src="image/kartiny-Polenova-21_Md.jpg" alt="" />
          <div class="overlay"><h4>Биография</h4></div>
        </div>

        <div class="select_content_q" onclick="return location.href = 'ws-content/painting.php'">
         <img src="image/23250.jpg" alt="" />
         <div class="overlay"><h4>Живопись</h4></div>
       </div>
       <div class="select_content_q" onclick="return location.href = 'ws-content/museums.php'">
        <img src="image/muzey-kartiny-devochka.jpg" alt="" />
        <div class="overlay"><h4>Музеи</h4></div>
      </div>
      <div class="select_content_q" onclick="return location.href = 'http://www.polenovo.ru'">
       <img src="image/big_home.jpg" alt="" />
       <div class="overlay"><h4>«Поленово»</h4></div>
     </div>
   </div>
   <div class="donate"><a href="http://yasobe.ru/na/kirillvlom#form_submit">Donate</a></div>
   <div class="contacts">
    <div class="contacts_center">
      <h3>Как можно с нами связаться</h3>
      <div class="col-lg">
        <span id="phone" class="icon-center"></span>
        <h4>Ярославль</h4><br>
        8-800-555-35-35
      </div>
      <div class="col-lg">
        <span  id="mail" class="icon-center"></span>
        <h4>Ярославль</h4><br>
        help@polenov.ru
      </div>
      <div class="col-lg">
        <span id="location" class="icon-center"></span>
        <h4>Ярославль</h4><br>
        Красная площадь дом 2
      </div>

    </div>
  </div>
</div>

<footer>
  <img src="image/Logo.png" alt="" />
  <span>Практическая работа студента 3 курса <br>
    Толелева Кирилла</span>   <a class="top" href="#top" style="transition: all 0.3s ease;"></a>

  </footer>
</div>
</body>
</html>
