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
$csv_path = "./db/index.csv";
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$csv_handle = fopen($csv_path, "a");
fputcsv(
  $csv_handle,
  $arr
);

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