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
            <h1> dМинязев Ринат Шавкатович (веб-разработчик) </h1>
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
                </h3>
            </div>

            <div id="content">
                <h3>Форма для загрузки файла на сервер</h3>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if($_FILES['filename']['size'] > 1024*3*1024){
                            echo "ERROR: размер файла превыщает 3 MByte";
                        }
                        else{
                            if(is_uploaded_file($_FILES['filename']['tmp_name'])){
                                move_uploaded_file($_FILES['filename']['tmp_name'], $_FILES['filename']['name']);
                                echo "Файл загружен, можно загрузить еще один файл <br/>";
                            }
                            else{
                                echo "ERROR: файл не загружен";
                            }

                        }
                    }
                ?>

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="filename" id="">
                    <br/>
                    <input type="submit" value="Загрузить">
                </form>

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