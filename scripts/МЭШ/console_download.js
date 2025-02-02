console.clear();

const weeksColumns = [...document.querySelectorAll('[class*="gridColumn"]')];

const weeksColumns1 = weeksColumns.map(
    x => [...x.querySelectorAll('.diary-emotion-cache-ucorbh-root')].map(x => [...x.querySelectorAll('span')].map(x => x.innerText)).map(x => ({
            "time": x[0],
            "text": x[1] + ' ' + x[2]
        })
    )
).filter(x => x.length !== 0);

const allTimes = [...new Set(weeksColumns1.flat().map(x => x['time']))].sort();

const allTimeObj = allTimes.reduce((acc, time) => {
    acc[time] = [];
    return acc;
}, {});

const weeksColumns2 = weeksColumns1.filter(x => x)
    .map(week => {
        allTimes.forEach(time => {
            if (week.filter(x => x['time'] == time).length == 0) {
                week.push({
                    'time': time,
                    'text': '-'
                })
            }
        });
        return week;
    });

let result = allTimeObj;

weeksColumns2.forEach(week => {
    week.forEach(lesson => {
        result[lesson['time']].push(lesson['text']);
    });
});


let result1 = [];

Object.entries(result).forEach(([key, value]) => {
    value.unshift(key);
    result1.push(value);
});

result1.unshift(["*", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница"])

const result2 = result1.map(function(d){
    return d.join('\t');
}).join('\n');

console.log(result2);


function downloadTextFile(filename, content) {
    // Создаем объект Blob с текстовым содержимым
    const blob = new Blob([content], { type: 'text/plain' });
    
    // Создаем URL для объекта Blob
    const url = URL.createObjectURL(blob);
    
    // Создаем временный элемент <a>
    const link = document.createElement('a');
    link.href = url;
    link.download = filename; // Указываем имя файла для скачивания
    
    link.click(); // Программно инициируем клик по ссылке
    
    URL.revokeObjectURL(url); // Освобождаем память, удаляя созданный URL
}

downloadTextFile('data.csv', result2);
