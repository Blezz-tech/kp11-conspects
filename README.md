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