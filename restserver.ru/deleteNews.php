<?php

    function deleteNews($id){  

        try {                        
            $pdo = pdoConnectDB();
            
            $sql = "delete from `news` where `news`.`id` = '$id'";
            
                                
            $statement = $pdo->prepare($sql);
            $statement -> execute();                               

            http_response_code(200);
            $res = [
                "status"=>true,
                "message"=> "Запись удалена"
            ];
            
            $statement=null;
            $pdo=null;  
            echo json_encode ($res, JSON_UNESCAPED_UNICODE);
           
       } catch (PDOException $e){
               echo "<br>ERROR:Connection to DB FAILED:". $e->getMessage()."<br>";
       }
    }
?>