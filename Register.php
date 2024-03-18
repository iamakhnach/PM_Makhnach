<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "PM"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка при подключении: " . $conn->connect_error);
}
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$email = $_POST['email'];
$password = $_POST['password'];
$ID_Role = 1;
$ID_Status = 1;

$sql = "INSERT INTO Users (Name, Surname, Patronymic, Email, Password, ID_Role, ID_Status) VALUES ('$name', '$surname', '$patronymic', '$email', '$password', '$ID_Role', '$ID_Status')";

$stmt = $conn->prepare("SELECT * FROM users WHERE Email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "Такой логин уже занят";
} else {
    if ($conn->query($sql) === TRUE) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}
$stmt->close();
$conn->close();
?>