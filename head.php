<!DOCTYPE html>
<html lang="<?=$lang?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css" integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style.css" />


    <title><?=$title?></title>
</head>

<?php 

    if( !isset($_COOKIE["theme"])){
        $_COOKIE["theme"] = "light";
    }
    $theme = $_COOKIE["theme"];

?>
<body class="<?=$theme?>"> 
    <?php include("./nav.php") ?>
    <?php if($_COOKIE["theme"]=="dark"):?>
         <a href="theme.php">Light theme</a>
    <?php else:?>
        <a href="theme.php?theme=dark">Dark theme</a>
    <?php endif ?>