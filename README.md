# Quasar Projecct

```bash
CREATE DATABASE test_quasar_project;
CREATE USER 'test'@'localhost';
SET PASSWORD 'test'@'localhost' = 'test';
GRANT ALL PRIVILEGES ON test_quasar_project.* TO 'test'@'localhost';
FLUSH PRIVILEGES;
```