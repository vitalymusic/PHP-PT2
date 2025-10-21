<?php 
    session_start();
    if($_SESSION["loggedIn"]==false){
        header("location: login.php");
        exit();
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrēšanas panelis</title>
</head>
<body>
        <h1>Administrēšanas panelis</h1>
        <h2>Labdien, <?=$_SESSION["username"]?></h2>

        <a href="save.php?logout=true">Izlogoties</a>
</body>
</html>