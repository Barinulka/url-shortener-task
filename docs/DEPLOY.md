# Развертывание проекта

* Добавить .env файл
```
cp .env.example .env
```
* Установить зависимости
```
composer install
```
* Заупстить локальную БД
```
docker-compose up -d
```
* Заупстить локальный сервер
```
php artisan serve
```
* Применить все миграции
```
php artisan migrate
```
