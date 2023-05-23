# Основные свойства CSS для работы

## CSS - Работа с текстом

На этом уроке мы познакомимся с основными приёмами для работы с текстом с помощью средств CSS.

Задавать стили CSS к тексту можно на уровне элемента `body` (для всей веб-страницы), элемента `p` (для абзаца), элемента span (для выделенного фрагмента текста) или любого другого элемента HTML.

## Основные свойства CSS для работы с текстом

### 1. Свойство font-size

Свойство `font-size` изменяет размер шрифта. Оно задаётся с помощью значения и единицы измерения (`em`, `px`, `pt`, `%`). Единицы измерения em и `%` являются относительными и зависят от размера шрифта установленного в документе. Единицы измерения px и pt являются абсолютными и их размер зависит от разрешения экрана. Также у данного свойства есть предопределенные значения `small` и `larger`, которые соответственно уменьшают или увеличивают текст по отношению к базовому.

```html
<p style="font-size:1em;">Lorem ipsum dolor sit amet</p>
<p style="font-size:120%;">Lorem ipsum dolor sit amet</p>
<p style="font-size:16px;">Lorem ipsum dolor sit amet</p>
<p style="font-size:14pt;">Lorem ipsum dolor sit amet</p>
<p style="font-size:larger;">Lorem ipsum dolor sit amet</p>
<p style="font-size:small;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="font-size:1em;" }

Lorem ipsum dolor sit amet { style="font-size:120%;" }

Lorem ipsum dolor sit amet { style="font-size:16px;" }

Lorem ipsum dolor sit amet { style="font-size:14pt" }

Lorem ipsum dolor sit amet { style="font-size:larger;" }

Lorem ipsum dolor sit amet { style="font-size:small;" }

### 2. Свойство font-weight

Свойство `font-weight` изменяет жирность шрифта. Свойство `font-weight` имеет 2 часто используемых значения: `normal` (обычное) и `bold` (жирное). Остальные значения используются очень редко, перечислим их: числовые от `100` до `900` с шагом `100` (`100` – самое тонкое начертание, `900` – самое жирное начертание), `bolder` и `lighter`.

```html
<p style="font-weight:100;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:200;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:300;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:400;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:500;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:600;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:700;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:800;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:900;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:normal;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:blod;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:lighter;">Lorem ipsum dolor sit amet</p>
<p style="font-weight:bolder;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="font-weight:100;" }

Lorem ipsum dolor sit amet { style="font-weight:200;" }

Lorem ipsum dolor sit amet { style="font-weight:300;" }

Lorem ipsum dolor sit amet { style="font-weight:400;" }

Lorem ipsum dolor sit amet { style="font-weight:500;" }

Lorem ipsum dolor sit amet { style="font-weight:600;" }

Lorem ipsum dolor sit amet { style="font-weight:700;" }

Lorem ipsum dolor sit amet { style="font-weight:800;" }

Lorem ipsum dolor sit amet { style="font-weight:900;" }

Lorem ipsum dolor sit amet { style="font-weight:normal;" }

Lorem ipsum dolor sit amet { style="font-weight:blod;" }

Lorem ipsum dolor sit amet { style="font-weight:lighter;" }

Lorem ipsum dolor sit amet { style="font-weight:bolder;" }

### 3. Свойство font-style

Свойство `font-style` устанавливает тексту курсивное начертание. Оно принимает следующие значения: `normal` (обычное начертание шрифта), `italic` (курсивное начертание).

```html
<p style="font-style:normal;">Lorem ipsum dolor sit amet</p>
<p style="font-style:italic;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="font-style:normal;" }

Lorem ipsum dolor sit amet { style="font-style:italic;" }

### 4. Свойство font-family

Свойство `font-family` изменяет шрифт или список шрифтов, с помощью которых отображается текст. В качестве значений свойство `font-family` принимает названия шрифтов (например: `font-family: "Tahoma", "Arial"`) или предопределенные названия группы шрифтов (`serif`, `sans-serif`, `monospace`, `fantasy`, `cursive`).

```html
<p style="font-family:'Times New Roman','Arial';">Lorem ipsum dolor sitamet</p>
<p style="font-family:serif;">Lorem ipsum dolor sit amet</p>
<p style="font-family:sans-serif;">Lorem ipsum dolor sit amet</p>
<p style="font-family:monospace;">Lorem ipsum dolor sit amet</p>
<p style="font-family:fantasy;">Lorem ipsum dolor sit amet</p>
<p style="font-family:cursive;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="font-family:'Times New Roman','Arial';" }

Lorem ipsum dolor sit amet { style="font-family:serif;" }

Lorem ipsum dolor sit amet { style="font-family:sans-serif;" }

Lorem ipsum dolor sit amet { style="font-family:monospace;" }

Lorem ipsum dolor sit amet { style="font-family:fantasy;" }

Lorem ipsum dolor sit amet { style="font-family:cursive;" }

### 5. Свойство color

Свойство `color` изменяет цвет шрифта. Установить цвет можно несколькими способами: `#ff0000` (шестнадцатеричное значение цвета), `orange` (зарезервированное название цвета), `rgb(120,17,90)` (RGB значение).

