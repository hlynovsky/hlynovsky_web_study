    <?php
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *, Authorization');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Credentials: true');
        header('Content-type: json/application');
        
        error_reporting(E_ALL);
       
        require_once ('pdoConnectDB.php');

        $q = ($_GET['q']);
        $params = explode('/', $q);
 
        $type = $params[0];
        if(isset($params[1])){
            $id = $params[1];
        }

        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'GET'){
            if($type === 'news'){
                require ('getNews.php');
                if(isset($id)){
                    getNews($id);
                }
                else{
                    getNews(0);
                }
            }
        } elseif($method === 'POST'){
            if($type === 'news'){
                require ('addNews.php');
                addNews($_POST);
            }

        } elseif($method === 'PATCH'){
            if($type === 'news'){
                if(isset($id)){                    
                    require ('updateNews.php');

                    $data = file_get_contents ('php://input');
                    $data = json_decode ($data , JSON_UNESCAPED_UNICODE);
                    updateNews($id,$data);
                }
            }

        }
        elseif($method === 'DELETE'){
            if($type === 'news'){
                if(isset($id)){                    
                    require ('deleteNews.php');                   
                    deleteNews($id);
                }   
            }

        }

    ?>
