<?php 
    session_start();

    // Saglabāsim formas datus
    $username = $_POST["username"];
    $password = $_POST["password"];

    // User data

    $login = "administrator";
    $pass = "Qwerty12345";



    if($username == $login && sha1($password) === sha1($pass)){
       $_SESSION["loggedIn"]= true;
       $_SESSION["username"] =  $_POST["username"];
        $_SESSION["error"] = ""; 

        echo json_encode(["login"=>"success"]);
        
        header("location: admin.php");

    }else{
        $_SESSION["loggedIn"]= false;
        $_SESSION["username"] = "";
        $_SESSION["error"] = "Nepareizs lietotājvārd un vai parole";
        

        echo json_encode(["login"=>"false","error"=>"User is Invalid"]);
        header("location: login.php");
    }

    // echo json_encode($_POST, JSON_UNESCAPED_UNICODE);


?>