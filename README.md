It's a test project.
====================

Where can I find:
================

The main logic here:
- App\Controller\UserController
- App\Service\UserService
- App\Service\PhoneService

Loading data to db here:
- App\DataFixture

The dump of a database here:
- docker/mysql/Dump20230813


The sql quires here:
- docker/mysql/script.sql
- docker/mysql/schema.sql


Start this project
==================

```console
make dc_build
make dc_up
make app_bash
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

After that you can call requests using the urls:

- **GET** http://localhost:888/api/v1/user/{id}
  to receive info about user

- **DELETE** http://localhost:888/api/v1/user/{id}
        to delete a specific user

- **POST** http://localhost:888/api/v1/user
        to create a new user
```
{
"name": "test",
"birthdate": "22-05-1990"
}
```

- **PUT** http://localhost:888/api/v1/user/phone/add
        to add new phone for user
```
{
    "userId": 65,
    "phonenumber": "380637766554"
}
```

- **PUT** http://localhost:888/api/v1/user/phone/topup
    to top up phone number's balance
```
{
    "userId": 66,
    "phonenumber": "380637766554",
    "amount": 99
}
 ```


*The resources were used for creating this test project*:
1. https://github.com/ns3777k/publisher-youtube
2. https://github.com/alejandro-yakovlev/symfony-docker

