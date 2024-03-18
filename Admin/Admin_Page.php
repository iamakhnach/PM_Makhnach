<!DOCTYPE html>
<html>

<head>
    <title>Админ панель</title>
    <style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: 20px auto;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    form {
        width: 50%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ccc;
    }
    input[type="text"] {
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<link rel="stylesheet" href="BurgerMenuStyle.css">
</head>

<body>
<section class="top-nav">
        <div>
            Сервис ремонта оргтехники
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a href="Admin_Page.php">Клиенты</a></li>
            <li><a href="Zakaz.php">Заказы</a></li>
        </ul>
    </section>
    <h1 align="center">Клиенты</h1>
    <?php 
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "PM"; 

    $conn = new mysqli($servername, $username, $password, $dbname); 
    if ($conn->connect_error) 
    { 
        die("Ошибка подключения: " . $conn->connect_error); 
    } 

    $sql = "SELECT ID_Client, Name, Surname, Patronymic, Number_Phone FROM Clients"; 
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        echo "<table><tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Отчество</th><th>Номер телефона</th></tr>"; 
            while($row = $result->fetch_assoc()) 
            { 
                echo "<tr><td>".$row["ID_Client"]."</td><td>".$row["Name"]."</td><td>".$row["Surname"]."</td><td>".$row["Patronymic"]."</td><td>".$row["Number_Phone"]."</td></tr>"; 
            } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "0 results"; 
        } 

        echo "<form action='insert_data.php' method='post'>"; 
        echo "Имя: <input type='text' name='Name' ><br>"; 
        echo "Фамилия: <input type='text' name='Surname'><br>"; 
        echo "Отчество: <input type='text' name='Patronymic'><br>"; 
        echo "Номер телефона: <input type='text' name='Number_Phone'><br>";       
        echo "<input type='submit' value='Добавить'><br>"; 
        
        echo "ID: <input type='text' name='ID_Client'>";  
        
        echo "<input type='submit' value='Изменить'><br><br>"; 
        echo "<input type='submit' value='Удалить'>"; 
        echo "</form>"; 

        $conn->close(); 
    ?>
</body>

</html>