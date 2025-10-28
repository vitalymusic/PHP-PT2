<?php include_once("./db.php");


if(isset($_GET["action"])){
    if($_GET["action"]=="savePost"){
        // Saglabāšana

        $data = $_POST;

        echo json_encode($data);
        


    };








}











?>



