

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
pip install -r requirements.txt
```

[Помощь](https://ru.stackoverflow.com/questions/1028405/python-%D0%B2%D0%BE%D0%BF%D1%80%D0%BE%D1%81-%D0%BF%D0%BE-%D0%BF%D0%B5%D1%80%D0%B5%D0%BD%D0%BE%D1%81%D1%83-%D0%B2%D0%B8%D1%80%D1%82%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D0%B3%D0%BE-%D0%BE%D0%BA%D1%80%D1%83%D0%B6%D0%B5%D0%BD%D0%B8%D1%8F-python-%D1%81-windows-%D0%BD%D0%B0-ubuntu)

### Если удаляется, обновляется или добовляется библиотека, то пиши

```bash
pip freeze > requirements.txt
```

## Запуск сервера

### Перейти в папку с модулем

```bash
cd store 
```

### Запустить сервер

```bash
python manage.py runserver
```

# Дополнительные ссылки и задачи

- [stalker янов](https://www.google.com/search?q=stalker+%D1%8F%D0%BD%D0%BE%D0%B2&sxsrf=APwXEdel48swH5lYrx_X0Hk8DEq811QRCg:1684783414496&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjv5san04n_AhUEgosKHX9VAqMQ_AUoAXoECAEQAw&biw=1920&bih=929#imgrc=Rv7TI8TSsxbjGM)
- [stalker окрестности Юпитера](https://www.google.com/search?q=stalker+%D0%BE%D0%BA%D1%80%D0%B5%D1%81%D1%82%D0%BD%D0%BE%D1%81%D1%82%D0%B8+%D0%AE%D0%BF%D0%B8%D1%82%D0%B5%D1%80%D0%B0&tbm=isch&ved=2ahUKEwi1gaH31In_AhXCuSoKHf1RDvkQ2-cCegQIABAA&oq=stalker+%D0%BE%D0%BA%D1%80%D0%B5%D1%81%D1%82%D0%BD%D0%BE%D1%81%D1%82%D0%B8+%D0%AE%D0%BF%D0%B8%D1%82%D0%B5%D1%80%D0%B0&gs_lcp=CgNpbWcQAzoECCMQJzoFCAAQgAQ6BggAEAgQHlDdB1jjI2CkJWgAcAB4AIABZIgB0AmSAQQxOS4xmAEAoAEBqgELZ3dzLXdpei1pbWfAAQE&sclient=img&ei=6sJrZLXkBMLzqgH9o7nIDw&bih=929&biw=1920#imgrc=VFWZw89uks6RNM)
- [сталкер карьер 4к окрестности юпитера](https://www.google.com/search?q=%D1%81%D1%82%D0%B0%D0%BB%D0%BA%D0%B5%D1%80+%D0%BA%D0%B0%D1%80%D1%8C%D0%B5%D1%80+4%D0%BA+%D0%BE%D0%BA%D1%80%D0%B5%D1%81%D1%82%D0%BD%D0%BE%D1%81%D1%82%D0%B8+%D1%8E%D0%BF%D0%B8%D1%82%D0%B5%D1%80%D0%B0&tbm=isch&ved=2ahUKEwjK-JLY1Yn_AhWSyCoKHdRhCM0Q2-cCegQIABAA&oq=%D1%81%D1%82%D0%B0%D0%BB%D0%BA%D0%B5%D1%80+%D0%BA%D0%B0%D1%80%D1%8C%D0%B5%D1%80+4%D0%BA+%D0%BE%D0%BA%D1%80%D0%B5%D1%81%D1%82%D0%BD%D0%BE%D1%81%D1%82%D0%B8+%D1%8E%D0%BF%D0%B8%D1%82%D0%B5%D1%80%D0%B0&gs_lcp=CgNpbWcQAzoECCMQJ1DqB1j1IGCzImgAcAB4AIABSIgBlQqSAQIyMZgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=tcNrZIrKEJKRqwHUw6HoDA&bih=929&biw=1920)
- [Окрестности «Юпитера» в wiki fandom](https://stalker.fandom.com/ru/wiki/%D0%9E%D0%BA%D1%80%D0%B5%D1%81%D1%82%D0%BD%D0%BE%D1%81%D1%82%D0%B8_%C2%AB%D0%AE%D0%BF%D0%B8%D1%82%D0%B5%D1%80%D0%B0%C2%BB)
- [Сохранение зависимостей, чтобы перейти с виндовс на линукс и наоборот](https://stackoverflow.com/questions/31684375/automatically-create-requirements-txt)
- 
- 
- 
- 
- 
- 
- 


- [ ] Собрать все картинки артефактов с [wiki](https://stalker.fandom.com/ru/wiki/%D0%90%D1%80%D1%82%D0%B5%D1%84%D0%B0%D0%BA%D1%82%D1%8B) 
- [ ] 
- [ ] 
- [ ] 
- [ ] 
- [ ] 
- [ ] 
- [ ] 
