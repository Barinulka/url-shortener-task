# Маршруты

* Регистрация пользователя
```
POST /api/register HTTP/1.1
Content-Type: application/json

{
    "name": "string" - Имя пользователя (макс. 255 символов),
    "email": "string" - Email,
    "password": "string" - Пароль (мин. 4 символа)
}
```
* Получение токена
```
POST /api/login HTTP/1.1
Content-Type: application/json

{
    "email": "string" 
    "password": "string"
}
```
* Закрытие сессии (текущего токена)
```
POST /api/login HTTP/1.1
Authorization: Bearer {token}
```
