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
  <h2 class="mt-3 text-center">Контакты</h2>
  <div class="container">
    <p>+7(499)1-504-504</p>
    <p>priem@kp11.ru</p>
    <p>Москва, Ленинградское шоссе, д.13А</p>
    <a href="https://vk.com/gapoukp11" target="_blank" rel="nofollow noopener" style="width: 30px; height: 30px;"><svg class="t-sociallinks__svg" width="30px" height="30px" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M50 100c27.614 0 50-22.386 50-50S77.614 0 50 0 0 22.386 0 50s22.386 50 50 50ZM25 34c.406 19.488 10.15 31.2 27.233 31.2h.968V54.05c6.278.625 11.024 5.216 12.93 11.15H75c-2.436-8.87-8.838-13.773-12.836-15.647C66.162 47.242 71.783 41.62 73.126 34h-8.058c-1.749 6.184-6.932 11.805-11.867 12.336V34h-8.057v21.611C40.147 54.362 33.838 48.304 33.556 34H25Z" fill="#000000"></path>
      </svg></a>
    <a href="https://t.me/joinchat/S1XweP3xiGDN4PvT" target="_blank" rel="nofollow noopener" style="width: 30px; height: 30px;"><svg class="t-sociallinks__svg" width="30px" height="30px" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M50 100c27.614 0 50-22.386 50-50S77.614 0 50 0 0 22.386 0 50s22.386 50 50 50Zm21.977-68.056c.386-4.38-4.24-2.576-4.24-2.576-3.415 1.414-6.937 2.85-10.497 4.302-11.04 4.503-22.444 9.155-32.159 13.734-5.268 1.932-2.184 3.864-2.184 3.864l8.351 2.577c3.855 1.16 5.91-.129 5.91-.129l17.988-12.238c6.424-4.38 4.882-.773 3.34.773l-13.49 12.882c-2.056 1.804-1.028 3.35-.129 4.123 2.55 2.249 8.82 6.364 11.557 8.16.712.467 1.185.778 1.292.858.642.515 4.111 2.834 6.424 2.319 2.313-.516 2.57-3.479 2.57-3.479l3.083-20.226c.462-3.511.993-6.886 1.417-9.582.4-2.546.705-4.485.767-5.362Z" fill="#000000"></path>
      </svg></a>
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
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>