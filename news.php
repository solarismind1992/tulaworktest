<?php include_once "connection.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

</head>
<body>
<h1>Новости</h1>
<div id="content">
    <?php //Узнаю текущую страницу

         if (isset($_GET['page']))
           {
              if ($_GET['page']==null)
                 $pg=1;
              else
                 $pg=$_GET['page'];
           }
         else
           {
                 $pg=1;
           }

         //Вывожу 5 записей
         if ($result = mysqli_query($link, "SELECT * FROM news ORDER BY idate LIMIT ".(5*($pg-1)).",5"))
           {
               while( $row = mysqli_fetch_assoc($result))
                  {
                     echo "<br>";
                     echo "<span class='date'>".gmdate('m.d.y',$row['idate'])."</span>";
                     echo "<a href='view.php?id=".$row['id']."'<span class='title'>".$row['title']."</span></a>";
                     echo "<br>";
                     echo "<span class='announce'>".$row['announce']."</span>";
                     echo "<br>";
                  }
                     mysqli_free_result($result);
           }
    ?>
</div>
<div id="footer">
    <strong><p id="page"> Страницы:</p></strong>

    <?php
    //Вывожу кнопки-ссылки на другие страницы
         $num_rows=0;
            if ($result=mysqli_query($link,'SELECT*FROM news'))
                 {
                    $num_rows=mysqli_num_rows($result);
                     mysqli_free_result($result);
                 }
            mysqli_close($link);

    //for ($x=1;$x<=($num_rows)/5+1;$x++)
      //  echo "<div  class='foot' id='".$x."'><a href='?page=".$x."' class='col' style='text-decoration:none;color:black'>".$x."</a></div>"
    for ($x=1;$x<=($num_rows)/5+1;$x++) {
        $active_class = '';
          if($x == $pg) {
              $active_class = ' active';
          }

        echo "<div  class='foot' id='".$x."'><a href='?page=".$x."' class='col" . $active_class . "' style='text-decoration:none;color:black'>".$x."</a></div>";
}
    ?>

</div>
</body>
</html>