<!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
    <title>Статья</title>
    <style>
       p
       {
           font-family: Calibri,sans-serif;
           font-size:20px;
           padding-top: 0;

       }

        #one
        {font-family: Calibri,sans-serif;
            font-size: 50px;
            border-bottom-style: dotted;
            border-bottom-width: thin;
            color:black;
        }
        div
        {
            border-bottom-style: dotted;
            border-bottom-width: thin;
        }

    </style>
</head>
<body>


<?php include_once "connection.php"?>
<?php
    $id=$_GET['id'];

    if ($result = mysqli_query($link, "SELECT * FROM news where id='".$id."'"))
    {

    while($row = mysqli_fetch_assoc($result))
      {
        echo "<p id='one'>".$row['title']."</p>";
        echo "<div><p>".$row['content']."</p></div>";
        echo "<br>";
      }

     echo "<a href='news.php' style='font-size: 25px;font-family: Calibri,sans-serif;'>Все новости > ></a>";

     mysqli_free_result($result);

    }
?>
</body>
</html>