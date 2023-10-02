<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
</head>
<body>
    
<?php
$host = 'localhost';
$db = 'catalog';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$pdo = new PDO($dsn, $user, $pass);

$res = $pdo->query("SELECT * FROM products");

$data = $res->fetchAll();

?>

<table class="table">
<thead>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>slug</th>
        <th>content</th>
        <th>img</th>
        <th>price</th>
        <th>old_price</th>
        <th>hit</th>
        <th>sale</th>
    </tr>
</thead>
<tbody>
<?php foreach($data as $row): ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['slug']?></td>
        <td><?=$row['content']?></td>
        <td><?=$row['img']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['old_price']?></td>
        <td><?=$row['hit']?></td>
        <td><?=$row['sale']?></td>
    </tr>
<?php endforeach?>
</tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
