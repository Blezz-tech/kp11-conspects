<!-- function randomInRange(start,end){
       return Math.floor(Math.random() * (end - start + 1) + start);
}

console.log(
    [...Array(50).keys()]
    .map(item => [...Array(10).keys()].map(item => randomInRange(1, 5)))
    .map(item => item.join(","))
    .join("\n")
) -->


<?php

$is_normal = true;

foreach (range(1, 10) as $i) {
  $is_normal = $is_normal && array_key_exists("q" . $i, $_POST);
}

if ($is_normal) {
  $arr = [];
  foreach (range(1, 10) as $i) {
    array_push($arr, $_POST["q" . $i]);
  }

  $csv_path = "./db/index.csv";
  $csv_handle = fopen($csv_path, "a");
  fputcsv($csv_handle, $arr);
  fclose($csv_handle);

} else {
  echo "<h1>ОШЫБКА ЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫ</h1>";
  echo '<img src="./img/loli-flex.gif" alt="">';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
  <?php include "./components/navbar.php"; ?>

  <pre>
    <?php
    print_r($_POST);
    ?>
  </pre>

</body>

</html>