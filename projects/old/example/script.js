
function MyEnemies(number = 1000, out = 10000) {
    let func = () => {
        console.clear();
        for (let i = 0; i < enemies.row; i++) {
            console.log(`${i}:`);
            for (let j = 0; j < enemies.number[i]; j++) {
                console.log(`  ${j}: x=${enemies.cells[i][j].x}, y=${enemies.cells[i][j].y}, img=${enemies.cells[i][j].img}`);
            }
        }
    };
    let id = setInterval(func, number);
    setTimeout( () => {clearInterval(id);}, out);
}

let buttonStart = document.getElementById("btn-start");
let canvas      = document.getElementById("drawing-canvas");
let context     = canvas.getContext("2d");

let info_score       = document.getElementById("score");
let info_totalScore  = document.getElementById("total-score");

let imgPlayer = new Image();
let imgEnemies = [];

let score = {
    score: 0,
    scoreTotal: 0,
    scoreSpeed: 10,
    FPS: 15,
};

let setting = {
    loadingIMG: [false, false, false],
    screen: {
        x: 0,
        y: 0,
        width: 470,
        height: 800,
    },
    downKeys: {},
    id: {
        Check: 0,
        Render: 0,
        MyEvent: 0,
        MySocreEvent: 0,
    },
};

let player = {
    x: 0,
    y: 0,
    height: 125,
    width: 50,

    dx: 5,
    dy: 5,
};

let lines = {
    cells: [],
    height: 50,
    width: 10,
    column: 5,
    row: 6,
    speed: 8,
    gap: 70,
};

let enemies = {
    cells: [],
    number: [],
    row: 6,

    height: 125,
    width: 50,

    speed: 5,
    gap: 80,
    imgMax: 8,
};

init();
loadMedia();
setting.id.Check = setInterval(function() {
    let checkLoadingImg = true;

    setting.loadingIMG.forEach( function(item) {
        checkLoadingImg &&= item;
    });

    if (checkLoadingImg) {
        buttonStart.classList.remove("hide");
        clearInterval(setting.id.Check);
    }
}, 1000);


document.addEventListener("keydown", function (e) {
    e.preventDefault();
    setting.downKeys[e.code] = true;
});

document.addEventListener('keyup', function(e) {
    e.preventDefault();
    setting.downKeys[e.code] = false;
});

buttonStart.addEventListener('click', function(e) {
    e.preventDefault();
    start();
})

// Нужно сдалать правельное построение линий
function init() {
    //инициализация canvas
    setting.downKeys = {};

    setting.screen.height = 650;
    if (document.body.clientHeight > 650) {
        setting.screen.height = document.body.clientHeight;
    }
    canvas.width = setting.screen.width;    
    canvas.height = setting.screen.height;

    // Игрок
    player.x = (setting.screen.width - player.width) / 2;
    player.y = setting.screen.height - player.height;

    //дорожные полосы
    lines.cells = [];
    lines.row = Math.ceil(setting.screen.height / 150);
    for (let i = 0; i < lines.column; i++)
    {
        let x = i * (lines.gap + lines.width) + 70;
        lines.cells[i] = [];
        for (let j = 0; j < lines.row ; j++) {
            lines.cells[i][j] = {};
            lines.cells[i][j].x = x;
            lines.cells[i][j].y = 150 * (j);
        }
    }

    //враги    
    enemies.cells = [];
    enemies.row = Math.ceil(setting.screen.height / 400);
    for (let i = 0; i < enemies.row; i++) {
        enemies.number.push(random(1, 5));
        enemies.cells[i] = [];

        let myMas = [0, 1, 2, 3, 4, 5];
        let randomNumber = 0;
        for (let j = 0; j < enemies.number[i]; j++) {
            let n = random(0, myMas.length - 1);
            randomNumber = myMas[n];
            myMas.splice(n, 1);

            enemies.cells[i][j] = {};
            enemies.cells[i][j].x = randomNumber * enemies.gap + 10;
            enemies.cells[i][j].y = -(i + 1) * 400;
            enemies.cells[i][j].img = random(0, enemies.imgMax - 1);
        }
    }
    
}

function loadMedia() {
    //Загрузка Игрока
    imgPlayer.onload = function() {
        setting.loadingIMG[0] = true;
    };
    imgPlayer.src = "image/player.png";

    //Загрузка Врагов
    for (let i = 0; i < enemies.imgMax; i++) {
        setting.loadingIMG[i + 1] = false;
        setting.loadingIMG[i] = true;
        imgEnemies[i] = new Image();
        imgEnemies[i].onload = function() {
            setting.loadingIMG[i+1] = true;
        };
        imgEnemies[i].src = `image/enemy/enemy${i}.png`;
    }
}

