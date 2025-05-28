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

# echo '<pre>' . print_r($data, 1) . '</pre>'

// foreach ($data as $row) {
//     echo "<div><p>Код товара ".$row['id']."</p>";
//     echo "<p>Наименование товара ".$row['title']."</p></div>";
// }

?>

<?php foreach($data as $row): ?>
    <div>
        <p>Код товара <?=$row['id']?></p>
        <p>Наименование товара <?=$row['title']?></p>
    </div>
<?php endforeach?>
