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
                </h3>
            </div>

            <div id="content">
                <h3>Форма калькулятора </h3>
                
                <?php
                    $output='';
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){                   
                        $num1=$_POST['n1'];
                        $num2=$_POST['n2'];
                        $op=$_POST['op'];
                        $output = "$num1 $op $num2 = ";
                        switch($op){
                            case '+': $output .=$num1+$num2; break;
                            case '-': $output .=$num1-$num2; break;
                            case '*': $output .=$num1*$num2; break;
                            case '/': 
                                if($num2 == 0)
                                    $output = "на ноль делить нельзя!";
                                else
                                    $output .=$num1/$num2; 
                                break;
                            default: $output = "Неизвестная операция: $op";                             
                        }
                    }
                ?>

                <!--<form name="color_calc" action="calculateData.php" method="POST" >-->
                <form name="color_calc" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" >
                    <label for="n1">Число 1:</label>
                    <input type="number" name="n1" id="n1">                    
                    <br/>
                    <label for="op">Операция (+, -, *, /):</label>
                    <input type="text" size="1" maxlength="1" name="op" id="op">
                        <br/>
                    <label for="n2">Число 2:</label>
                    <input type="number" name="n2" id="n2"">                    
                    <br/>
                <button type="submit">Посчитать</button>
    
            </form>
            <?php
                if($output){
                    echo "<p>Выражение посчитано:</p>";
                    echo $output;
                }
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