Start this project:

1. make dc_build
2. make dc_up
3. make app_bash
4. php bin/console doctrine:migrations:migrate
5. php bin/console doctrine:fixtures:load
6. after that you can call requests using the urls:
    6.1 **GET** ``http://localhost:888/api/v1/user/{id}``
        to receive info about user

    6.2 **DELETE** ``http://localhost:888/api/v1/user/{id}``
        to delete a specific user

    6.3 **POST** ``http://localhost:888/api/v1/user``
        to create a new user
        ``{"name": "test", "birthdate": "22-05-1990"}``

    6.4 **PUT** ``http://localhost:888/api/v1/user/phone/add``
        to add new phone for user
        ``{
   "userId": 65,
   "phonenumber": "380637766554"
   }``

    6.5 **PUT** ``http://localhost:888/api/v1/user/phone/topup``
    to top up phone number's balance
    ``{
   "userId": 66,
   "phonenumber": "380637766554",
   "amount": 99
   }``


*The resources were used for creating this test project*:
1. https://github.com/ns3777k/publisher-youtube
2. https://github.com/alejandro-yakovlev/symfony-docker

