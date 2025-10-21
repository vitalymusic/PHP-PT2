<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <h1>ielogoties</h1>  

      <form action="save.php" method="POST">
            <input type="text" name="username" id="">
            <input type="password" name="password" id="">

            <button type="submit">Login</button>
      </form>

      <?php 
        var_dump($_SESSION);
      
      ?>
      <?php if(isset($_SESSION["error"])):?>
            <div class="alert"><?=$_SESSION["error"]?></div>
      <?php endif?>  

</body>
</html>