function start() {
    buttonStart.classList.add("hide");
    init();
    setting.id.Render = setInterval(render, 1000 / 60);
    setting.id.MyEvent = setInterval(myEvent, 1000 / 60);
    setting.id.MySocreEvent = setInterval(scoreEvent, 1000 / score.FPS);
}

function stop() {
    clearInterval(setting.id.Render);
    clearInterval(setting.id.MyEvent);
    clearInterval(setting.id.MySocreEvent);
    score.score = 0;
    buttonStart.classList.remove("hide");
}

function scoreEvent() {
    score.score += Math.round(score.scoreSpeed / score.FPS);
    if( score.score > score.scoreTotal) {
        score.scoreTotal = score.score;
    }
}

function myEvent() {
    // Проверка на столкновение
    for (let i = 0; i < enemies.row; i++)
    {
        for (let j = 0; j < enemies.number[i]; j++) {
            if (player.x < enemies.cells[i][j].x + enemies.width &&
                player.x + player.width > enemies.cells[i][j].x &&                
                player.y < enemies.cells[i][j].y + enemies.height &&
                player.y + player.height > enemies.cells[i][j].y) {
                stop();
            }
        }
    }


    //Передвижения Игрока
    if (setting.downKeys["KeyW"]) {
        player.y -= player.dy;
    } else if (setting.downKeys["KeyS"]) {
        player.y += player.dy;
    }

    if (setting.downKeys["KeyA"]) {
        player.x -= player.dx;
    } else if (setting.downKeys["KeyD"]) {
        player.x += player.dx;
    }

    if (player.x < setting.screen.x) {
        player.x = 0;
    } else if (player.x + player.width > setting.screen.width) {
        player.x = setting.screen.width - player.width;
    }

    if (player.y < setting.screen.y) {
        player.y = 0;
    } else if ( player.y + player.height > setting.screen.height) {
        player.y = setting.screen.height - player.height;
    }

    //Передвижение линий
    for (let i = 0; i < lines.column; i++)
        for (let j = 0; j < lines.row; j++) {
            lines.cells[i][j].y += lines.speed;
            if (lines.cells[i][j].y > setting.screen.height) {
                lines.cells[i][j].y = -150;
            }
        }

    // Передвмжение врагов
    for (let i = 0; i < enemies.row; i++)
    {
        let myMas = [0, 1, 2, 3, 4, 5];
        let randomNumber = 0;
        for (let j = 0; j < enemies.number[i]; j++) {
            enemies.cells[i][j].y += enemies.speed;
            if (enemies.cells[i][j].y > setting.screen.height) {
                enemies.number[i] = random(1, 5);
                for (let c = 0; c < enemies.number[i]; c++) {
                    let n = random(0, myMas.length - 1);
                    randomNumber = myMas[n];
                    myMas.splice(n, 1);

                    enemies.cells[i][c] = {};
                    enemies.cells[i][c].x = randomNumber * enemies.gap + 10;
                    enemies.cells[i][c].y = -100;
                    enemies.cells[i][c].img = random(0, enemies.imgMax - 1);
                }
                break;
            }
        }
    }
}

function render() {
    context.clearRect(0, 0, canvas.width, canvas.height);

    //задний фон
    context.fillStyle = "#222";
    context.fillRect(0, 0, canvas.width, canvas.height);

    // Дорожные линии
    context.fillStyle = "#FFF";
    for (let i = 0; i < lines.column; i++)
    {
        for (let j = 0; j < lines.row; j++) {
            context.fillRect(lines.cells[i][j].x, lines.cells[i][j].y, lines.width, lines.height);
        }
    }

    //Игрок
    context.drawImage(imgPlayer,
                      player.x,
                      player.y,
                      player.width,
                      player.height);

    //Враги
    for (let i = 0; i < enemies.row; i++)
    {
        for (let j = 0; j < enemies.number[i]; j++) {
            context.drawImage(imgEnemies[enemies.cells[i][j].img],
                              enemies.cells[i][j].x,
                              enemies.cells[i][j].y,
                              enemies.width,
                              enemies.height);

        }
    }

    //Очки
    info_score.innerHTML      = score.score;
    info_totalScore.innerHTML = score.scoreTotal;
}

function random(min, max) {
    let rand = min - 0.5 + Math.random() * (max - min + 1);
    return Math.round(rand);
}
