<?php

    function getNews($id){

        try {                        
            $pdo = pdoConnectDB();
            if($id == 0){
                $sql = "select * from news";
            }
            else{
                $sql = "select * from news where id = ".$id;
            }

            $statement=$pdo->query($sql);            
            $newsList = [];


            while($row=$statement->fetch()){
                $newsList[]=$row;
            }  
            
            if(empty($newsList)){
                http_response_code(404);
                $res = [
                    "status"=>false,
                    "message"=>"Новость не найдена"
                ];
                echo json_encode ($res, JSON_UNESCAPED_UNICODE);
            }
            else{
                echo json_encode ($newsList, JSON_UNESCAPED_UNICODE);
            }

       } catch (PDOException $e){
               echo "<br>ERROR:Connection to DB FAILED:". $e->getMessage()."<br>";
       }
    }
?>