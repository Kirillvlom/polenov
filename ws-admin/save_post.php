<? session_start();
mb_internal_encoding("UTF-8");
$new_photo = $_FILES['picture']['name'];
  $tempfile = $_FILES['picture'] ['tmp_name'];
  if (is_uploaded_file($tempfile)){
    if (!copy($tempfile, "../ws-content/p/".$_FILES['picture']['name'])){
      echo "Не удалось загрузить файл";
    } else{
     /* echo "Файл {$_FILES['picture']['name']} 
      ({$_FILES['picture'] ['size']}байт) загружен успешно";*/

    }
  } elseif (!empty($_FILES['picture']['name'])) {
    echo "Не удалось загрузить файл ";
  }

 $selection = $_POST['select'];
 

 if ( isset($_POST ['new_title'] )) { $new_title = $_POST ['new_title']; if ($new_title == '') { unset($new_title);}}
 if ( isset($_POST ['new_text'] )) { $new_text = $_POST ['new_text']; if ($new_text == '') { unset($new_text);}}

if (!empty($new_title) or !empty($new_text) or !empty($new_photo)){
    
  $new_title = stripslashes($new_title);
  $new_title = htmlspecialchars($new_title);
 
  $new_title = trim($new_title);

  include ("../bd.php");
   $new_title = mysql_real_escape_string($new_title);

function lat($new_title)
{
$char=array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','з'=>'z','и'=>'i',
'й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',' '=>'_',
'у'=>'u','ф'=>'f','х'=>'h',"'"=>'','ы'=>'i','э'=>'e','ж'=>'zh','ц'=>'ts','ч'=>'ch','ш'=>'sh',
'щ'=>'j','ь'=>'','ю'=>'yu','я'=>'ya','Ж'=>'ZH','Ц'=>'TS','Ч'=>'CH','Ш'=>'SH','Щ'=>'J',
'Ь'=>'','Ю'=>'YU','Я'=>'YA','ї'=>'i','Ї'=>'Yi','є'=>'ie','Є'=>'Ye','А'=>'A','Б'=>'B','В'=>'V',
'Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N',
'О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ъ'=>"'",'Ы'=>'I','Э'=>'E');
$new_title=strtr($new_title,$char);
return $new_title;
}

$newe_title = lat($new_title);
   $fp_url = "../ws-content/t/$newe_title.txt";
   $fp =fopen($fp_url,"w+");
   fwrite($fp, $new_text);
   fclose($fp);

   $date_post = date("j F Y G:i");
//$new_title
//new_text  записывается в .txt
//$fp_url адрес текста записи
//$new_photo фотография 
//$selection музей
   // t/ - папка с текстом постов
   // p/ - папка с картинками постов
   // e/ - папка с картинками музеев
   // i/ - папка с аватарками пользователей



      $result = mysql_query("SELECT title FROM post WHERE title='$new_title'",$db);
      $myrow = mysql_fetch_array($result);
    if (!empty($myrow['title'])) {
        exit ("<script> alert(\"Запись с таким же название уже существует.\"); 
        window.location = \"add_post.php\"; </script>");
    }
    $result2 = mysql_query ("INSERT INTO post (title, url_text , img_post,date_post, id_museum) VALUES('$new_title','$fp_url','$new_photo','$date_post', '$selection')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
        echo "<script> alert(\"Вы успешно добавили запись\"); 
        window.location = \"add_post.php\"; </script>";
    }
    else {
        echo "<script> alert(\"Ошибка\"); 
        window.location = \"add_post.php\"; </script>";

    }

} else{

}


/**
  if ( isset($_POST ['new_name_museum'] )) { $new_name_museum = $_POST ['new_name_museum']; if ($new_name_museum == '') { unset($new_name_museum);}}
  if ( isset ($_POST ['new_link_museum'] )) { $new_link_museum = $_POST ['new_link_museum']; if ($new_link_museum == '') { unset($new_link_museum);}}

  $new_img_museum = $_FILES['picturee']['name'];
  $tempfile = $_FILES['picturee'] ['tmp_name'];
  if (is_uploaded_file($tempfile)){
    if (!copy($tempfile, "../ws-content/e/".$_FILES['picturee']['name'])){
      echo "Не удалось загрузить файл";
    } else{
      echo "Файл {$_FILES['picturee']['name']} 
      ({$_FILES['picturee'] ['size']}байт) загружен успешно";

    }
  } elseif (!empty($_FILES['picture']['name'])) {
    echo "Не удалось загрузить файл ";
  }
echo "<script> alert($new_img_museum);</script>";
  if (!empty($new_name_museum) or !empty($new_link_museum) or !empty($new_img_museum)){
      $new_name_museum = stripslashes($new_name_museum);
      $new_name_museum = htmlspecialchars($new_name_museum);
      $new_link_museum = stripslashes($new_link_museum);
      $new_link_museum = htmlspecialchars($new_link_museum);

      $new_link_museum = trim($new_link_museum);
      $new_name_museum = trim($new_name_museum);

     include ("../bd.php");
      $new_name_museum = mysql_real_escape_string($new_name_museum);
      $new_link_museum = mysql_real_escape_string($new_link_museum);

       $result = mysql_query ("INSERT INTO museum (name_museum, link_museum , img_museum) VALUES('$new_name_museum','$new_link_museum','$new_img_museum')");
        if ($result=='TRUE')
    {
        echo "<script> alert(\"Запись успешно добавлена\"); 
        window.location = \"add_museum.php\"; </script>";
    }
    else {
        echo "Ошибка! Вы не зарегистрированы.";
    }


  } else{
   exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=ws-user/cabinet.php'></head></html>");
}*/
?>