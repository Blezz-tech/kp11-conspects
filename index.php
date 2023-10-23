<?php

$tables = json_decode(file_get_contents("./var/course.json"), true);
$studnets = [1, 2, 3, 4, 5, 6];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>

<body>
  <?= file_get_contents("./components/nav.php")?>
  <h1 class="mt-3 text-center">Курсы</h1>
  <h2 class="mt-3 text-center">Форма</h2>
  <div class="container">
    <form action="" method="post">
      <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="ФИО">
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="coure" placeholder="Какие курсы вас заинтересовали?">
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="phone" placeholder="+7 (999) 999-99-99">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <h2 class="mt-3 text-center">Таблица</h2>
  <div class="container">
    <?php foreach ($tables as $key => $value) : ?>
      <div class="mb-5">
        <h4 class="text-center mb-3"><?= $key ?></h4>
        <table class="table table-striped">
          <tr class="row">
            <th scope="col" class="col-5">Название</th>
            <th scope="col" class="col-4">Длительность курса</th>
            <th scope="col" class="col-2">Стоимость обучения</th>
            <th scope="col" class="col-1">Возраст</th>
          </tr>
          <?php foreach ($value as $course) : ?>
            <tr class="row">
              <td scope="col" class="col-5"><?= $course["Название"] ?></td>
              <td scope="col" class="col-4"><?= ($course["Длительность курса"] == "" ? "" : $course["Длительность курса"] . " часов") ?></td>
              <td scope="col" class="col-2"><?= ($course["Стоимость обучения"] == "" ? "" : $course["Стоимость обучения"] . " руб") ?></td>
              <td scope="col" class="col-1"><?= $course["Возраст"] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    <?php endforeach; ?>
  </div>
  <h2 class="mt-3 text-center">Фотокарточки с занятий</h2>
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach ($studnets as $i) : ?>
          <div class="carousel-item <?= $i == 1 ? "active" : "" ?>">
            <img src="/assets/img/kp-student-<?= $i ?>.jpeg" class="d-block w-100" alt="...">
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <h2 class="mt-3 text-center">Информация для абитуриента</h2>
  <div class="container">
    <div class="list-group">
      <a target="_blank" href="./assets/documents/Музыкальное звукооператорское мастерство программа.pdf" class="list-group-item list-group-item-action">Вступительные испытания "Музыкальное звукооператорское мастерство"</a>
      <a target="_blank" href="./assets/documents/anim_compressed.pdf" class="list-group-item list-group-item-action">Вступительные испытания "Анимация и анимационное кино (по видам)"</a>
      <a target="_blank" href="./assets/documents/Театральная и аудиовизуальная техника программа.pdf" class="list-group-item list-group-item-action">Вступительные испытания "Театральная и аудиовизуальная техника"</a>
      <a target="_blank" href="./assets/documents/54.02.08 Техника и искусство фотографии.pdf" class="list-group-item list-group-item-action">Вступительные испытания "Техника и искусство фотографии"</a>
      <a target="_blank" href="https://kp11.mskobr.ru/postuplenie-v-kolledzh/priemnaya-komissiya" class="list-group-item list-group-item-action">Документы при поступлении</a>
      <a target="_blank" href="./assets/documents/Сводка ежедневная 22.08.pdf" class="list-group-item list-group-item-action">Количество поданных заявлений</a>
      <a target="_blank" href="https://rutube.ru/video/d7b89293659d939acaa3054784aeee23/" class="list-group-item list-group-item-action">Как подать документы на mos.ru</a>
      <a target="_blank" href="https://kp11.mskobr.ru/postuplenie-v-kolledzh/priemnaya-komissiya" class="list-group-item list-group-item-action">Предварительный медицинский осмотр</a>
      <a target="_blank" href="https://kp11.mskobr.ru/postuplenie-v-kolledzh/priemnaya-komissiya" class="list-group-item list-group-item-action">Документы приемной комиссии</a>
      <a target="_blank" href="https://kp11.mskobr.ru/postuplenie-v-kolledzh/specialnosti-professii" class="list-group-item list-group-item-action">Контрольные цифры приема</a>
    </div>
  </div>
  <?= file_get_contents("./components/footer.php")?>
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>