<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "restserver_ru";
$password = "123456";
$dbname = "restserver_ru";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM news";
$result = $conn->query($sql);

$news = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
    echo json_encode($news);
} else {
    echo "[]";
}

$conn->close();
?>
