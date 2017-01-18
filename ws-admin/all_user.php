<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Список пользователей</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  	<link rel="stylesheet" href="../css/reset.css" media="screen" title="no title">
  	<link rel="stylesheet" href="../css/cabinet.css" media="screen" title="no title">
  	<link rel="shortcut icon" href="../image/book.ico" type="image/x-icon">
</head>
<body>
<script type="text/javascript">

    function checkAll(formName, checkboxName, varChecked) {

        for (var i = 0; i < formName[checkboxName].length; i++) {

            formName[checkboxName][i].checked = varChecked;

        }

    }

</script>

<style type="text/css">
	.e_setting{
    position: absolute;
		width: 850px;
	}
	.all_user{
		width: 100%;
		height: 60px;
		float: left;
    padding: 5px;
    border-bottom: 1px solid;
    border-color:rgba(232, 228, 228, 0.87);
	}
  .img_logos{
    width: 60px;
    height: 60px;
    border-radius: 100%;
  }
  .all_user span{
    margin: 0 10px;
  }
</style>
	<div class="center-component">
		<div class="content-menu">
			<menu>
				<li><a href="/"><img src="../image/Logo.png"> </a></li>
				<li><a href="admin.php">Мои настройки</a></li>
				<li ><a href="add_post.php">Добавить запись</a></li>
        <li><a href="all_post.php">Все записи</a></li>
        <li style="background-color: rgba(149, 145, 145, 0.22);"><a href="all_user.php">Все пользователи</a></li>
        <li><a href="">Заблокированные пользователи</a></li>
        <li><a href="">Комментарии</a></li>
        <li><a href="add_museum.php">Добавить музей</a></li>
        <li><a href="all_museum.php">Все музеи</a></li>
				<li><a href="../ws-user/out.php">Выйти</a></li>
			</menu>
		</div>	
		<div class="content"> 
			<div class="title"><span>Все пользователи  </span></div>
			<div class="setting">
                <form action="save_user.php" method="post">
               		<div class="e_setting"> <input type="checkbox" name="total" value="checkboxAll" onClick="checkAll(this.form,'select[]',this.checked)">Выбрать все
                              <? 
                                include('../bd.php');
                                $result = "SELECT * FROM user";
                                $myrow = mysql_query($result,$db);
                        if (mysql_num_rows($myrow) > 0 ){
                         $row = mysql_fetch_array($myrow);
                         $user_q = 0;
                          do{ $user_q++;
                           echo "<div class='all_user'>
								         <input type='checkbox' name='select[]' value='".$row['id']."' > <span>id : ".$row['id']."</span><img class='img_logos' src='../ws-user/i/".$row['user_logo']."'> 
                         <span style='color:red;'>Имя </span><span>".$row['name']."</span> 
                         <span style='color:blue;'> Ник </span> <span>".$row['username']."</span>
                         <span style='color:red;'>Почта </span><span>".$row['email']."</span> 

                           </div>";

                          }
                         while ( $row = mysql_fetch_array($myrow));
                       }
       ?>             
                        </div>       
                      </div>
                      <span>Всего пользователей : <?echo $user_q;?> </span> <br>
               			 <input style="margin-top:10px " class="new_post" style="clear:both;" type="submit" name="" value="Удалить">
               		</div>
              </form>
			</div>
		</div>

	</div>
</body>
</html>
