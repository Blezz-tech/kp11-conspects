<?php
$host = 'localhost';
$db = 'market';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
$res = $pdo->query("SELECT * FROM products");
$data = $res->fetchAll();

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="./bootstrap-5.3.0/css/bootstrap.min.css">

  <title>Hello, world!</title>
  <style>
    .card {
      width: 220px;
    }

    .card-info {
      height: 160px;
    }
  </style>
</head>

<body>
  <div class="container m-3 p-3">
    <div class="row gap-3 justify-content-center">
      <?php foreach ($data as $product) : ?>
        <div class="card">
          <div class="card-body card-info">
            <h5 class="card-title"><?= $product['prod_name'] ?></h5>
            <p class="card-text card-price"><?= $product['prod_desc'] ?></p>
          </div>
          <div class="card-body">
            <p class="card-text text-center fw-bold fs-4 text-success"><?= $product['prod_price'] ?></p>
            <a href="#" class="btn btn-primary w-100 p-2">Buy</a>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <script src="./bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>