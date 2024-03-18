<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="BurgerMenuStyle.css">
    <style>
            .table {
	width: 100%;
	margin-bottom: 20px;
	border: 1px solid #dddddd;
	border-collapse: collapse; 
}
.table th {
	font-weight: bold;
	padding: 5px;
	background: #efefef;
	border: 1px solid #dddddd;
}
.table td {
	border: 1px solid #dddddd;
	padding: 5px;
}
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
    <h1 align="center">Заказы</h1>
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

    $sql = "SELECT ID_Zakaza, Kolvo, Price, ID_User, ID_Price, ID_Client FROM Zakaz"; 
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        echo "<table class='table'><tr><th>ID</th><th>Количество</th><th>Цена</th><th>Работник</th><th>Услуга</th><th>Клиент</th></tr>"; 
            while($row = $result->fetch_assoc()) 
            { 
                echo "<tr><td>".$row["ID_Zakaza"]."</td><td>".$row["Kolvo"]."</td><td>".$row["Price"]."</td><td>".$row["ID_User"]."</td><td>".$row["ID_Price"]."</td><td>".$row["ID_Client"]."</td></tr>"; 
            } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "0 results"; 
        } 

        echo "<form action='insert_data.php' method='post'>"; 
        echo "Количество: <input type='text' name='Kolvo' ><br>"; 
        echo "Цена: <input type='text' name='Price'><br>"; 
        echo "Работник: <input type='text' name='ID_User'><br>"; 
        echo "Услуга: <input type='text' name='ID_Price'><br>";  
        echo "Клиент: <input type='text' name='ID_Client'><br>";            
        echo "<input type='submit' value='Добавить'><br>"; 
        
        echo "ID: <input type='text' name='ID_Zakaza'>";  
        
        echo "<input type='submit' value='Изменить'><br><br>"; 
        echo "<input type='submit' value='Удалить'>"; 
        echo "</form>"; 

        $conn->close(); 
    ?>
</body>
</html>