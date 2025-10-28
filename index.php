<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // include("./settings2.php");
    require_once("./settings.php");
?>
    <?php require_once("./head.php");?>
    <?php 

    if(!isset($_GET["page"])){
        header("location:?page=sec1");
    }

    if($_GET["page"]=="sec1"):?>
        <div class="container">
            <h1><?=$title?></h1>
            <div class="row">
                <div class="col-md-4">1</div>
                <div class="col-md-4">2</div>
                <div class="col-md-4">3</div>
            </div>
        </div>
       

    <?php elseif($_GET["page"]=="sec2"):?>

        <div class="container">
                <h1>Pakalpojumi</h1>
                <div class="row">
                     <?php echo "Dinamiskais saturs" ?>   
                </div>
        </div>
       

      <?php elseif($_GET["page"]=="sec3"):?>

        <div class="container">
                <h1>Raksti</h1>
                <div class="row">
                      <?php  require_once("./posts.php");?>  
                </div>
        </div>
        

    <?php elseif($_GET["page"]=="sec4"): ?>
          <h1>Lapa3</h1>
    <?php else:?>
         <h1>Lapa nav atrasta</h1>
    <?php endif; 
    ?>


    <?php // require_once("./content.php");?>
    <?php require_once("./footer.php");?>
  
    