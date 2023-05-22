

[Ссылка на репозиторий](https://github.com/Blezz-tech/store-server)
https://github.com/Blezz-tech/store-server


# Использование проекта по шагам

## Создание виртульного окружения

В корне проекта прописать команды для ОС

### Для Windows

```bash
py -3 -m venv venv
```

Дополнительных реководств нету (FFF...)

### Для Linux

```bash
python -m venv venv
```

[Ссылка на руководство](https://wiki.archlinux.org/title/Python_(%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9)/Virtual_environment_(%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9)#:~:text=.-,venv,-%D0%9E%D0%BD%20%D0%B2%D1%85%D0%BE%D0%B4%D0%B8%D1%82%20%D0%B2)

## Активация виртуального окружения

В корне проекта прописать команды для ОС

### Для Windows

```bash
venv\Scripts\activate
```

Дополнительных реководств нету (FFF...)

### Для Linux

```bash
source envname/bin/activate
```

[Ссылка на руководство](https://wiki.archlinux.org/title/Python_(%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9)/Virtual_environment_(%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9)#:~:text=%24%20virtualenv%20envname-,%D0%90%D0%BA%D1%82%D0%B8%D0%B2%D0%B0%D1%86%D0%B8%D1%8F,-%D0%94%D0%BB%D1%8F%20%D0%B0%D0%BA%D1%82%D0%B8%D0%B2%D0%B0%D1%86%D0%B8%D0%B8%20%D0%B2%D0%B8%D1%80%D1%82%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D0%B3%D0%BE)

## Установка необходимых зависимостей

```bash
pip install Django==4.2.1
```

```bash
python -m pip install Pillow
```

## Запуск сервера

перейти в

```bash
cd store
```

Прописать

```bash
python manage.py runserver
```

