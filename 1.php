<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Заголовок страницы для браузера</title>
  <link rel="stylesheet" href="/style.css" type="text/css" />
 </head>
 <body>
  <h1>Заголовок страницы</h1>
  <!-- Комментарий -->
  <p>Абзац.</p>
   
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$table="shop";

// Create connection
$conn = new mysqli($servername, $username, $password,$table);

$query = "SELECT product.name,movee.price FROM `movee`
JOIN product ON product.id = movee.idproduct
JOIN magazine ON magazine.id = movee.idshop
WHERE magazine.id=".$_GET["c"];

$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
echo $row["price"]." ".$row["name"]."<br>";
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
 </body>
</html>