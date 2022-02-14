Authorization service
===============
It's my project work by php laravel.

In this project I was developed the support service
____
Requests for backend
--------------------
In the files have a 'Ticket.postman_collection.json'

It's json by the postman for look every requests

Please run this backend on 5000 port. It will be possible with command: php artisan serve --port=5000

and with wich request you must have JWT token
___

### Requests for User

POST Register User
>localhost:5000/api/register
>>when you login you must send only six value in the body. It's 'email','first_name', 'last_name', 'password', 'permision' and 'role'

Response: 
```json
{
    "email": "dadasfa@mail.ru",
    "first_name": "Eldar",
    "last_name": "Shakhzhanov",
    "password": "123321",
    "role": "user",
    "permission":"user"
}
```

POST Login User
>localhost:5000/api/login
>>when you login you must send only two value in the body. It's 'email' and 'password'

Response: 
```json
{
    "succes": "true",
    "token": "...",
}
```

GET User Info
>http://localhost:5000/api/user

Response: 
```json
{
    "id": 1,
    "first_name":"test",
    "last_name":"test",
    "email": "dadasfa@mail.ru",
    "role": "user",
    "permission": "user"
}
```

PUT Change User
>http://localhost:5000/api/user/{:id}
>> You can add any existing property to json when you change user

Response: 
```json
{
    "id": 3,
    "email": "dadasfa@mail.ru",
    "first_name": "sdada",
    "last_name": "Shakhzhanov",
    "role": "user",
    "permission": "user"
}
```

DEL Delete User
>http://localhost:5000/api/user/{:id}

Response: 
```json
Delete sucesfully
```
