<?php
    $theme = "";

    if($_GET["theme"] ){
          $theme = "dark";
    }else{
        $theme = "light";
    }

    setcookie("theme",$theme);
    header("location:index.php?page=sec1");
    

?>