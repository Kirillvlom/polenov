<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Список записей</title>
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
		width: 1050px;
	}
	.all_user{
		width: 100%;
		height: 250px;
		float: left;
    padding: 5px;
    border-bottom: 1px solid;
    border-color:rgba(232, 228, 228, 0.87);
	}
  .img_logos{
    width: 250px;
    height: 150px;
    border-radius: 10px;
    float: left;
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
        <li style="background-color: rgba(149, 145, 145, 0.22);"><a href="all_post.php">Все записи</a></li>
        <li ><a href="all_user.php">Все пользователи</a></li>
        <li><a href="">Заблокированные пользователи</a></li>
        <li><a href="">Комментарии</a></li>
        <li><a href="add_museum.php">Добавить музей</a></li>
        <li><a href="all_museum.php">Все музеи</a></li>
				<li><a href="../ws-user/out.php">Выйти</a></li>
			</menu>
		</div>	
		<div class="content"> 
			<div class="title"><span>Все записи  </span></div>
			<div class="setting">
                <form action="save_delete_post.php" method="post"> <a href=''></a>
               		<div class="e_setting"> <input type="checkbox" name="total" value="checkboxAll" onClick="checkAll(this.form,'select[]',this.checked)">Выбрать все
                              <? 
                                include('../bd.php');
                                $result = "SELECT * FROM post";
                                $myrow = mysql_query($result,$db);
                        if (mysql_num_rows($myrow) > 0 ){
                         $row = mysql_fetch_array($myrow);
                         $post_q = 0;
                          do{ $post_q++;
                           echo "<div class='all_user'>
								         <div style='float:left;'><input type='checkbox' name='select[]' value='".$row['id_post']."' > <span>id : ".$row['id_post']."</span></div><a href='../templates/post.php?id=".$row['id_post']."'><img class='img_logos' src='../ws-content/p/".$row['img_post']."'> </a>
                        <div style='float:;'> <span style='color:red; line-height:20px'>Название :</span><span>".$row['title']."</span> </div> <br>
                       <div style='float:left;'>  <span style='color:blue;'> Дата публикации : </span> <span>".$row['date_post']."</span></div> <br><pre>
                          

                           </div>";

                          }
                         while ( $row = mysql_fetch_array($myrow));
                       }
       ?>             
                        </div>       
                      </div>
                      <span>Всего записей : <?echo $post_q;?> </span> <br>
               			 <input style="margin-top:10px " class="new_post" style="clear:both;" type="submit" name="" value="Удалить">
               		</div>
              </form>
			</div>
		</div>

	</div>
</body>
</html>
