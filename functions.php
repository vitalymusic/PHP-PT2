<?php include_once("./db.php");


if(isset($_GET["action"])){
    if($_GET["action"]=="savePost" ){
        // Saglabāšana

        $data = $_POST;

        // echo json_encode($data);


        //"INSERT INTO posts (title, content) VALUES ('".$data["postNameInput"]."','".$data["postContentInput"]."')";

        // 1.variants (aizsardzība)
        // Lauku datu ekranēšana
        // $postName = $conn->real_escape_string($data["postNameInput"]);
        // $postContent = $conn->real_escape_string($data["postContentInput"]);

        // $sql = "INSERT INTO `posts`(`virsraksts`, `saturs`) VALUES ('{$postName}','{$postContent}')";


        // 2. variants
        // Prepared Statements

        $stmt = $conn->prepare("INSERT INTO posts (`virsraksts`, `saturs`) VALUES (?, ?)");
        $stmt->bind_param('ss', $data["postNameInput"],$data["postContentInput"]);
        $result = $stmt->execute();

        // $result = $conn->query($sql);


        if($result){
            echo json_encode(array("status"=> "success"));
            
        }else{
            echo $stmt->error;
        }
        $stmt->close();
        
    };

    $mysqli->close();
}












?>



