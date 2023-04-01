<?php
$root = $_SERVER['DOCUMENT_ROOT'];

// include $root."html-components/_head.html";
// echo "<a href=\"./pages/chapters/chapter-1/lesson-1.php\">lesson-1</a>";
// include $root."html-components/foot.html";



$routes = [
    '/' => 'main', // function hello()
    '/about' => 'about', // function about()
    '/page' => 'page' // page()
];
function getRequestPath() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return '/' . ltrim(str_replace('index.php', '', $path), '/');
}
function getMethod(array $routes, $path) {
    foreach ($routes as $route => $method) {
        if ($path === $route) {
            return $method;
        }
    }
    return 'notFound';
}

// >>>>>>>>>>>>>>>>>>> START PATH PAGES <<<<<<<<<<<<<<<<<<<

function main() {
    return 'main';
}

// функция для корня
function hello() {
    return 'Hello, world!';
}

// функция для страницы "/about"
function about() {
    return 'About us.';
}

// чуть более сложный пример
// функция отобразит страницу только если
// в запросе приходит id и этот id равен
// 33 или 54
// [/page?id=33]
function page() {

    $pages = [
        33 => 'Сага о хомячках',
        54 => 'Мыши в тумане'
    ];

    if (isset($_GET['id']) && isset($pages[$_GET['id']])) {
        return $pages[$_GET['id']];
    }

    return notFound();
}

function notFound() {
    header("HTTP/1.0 404 Not Found");

    return 'Нет такой страницы';
}

// >>>>>>>>>>>>>>>>>>> END PATH PAGES <<<<<<<<<<<<<<<<<<<


$path = getRequestPath();
$method = getMethod($routes, $path);
echo $method();


?>