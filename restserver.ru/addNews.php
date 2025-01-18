<?php

    function addNews($data){

        try {                        
            $pdo = pdoConnectDB();
            $title = $data['title'];
            $content = $data['content'];
            $sql = "insert into news (title, content) values ('$title', '$content')";
                                
            $statement = $pdo->prepare($sql);
            $statement -> execute();                                 
              

            http_response_code(201);
            $res = [
                "status"=>true,
                "news_id"=> $pdo->lastInsertId()
            ];
            
            $statement=null;
            $pdo=null;  
            echo json_encode ($res, JSON_UNESCAPED_UNICODE);
           
       } catch (PDOException $e){
               echo "<br>ERROR:Connection to DB FAILED:". $e->getMessage()."<br>";
       }
    }
?>