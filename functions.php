<?php 
include_once("./db.php");
include_once("./settings.php");


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




    // Idzēšana

    if($_GET["action"]=="delete" ){
        $postID = $conn->real_escape_string(($_GET["id"]));

        $sql = "DELETE FROM `posts` WHERE id='{$postID}'";

        if($conn->query($sql)){
                echo "success";
        }else{
            echo $conn->error;
        }


    }


    // Ielāde pēc id

    if($_GET["action"]=="load" ){

         $postID = $conn->real_escape_string(($_GET["id"]));
         $sql = "SELECT * FROM posts WHERE id={$postID}";
         $result = $conn->query($sql);

         if($result){
            echo json_encode($result->fetch_assoc(),JSON_UNESCAPED_UNICODE);
         }else{
            echo json_encode(["result"=>NULL]);
         }
    }


    if($_GET["action"]=="updatePost" ){

          $data = $_POST;

            // UPDATE `posts` SET `virsraksts`='?',`saturs`='?' WHERE id=?

        $stmt = $conn->prepare("UPDATE `posts` SET `virsraksts`=?,`saturs`=? WHERE id=?");
        $stmt->bind_param('ssi', $data["postNameInput"],$data["postContentInput"],$data["id"]);
        $result = $stmt->execute();



         if($result){
            echo json_encode(array("status"=> "success"));

        }else{
            echo $stmt->error;
        }
        $stmt->close();



    }


    if($_GET["action"]==="addpicture" ){
        $data = $_POST;
        if($_FILES['file']['size'] > 0){
            $uploaddir = 'uploads/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

            $data["imageSrc"] = APP_URL  .  $uploadfile;
        }



        $stmt = $conn->prepare("INSERT INTO bildes (`name`, `url`) VALUES (?, ?)");
        $stmt->bind_param('ss', $data["imageName"],$data["imageSrc"]);
        $result = $stmt->execute();



        // $result = $conn->query($sql);


        if($result){
            echo json_encode(["status"=> "success"]);

        }else{
            echo $stmt->error;
        }
        $stmt->close();
        

    }


    if($_GET["action"]=="showImages"){
             global $conn;

            $sql = "SELECT * FROM bildes";
       
            $result = $conn->query($sql);
            $data = [];
            if($result->num_rows>0){
                  while($row = $result->fetch_assoc()){
                    $data[] = $row;
                  }  


            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);

    }


    if($_GET["action"] == "delImageByID" && isset($_GET["id"])){
            delImagesByID($_GET["id"],$_GET["url"]);
    }


}


function get_posts(){
    global $conn;

    $sql = "SELECT * FROM posts";
   return $conn->query($sql);
}

function get_pictures(){
    global $conn;

    $sql = "SELECT * FROM bildes";
   return $conn->query($sql);
}


// bilžu dzēšana

function delImagesByID($id,$filename){
    global $conn;
    $id = $conn->escape_string($id);
    $filename = $conn->escape_string($filename);
    $sql = "DELETE FROM bildes WHERE id=$id";

    try{
        $conn->query($sql);
        delImageByFileName($filename);
        echo json_encode(["success"=>true]);
    }
    catch (Exception $error){
        echo json_encode(["error"=>$error->getMessage()]);
    }

}

function delImageByFileName($filename){
    // http://localhost/php-pt2/uploads/images.jpeg

    try{
        
        $imageFileName = explode('/',$filename);
        $fileName = $imageFileName[4] . '/' . $imageFileName[5];
        if(file_exists( $fileName)){
            unlink( $fileName);
        }
        // echo json_encode(["success"=>true]);
    }
    catch(Exception $error){
        echo json_encode(["error"=>$error->getMessage()]);
    }

   

    // var_dump( $imageFileName);

}




















?>



