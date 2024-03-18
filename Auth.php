<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "PM"; 

$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM Users WHERE Email='$email' AND Password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  session_start();
  $_SESSION['email'] = $email;
  
  if($row['ID_Role'] == 1){
    header('Location: Admin\Admin_Page.php');
  } else {
    header('Location: Client\Price-list.php');
  }
} else {
  echo "Ошибка: неверное имя пользователя или пароль.";
}

$conn->close();
?>