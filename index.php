<?php
$root = $_SERVER['DOCUMENT_ROOT'];



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

function lesson() {
    $root = $_SERVER['DOCUMENT_ROOT'];

    $arr = [];
    $arrPaths = [];
    $string = '';
    
    $chapterPath = "/components/learn";
    $chapterArr = scandir($root.$chapterPath);
    unset($chapterArr[0]);
    unset($chapterArr[1]);

    foreach($chapterArr as $i => $chapterName) {
        $lessonPath = $chapterPath.'/'.$chapterName;
        $lessonArr = scandir($root.$lessonPath);
        unset($lessonArr[0]);
        unset($lessonArr[1]);

        $arrPaths[$chapterName] = [];

        foreach($lessonArr as $j => $lessonName) {
            array_push($arrPaths[$chapterName], substr($lessonName, 0, strpos($lessonName, '.html')));
        }
    }

    $nav = '<nav>';
    $i = 0;
    foreach($arrPaths as $chapter => $lessons) {
        $i += 1;
        $nav .= '<div class="chapter">'.
        '<input id="toggle1" type="radio" class="chapter-toggle" name="toggle" checked />'.
        '<label for="toggle1">'.$chapter.'</label>'.
        '<section>';
        foreach($lessons as $j => $lesson) {
            $nav .= '<p class="lesson"><a href="'.'/chapter-'.$i.'/lesson-'.$j.'">'.$lesson.'</a></p>';
        }
        $nav .= '</section>'.
        '</div>';
    }
    $nav .= '</nav>';

    $i = 0;
    foreach($arrPaths as $chapter => $lessons) {
        $i += 1;
        // echo $chapterPath.'/'.$chapter."<br>";

        foreach($lessons as $j => $lesson) {
            $routePath = $chapter.'/'.$lesson;
            // echo $chapterPath.'/'.$routePath."<br>";
            $arr['/chapter-'.$i.'/lesson-'.$j] = function () {
                return 
                file_get_contents($root."/components/meta/_head.html").
                file_get_contents($root.$chapterPath.'/'.$routePath.'.html').
                $nav.
                file_get_contents($root."/components/meta/_foot.html");
            };
        }
    }
    print_r($arr);
    return $arr;
}

$routes = lesson(); 

$routes['/lesson'] = function () {
    $root = $_SERVER['DOCUMENT_ROOT'];

    // номер главы и номер урока
    $pages = [
        33 => 'Сага о хомячках',
        54 => 'Мыши в тумане'
    ];

    if (isset($_GET['id']) && isset($pages[$_GET['id']])) {
        return $pages[$_GET['id']];
    }

    return notFound();

};

$routes['/'] = function () {
    $root = $_SERVER['DOCUMENT_ROOT'];
    return 
        file_get_contents($root."/components/meta/_head.html").
        file_get_contents($root."/components/main/header.html").
        file_get_contents($root."/components/main/start-experince.html").
        file_get_contents($root."/components/main/footer.html").
        file_get_contents($root."/components/meta/_foot.html");
};



$routes['/test'] = function () {
    return "It is work";
};



function notFound() {
    header("HTTP/1.0 404 Not Found");

    return 'Нет такой страницы';
}

// >>>>>>>>>>>>>>>>>>> END PATH PAGES <<<<<<<<<<<<<<<<<<<


$path = getRequestPath();
echo '<br>'.'<br>'.$path;

$method = getMethod($routes, $path);
echo $method();





?>