```html
<p style="color:#aa00aa;">Lorem ipsum dolor sit amet</p>
<p style="color:pink;">Lorem ipsum dolor sit amet</p>
<p style="color:rgb(17,17,17);">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="color:#aa00aa;" }

Lorem ipsum dolor sit amet { style="color:pink;" }

Lorem ipsum dolor sit amet { style="color:rgb(17,17,17);" }

### 6. Свойство background-color

Свойство `background-color` можно использовать для выделения текста цветом, т.е. текст делается похожим на текст, выделенный маркером. Установить цвет можно такими же способами, как и для свойства `color`.

```html
<p style="background-color:yellow;">Lorem ipsum dolor sit amet</p>
<p style="color:orange; background-color:green;">Lorem ipsum dolor sit amet</span></p>
<p style="background-color:gray;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="background-color:yellow;" }

Lorem ipsum dolor sit amet { style="color:orange; background-color:green;" }

Lorem ipsum dolor sit amet { style="background-color:gray; }

6. Свойство text-decoration

Свойство `text-decoration` можно использовать для декоративного оформления текста. В качестве значений свойства `text-decoration` можно использовать следующие: `none` (без декоративного оформления), `underline` (подчёркивание), `overline` (линия над текстом), `line-through` (зачёркивание), `blink` (эффект мигания).

```html
<p style="text-decoration:none;">Lorem ipsum dolor sit amet</p>
<p style="text-decoration:underline;">Lorem ipsum dolor sit amet</p>
<p style="text-decoration:overline;">Lorem ipsum dolor sit amet</p>
<p style="text-decoration:line-through;">Lorem ipsum dolor sit amet</p>
<p style="text-decoration:underline line-through;">
  Lorem ipsum dolor sit amet
</p>
```

Lorem ipsum dolor sit amet { style="text-decoration:none;" }

Lorem ipsum dolor sit amet { style="text-decoration:underline;" }

Lorem ipsum dolor sit amet { style="text-decoration:overline;" }

Lorem ipsum dolor sit amet { style="text-decoration:line-through;" }

Lorem ipsum dolor sit amet { style="text-decoration:underline line-through;" }

Подчёркивание также можно создать с помощью свойства CSS `border`.

```html
<p style="color:red; text-decoration: none;border-bottom: 1px dashed red;">
  Lorem ipsum dolor sit amet
</p>
<p style="color:blue; text-decoration: none;border-bottom: 1px dashed blue;">
  Lorem ipsum dolor sit amet
</p>
```

Lorem ipsum dolor sit amet { style="color:red; text-decoration: none;border-bottom: 1px dashed red;" }

Lorem ipsum dolor sit amet { style="color:blue; text-decoration: none;border-bottom: 1px dashed blue;" }

## 7. Свойство text-transform

Свойство `text-transform` управляет регистром символов. В качестве значений свойства `text-transform` можно использовать следующие: none (по умолчанию), `lowercase` (переводит все символы в строчные), `uppercase` (переводит все символы в прописные), `capitalize` (каждое слово начинается с прописного символа).

```html
<p style="text-transform:none;">Lorem ipsum dolor sit amet</p>
<p style="text-transform:lowercase;">Lorem ipsum dolor sit amet</p>
<p style="text-transform:uppercase;">Lorem ipsum dolor sit amet</p>
<p style="text-transform:capitalize;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="text-transform:none;" }

Lorem ipsum dolor sit amet { style="text-transform:lowercase;" }

Lorem ipsum dolor sit amet { style="text-transform:uppercase;" }

Lorem ipsum dolor sit amet { style="text-transform:capitalize;" }

## 8. Свойство white-space

При обработке текста браузер не отображает больше одного пробела между словами, а также игнорирует переносы строк, которые вы выполнили в HTML коде. При помощи свойства `white-space` вы можете настроить поведение браузера с помощью следующих значений: `normal` (по умолчанию), `nowrap` (не переносит текст, пока не встретит тег `br`), `pre` (отображает текст как в коде на `HTML`), `pre-wrap` (отображает все пробелы между словами и переносит текст, если он не помещается в контейнер).

```html
<p style="white-space:normal;">Lorem ipsum dolor sit amet</p>
<hr />
<p style="white-space:pre;">Lorem ipsum dolor sit amet</p>
```

Lorem ipsum dolor sit amet { style="white-space:normal;" }

Lorem ipsum dolor sit amet { style="white-space:pre;" }

## 9. Свойство text-align

Свойство text-align предназначено для выравнивания текста в горизонтальном направлении. Значения свойства `text-align` указывают, что текст будет выровнен: `left` (по левому краю), `center` (по центру), `right` (по правому краю), `justify` (по ширине, т.е. одновременно по левому и правому краям).

```html
<p style="text-align:left;">...</p>
<p style="text-align:center;">...</p>
<p style="text-align:right;">...</p>
<p style="text-align:justify;">...</p>
```

Lorem ipsum dolor sit amet. Impedit, quo voluptas assumenda est, qui minus id quod. Quas molestias excepturi sint, obcaecati cupiditate non numquam eius. Perspiciatis, unde omnis iste natus error sit voluptatem. Et harum quidem rerum facilis est laborum et molestiae consequatur. Minus id, quod maxime placeat, facere possimus. Quo minus id, quod maxime placeat facere. Et molestiae consequatur, vel eum iure reprehenderit, qui dolorem ipsum, quia consequuntur. { style="text-align:left;" }

Lorem ipsum dolor sit amet. Impedit, quo voluptas assumenda est, qui minus id quod. Quas molestias excepturi sint, obcaecati cupiditate non numquam eius. Perspiciatis, unde omnis iste natus error sit voluptatem. Et harum quidem rerum facilis est laborum et molestiae consequatur. Minus id, quod maxime placeat, facere possimus. Quo minus id, quod maxime placeat facere. Et molestiae consequatur, vel eum iure reprehenderit, qui dolorem ipsum, quia consequuntur. { style="text-align:center;" }

Lorem ipsum dolor sit amet. Impedit, quo voluptas assumenda est, qui minus id quod. Quas molestias excepturi sint, obcaecati cupiditate non numquam eius. Perspiciatis, unde omnis iste natus error sit voluptatem. Et harum quidem rerum facilis est laborum et molestiae consequatur. Minus id, quod maxime placeat, facere possimus. Quo minus id, quod maxime placeat facere. Et molestiae consequatur, vel eum iure reprehenderit, qui dolorem ipsum, quia consequuntur. { style="text-align:right;" }

Lorem ipsum dolor sit amet. Impedit, quo voluptas assumenda est, qui minus id quod. Quas molestias excepturi sint, obcaecati cupiditate non numquam eius. Perspiciatis, unde omnis iste natus error sit voluptatem. Et harum quidem rerum facilis est laborum et molestiae consequatur. Minus id, quod maxime placeat, facere possimus. Quo minus id, quod maxime placeat facere. Et molestiae consequatur, vel eum iure reprehenderit, qui dolorem ipsum, quia consequuntur. { style="text-align:justify;" }

## 10. Свойство vertical-align

Свойство `vertical-align` может использоваться для строчных элементов (в том числе для элементов со свойством `display:inline-block`), ячеек таблицы, и предназначено для выравнивания текста по вертикали. Значения свойства `vertical-align` указывают, что текст будет выровнен: top (по верхнему краю строки), `middle` (по середине), bottom (по нижнему краю строки), `baseline` (значение по умолчанию, выравнивание по базовой линии), `sub` (текст отображается в виде нижнего индекса, как подстрочный), `super` (текст отображается в виде верхнего индекса, как надстрочный).

```html
<p style="font-size:0.5em; vertical-align:top;">Lorem ipsum dolor sit amet.</p>
<p style="font-size:0.5em; vertical-align:middle;">
  Lorem ipsum dolor sit amet.
</p>
<p style="font-size:0.5em; vertical-align:bottom;">
  Lorem ipsum dolor sit amet.
</p>
<p style="font-size:0.5em; vertical-align:baseline;">
  Lorem ipsum dolorsit amet.
</p>
<p style="vertical-align:sub">Lorem ipsum dolor sit amet.</p>
<p style="vertical-align:super">Lorem ipsum dolor sit amet.</p>
```

Lorem ipsum dolor sit amet. { style="font-size:0.5em; vertical-align:top;" }

Lorem ipsum dolor sit amet. { style="font-size:0.5em; vertical-align:middle;" }

Lorem ipsum dolor sit amet. { style="font-size:0.5em; vertical-align:bottom;" }

Lorem ipsum dolor sit amet. { style="font-size:0.5em; vertical-align:baseline;" }

Lorem ipsum dolor sit amet. { style="vertical-align:sub" }

Lorem ipsum dolor sit amet. { style="vertical-align:super" }

## 11. Свойство line-height

Свойство line-height предназначено для задания высоты строки, которая влияет на расстояние между строчками текста. В качестве значений свойства line-height можно использовать следующие: число (множитель по отношению к значению высоты строки по умолчанию), проценты (например: 120% от высоты строки по умолчанию), px (например: 16px), em (например: 3em), зарезервированное слово normal (автоматический расчёт высоты).

```html
<p>...</p>
<p style="line-height:200%;">...</p>
<p style="line-height:3;">...</p>
<p style="line-height:normal;">...</p>
<p style="line-height:24px;">...</p>
```

Это была лишь малая часть того, что нужно. Далее вам необходимо ознакомиться с следующим плейлистом и видео (Кликни по картинкам)

[![](https://i.ytimg.com/vi/LQxx5Z9XEdM/sddefault.jpg)](https://www.youtube.com/watch?v=LQxx5Z9XEdM) { .w-50 .align-self-center }

[![](https://i.ytimg.com/vi_webp/cUSsg1NNFM0/sddefault.webp)](https://www.youtube.com/watch?v=cUSsg1NNFM0) { .w-50 .align-self-center }
