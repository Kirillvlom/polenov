<? session_start();

  if ( isset($_POST ['new_name_museum'] )) { $new_name_museum = $_POST ['new_name_museum']; if ($new_name_museum == '') { unset($new_name_museum);}}
  if ( isset ($_POST ['new_link_museum'] )) { $new_link_museum = $_POST ['new_link_museum']; if ($new_link_museum == '') { unset($new_link_museum);}}

  $new_img_museum = $_FILES['picturee']['name'];
  $tempfile = $_FILES['picturee'] ['tmp_name'];
  if (is_uploaded_file($tempfile)){
    if (!copy($tempfile, "../ws-content/e/".$_FILES['picturee']['name'])){
      echo "Не удалось загрузить файл";
    } else{
      /*echo "Файл {$_FILES['picturee']['name']} 
      ({$_FILES['picturee'] ['size']}байт) загружен успешно";*/
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
}
?>