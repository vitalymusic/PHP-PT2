<?php 
    // Saglabāsim formas datus
    $username = $_POST["username"];
    $password = $_POST["password"];

    // User data

    $login = "administrator";
    $pass = "Qwerty12345";

    if($username == $login && sha1($password) === sha1($pass)){
        echo json_encode(["login"=>"success"]);

    }else{
         echo json_encode(["login"=>"false","error"=>"User is Invalid"]);
    }

    // echo json_encode($_POST, JSON_UNESCAPED_UNICODE);


?>