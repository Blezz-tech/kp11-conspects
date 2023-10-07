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

$csv = array_map(function ($x) {
  return str_getcsv($x);
}, explode("\n", file_get_contents($csv_path)));

$csv_t = array_map(function ($arr) {
  return [
    count(array_filter($arr, function ($x) {
      return $x == 1;
    })),
    count(array_filter($arr, function ($x) {
      return $x == 2;
    })),
    count(array_filter($arr, function ($x) {
      return $x == 3;
    })),
    count(array_filter($arr, function ($x) {
      return $x == 4;
    })),
    count(array_filter($arr, function ($x) {
      return $x == 5;
    }))
  ];
}, transpose($csv));



function background($row, $cell)
{
  return (max($row) == $cell)
    ? "bg-success"
    : (min($row) == $cell
      ? "bg-danger"
      : "bg-info");
}
function transpose($array)
{
  return array_map(null, ...$array);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
  <div id="app">
    <div class="container text-center">
      <h1 class="fs-1">Survey Name</h1>
      <p>Subtitle for the Survey Name</p>
    </div>
    <div class="container">
      <?php foreach ($csv_t as $row_k => $row) : ?>
        <?php if ($row_k == 0) : ?>
          <h5 class="fs-5 text-center">Results with perceentages</h5>
        <?php endif; ?>

        <?php if ($row_k == 4) : ?>
          <h5 class="fs-5 text-center">Results with ratings</h5>
        <?php endif; ?>

        <h3 class="fw-blod fs-6">Question #<?= $row_k + 1 ?>: Lorem ipsum dolor sit amet consectetur adipisicing elit?</h3>

        <?php if ($row_k < 4) : ?>
          <?php foreach ($row as $key => $cell) : ?>
            <div class="row">
              <div class="col-12 col-md-6">
                <p class="mb-1">Answer for radio <?= $key + 1 ?></p>
              </div>
              <div class="col-12 col-md-6">
                <div class="progress">
                  <div class="progress-bar <?= background($row, $cell) ?>" role="progressbar" style="width:<?= $cell / array_sum($row) * 100 ?>%">
                    <?= round($cell / array_sum($row) * 100) ?>%
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        <?php else : ?>
          <div class="row">
            <div class="col-12 col-md-6">
              <p class="mb-1">Answer distribution</p>
            </div>
            <div class="col-12 col-md-6">
              <div class="progress">
                <?php foreach ($row as $key => $cell) : ?>
                  <div class="progress-bar <?= background($row, $cell) ?>" role="progressbar" style="width:<?= $cell / array_sum($row) * 100 ?>%">
                    <?= round($cell / array_sum($row) * 100) ?>%
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>

        <?php endif; ?>

        <?php if ($row_k !== 9 && $row_k !== 3) : ?>
          <hr>
        <?php endif; ?>

      <?php endforeach ?>
    </div>
    <div class="container"></div>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>