<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    
    <title>Document</title>
</head>

    <body>
            
    <div id="page">
        
        <div id="header">
            <h1> Минязев Ринат Шавкатович (веб-разработчик) </h1>
        </div>   
    

        <div id="main">
            <div id="menu">
                <h3>
                    <p> <a href="index.html">Главная</a></p>
                    <p> <a href="jsexamples.html">Примеры JS</a></p>
                    <p> <a href="colorcalcform.html">Форма цвета</a></p>                    
                    <p> <a href="phpexamples.php">Примеры PHP</a></p>
                    <p> <a href="calcform.php">Калькулятор PHP</a></p>
                    <p> <a href="uploadFileForm.php">Загрузка файла PHP</a></p>
                    <p> <a href="registrationForm.html">Форма регистрации</a></p>                    
                </h3>
            </div>

            <div id="content">
                <?php
                    //echo "<h1>обработка формы регистрации</h1>";
                    if($_POST){
                        $firstName=trim($_POST['firstName']);
                        $lastName=trim($_POST['lastName']);
                        $email=trim($_POST['email']);
                        $city=trim($_POST['city']);
                        $age=trim($_POST['age']);
                        $pass=trim($_POST['pass']);                        
                        $pass_r=trim($_POST['pass_r']);                        
                        $gender=trim($_POST['gender']);
                        echo "<br> данные: $firstName, $lastName, $email,  $city, $age, $pass, $pass_r, $gender";
                        $error = false;
                        $errortext="<p><b> <font color='red'>При регистрации возникли следующие ошибки </font></b></p> <ul>";
                    
                        if(empty($email)){
                            $error=true;
                            $errortext.="<li><font color='red'> Вы не заполнили поле email! </font></li>";
                        }
                        if(!preg_match("/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i", $email)){
                            $error=true;
                            $errortext.="<li><font color='red'> Поле email заполнено некорректно! </font></li>";
                        }
                        if(empty($firstName)){
                            $error=true;
                            $errortext.="<li><font color='red'> Вы не заполнили поле имя! </font></li>";
                        }
                        if(empty($lastName)){
                            $error=true;
                            $errortext.="<li><font color='red'> Вы не заполнили поле фамилия! </font></li>";
                        }
                        if(empty($city)){
                            $error=true;
                            $errortext.="<li><font color='red'> Вы не заполнили поле город! </font></li>";
                        }
                        if(empty($age)){
                            $error=true;
                            $errortext.="<li><font color='red'> Вы не заполнили поле возраст! </font></li>";
                        }
                        if(empty($pass)){
                            $error=true;
                            $errortext.="<li><font color='red'> Вы не заполнили поле пароль! </font></li>";
                        }
                        if(!preg_match("/^[a-zA-Z0-9]{3,20}$/i", $pass)){
                            $error=true;
                            $errortext.="<li><font color='red'>Убедитесь что пароль нормальный (от 3 до 20 символов)</font></li>";
                        }
                        if($pass!=$pass_r){
                            $error=true;
                            $errortext.="<li><font color='red'>пароль и подтверждение не совпадают </font></li>";
                        }

                        if($error){
                            echo $errortext;
                        } else{

                            // подключиться к БД
                            
                            include ('libphp/pdoConnectDB.php');
                            
                            try {                        
                                $pdo = pdoConnectDB();                     

                                $sql = "select user_id from users where email='$email'";
                                $statement=$pdo->query($sql);
                                if($statement->rowCount()!=0){
                                    echo "<br> Извините, данный email уже занят";
                                }
                                else{

                                    $sql = "insert into users (email, firstname, lastname, city, password, age, gender)  
                                    values ('$email', '$firstName', '$lastName', '$city', '$pass', $age, '$gender')";
                                
                                    $statement = $pdo->prepare($sql);
                                    $statement -> execute();
                                    
                                    $statement=null;
                                    $pdo=null;
                                    echo "<br>Пользователь зарегистрирован";
                                }                            


                            } catch (PDOException $e){
                                echo "<br>ERROR:Connection to DB FAILED:". $e->getMessage()."<br>";
                            }          
   
                        }
                    }                   
                     
                    echo "<br><a href='getAllRegisteredUsers.php'> Cписок всех зарегистрированных пользователей</a>";
                ?>
            </div>
        </div>
        
        <div id="projects">
                <h2>Примеры выполненных мною проектов </h2>
        </div>
        
        <div class="block">Проект1</div>
        <div class="block">Проект2</div>
        <div class="block">Проект3</div>  
    
    </div>  

</body>

</html>