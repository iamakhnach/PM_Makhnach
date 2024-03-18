<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Сервис оргтехники</title>
       
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
                <li><a href="price-list.php">Прайс-лист</a></li>
                <li><a href="contacts.html">Контакты</a></li>
            </ul>
        </section>

        <h1 align="center">Прайс-лист</h1>

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
        $sql = "SELECT Name, Price  FROM Price_List"; 
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) 
        { 
        echo "<table class='table'><tr><th>Название услуги</th><th>Цена</th></tr>"; 
            while($row = $result->fetch_assoc()) 
            { 
                echo "<tr><td>".$row["Name"]."</td><td>".$row["Price"]."</td></tr>"; 
            } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "нет записей"; 
        } 

        $conn->close(); 
        ?>        
    </body>
</html>