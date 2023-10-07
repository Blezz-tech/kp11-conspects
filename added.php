<?php
// $csv_path = "./db/index.csv";
// $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// $csv_handle = fopen($csv_path, "a");
// fputcsv(
//   $csv_handle,
//   $arr
// );

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