<?php
include 'tampilkanData.php';
$brand = (string)$_GET['brand'];

$sepatu = tampilkan("SELECT * FROM product WHERE brand = '$brand'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>