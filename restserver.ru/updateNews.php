<?php

    function updateNews($id, $data){    
      

        try {                        
            $pdo = pdoConnectDB();
            $title = $data['title'];
            $content = $data['content'];
            $sql = "update `news` set `title` = '$title', `content`= '$content' where `news`.`id` = '$id'";
            
                                
            $statement = $pdo->prepare($sql);
            $statement -> execute();                               

            http_response_code(200);
            $res = [
                "status"=>true,
                "message"=> $id
            ];
            
            $statement=null;
            $pdo=null;  
            echo json_encode ($res, JSON_UNESCAPED_UNICODE);
           
       } catch (PDOException $e){
               echo "<br>ERROR:Connection to DB FAILED:". $e->getMessage()."<br>";
       }
    }
?>