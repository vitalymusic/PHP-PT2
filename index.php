<?php 
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    // include("./settings2.php");
    require_once("./settings.php");
?>
    <?php require_once("./head.php");?>
    <?php 
    if(isset($_GET["page"])){

    if($_GET["page"]=="sec1"){

        echo "<h1>Lapa1</h1>";
    } else if($_GET["page"]=="sec2"){
        echo "<h1>Lapa2</h1>";
    }else if($_GET["page"]=="sec3"){
          echo "<h1>Lapa3</h1>";
    }  else{
        echo "<h1>Lapa nav atrasta</h1>";
    } 
     }else{
         echo "<h1>Lapa1</h1>";
     }
    
    // Get vaicājums un GET parametri 
    
    ?>


    <?php require_once("./content.php");?>
    <?php require_once("./footer.php");?>
  
    