# Quasar Projecct

Создание БД для разработки:

```bash
CREATE DATABASE test_quasar_project;
CREATE USER 'test'@'localhost' IDENTIFIED BY 'test';
CREATE USER 'test'@'localhost';
GRANT ALL PRIVILEGES ON test_quasar_project.* TO 'test'@'localhost';
FLUSH PRIVILEGES;
```

Изменение пароля, если забыл

```bash
SET PASSWORD FOR 'test'@'localhost' = 'test';
```

Создать .env файл из .env.example

В нём нужно прописать параметры подключения к БД

Параметры для разработки:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_quasar_project;
DB_USERNAME=test
DB_PASSWORD=test
```
