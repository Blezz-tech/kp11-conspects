<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$_head = file_get_contents($root."/components/meta/_head.html");
$_foot = file_get_contents($root."/components/meta/_foot.html");




$GLOBALS['g_chapters'] = [
    1 => 'Глава 1 Введение',
    2 => 'Глава 2 HTML',
    3 => 'Глава 3 CSS',
    4 => 'Глава 4 Другое'
];

$GLOBALS['g_lessons'] = [
    1 => [
        1 => 'Урок 1 Что такое вёрстка-создание сайтов?',
        2 => 'Урок 2 Подготвка к работе-созданию сайта',
        3 => 'Урок 3 Настройка структуы',
        4 => 'Урок 4 Лучшие браузеры для работы с сайтом'
    ],
    2 => [
        1 => 'Урок 1 Основаня разметка и её свойства',
        2 => 'Урок 2 Правильная разбивка сайта на блоки и составляюшие',
        3 => 'Урок 3 Основные теги для работы',
        4 => 'Урок 4 Правильная структура HTML документа',
        5 => 'Урок 5 Правильный нейминг классов',
    ],
    3 => [
        1 => 'Урок 1 Подговительные работы CSS',
        2 => 'Урок 2 наследование и иерархия классов',
        3 => 'Урок 3 основные свойства CSS для работы',
        4 => 'Урок 4 Медиа запросы и адаптивность',
    ],
    4 => [
        1 => 'Доп источники',
        2 => 'Советы'
    ]
];

function generatorNav() {
    $g_chapters = $GLOBALS['g_chapters'];
    $g_lessons = $GLOBALS['g_lessons'];

    $nav = '<nav class="nav">';
    foreach($g_lessons as $i => $lessons) {
        $nav .= '<div class="chapter">'.
        ($i == $_GET['chapter'] ?
        '<input id="toggle'.$i.'" type="radio" class="chapter-toggle" name="toggle" checked />':
        '<input id="toggle'.$i.'" type="radio" class="chapter-toggle" name="toggle" />'
        ).'<label for="toggle'.$i.'">'.$g_chapters[$i].'</label>'.
        '<section>';
        foreach($lessons as $j => $lesson) {
            $nav .= '<p class="lesson"><a href="/index.php/lesson?chapter='.$i.'&lesson='.$j.'">'.$g_lessons[$i][$j].'</a></p>';
        }
        $nav .= '</section></div>';
    }
    $nav .= '</nav>';
    return $nav;
}

function getRequestPath() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return '/' . ltrim(str_replace('index.php', '', $path), '/');
}

function getMethod($routes, $path) {
    foreach ($routes as $route => $method) {
        if ($path === $route) {
            return $method;
        }
    }
    return 'notFound';
}

// >>>>>>>>>>>>>>>>>>> START PATH PAGES <<<<<<<<<<<<<<<<<<<

$routes = [];


$routes['/lesson'] = function() {
    $root = $_SERVER['DOCUMENT_ROOT'];
    $g_lessons = $GLOBALS['g_lessons'];

    $chaper_ID = $_GET['chapter'];
    $lesson_ID = $_GET['lesson'];

    if (isset($chaper_ID) && 
    isset($lesson_ID) &&
    isset($g_lessons[$chaper_ID][$lesson_ID])) {
        $nav = generatorNav();

        return
        file_get_contents($root."/components/learn/chapter-".$chaper_ID.
        '/lesson-'.$lesson_ID.'.html').
        $nav;

    }
    return notFound();
};

$routes['/'] = function() {
    $root = $_SERVER['DOCUMENT_ROOT'];
    return 
        file_get_contents($root."/components/main/header.html").
        file_get_contents($root."/components/main/start-experince.html").
        file_get_contents($root."/components/main/footer.html");
};



$routes['/test'] = function() {
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    return "It is work";
};



function notFound() {
    $root = $_SERVER['DOCUMENT_ROOT'];

    header("HTTP/1.0 404 Not Found");

    return file_get_contents($root."/components/meta/_error.html");
}

// >>>>>>>>>>>>>>>>>>> END PATH PAGES <<<<<<<<<<<<<<<<<<<


$path = getRequestPath();
$method = getMethod($routes, $path);
echo $_head.$method().$_foot;

?>