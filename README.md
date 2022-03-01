Authorization service
===============
It's my project work by php laravel.

In this project I was developed the support service
____
Requests for backend
--------------------
In the files have a **'Ticket.postman_collection.json'**

It's json by the postman for look every requests

Please run this backend on 5000 port. It will be possible with command: 

```php
php artisan serve --port=5000
```

and with wich request you must have JWT token
___

### Requests for User

**POST Register User**
>localhost:5000/api/register
>>when you login you must send only six value in the body. It's 'email','first_name', 'last_name', 'password', 'permision' and 'role'

___Request: ___
```json
{
    "email": "dadasfa@mail.ru",
    "first_name": "Eldar",
    "last_name": "Shakhzhanov",
    "password": "123321",
    "role_id": "$role_id",
}
```

**POST Login User**
>localhost:5000/api/login
>>when you login you must send only two value in the body. It's 'email' and 'password'

___Response: ___
```json
{
    "succes": "true",
    "token": "...",
}
```

**GET User Info**
>http://localhost:5000/api/user

___Response: ___
```json
{
    "id": 1,
    "user_id": 3,
    "first_name": "Nayeli",
    "last_name": "Emard",
    "role_id": 3,
    "user": {
        "id": 3,
        "email": "nolan.toney@example.net",
        "mail_verification": {
            "id": 2,
            "user_id": 3,
            "verified": false
        }
    },
    "role": {
        "id": 3,
        "role": "test1",
        "permission": "test1"
    }
}
```

**PUT Change User**
>http://localhost:5000/api/user
>> You can add any existing property to json when you change user

___Response: ___
```json
{
    "Change succesfully"
}
```

**DEL Delete User**
>http://localhost:5000/api/user

___Response: ___
```json
{
    "Delete sucesfully"
}

```

### Requests for Roles

**POST Create Role**
>localhost:5000/api/role
>>when you create role you must send only two value in the body. It's 'role' and 'permission'

___Response: ___ 
```json
{
    "role": "user",
    "permission": "user",
    "id": "..."
}
```

**GET All Roles**
>http://localhost:5000/api/role

___Response: ___
```json
{
    {
        "id": 3,
        "role": "qui",
        "permission": "vel"
    },
    {
        "id": 6,
        "role": "test",
        "permission": "test"
    },
}
```

**PUT Change Role**
>http://localhost:5000/api/role
>> You can add any existing property to json when you change role

___Response: ___
```json
{
    "Change succesfully"
}
```

**DEL Delete User**
>http://localhost:5000/api/role

___Response: ___
```json
{   
    "Delete sucesfully"
}
```
### Verificate Email for User
**PUT Verify Email**
>http://localhost:5000/api/user/verification

___Request: ___
```json
{
    "verified":true
}
```


___Response: ___
```json
{
    "Change succesfully"
}
```




## And I so have requests for my another service. You can see they in Postman File.