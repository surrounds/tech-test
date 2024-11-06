<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Test Application

How to Run:

- Clone this repo to your computer.
- Run ```composer install``` to install dependencies
- Run ```cp .env.example .env``` to create a default config
- Run ```php artisan migrate``` to use DB structure.
- Run ```php artisan db:seed``` to fill DB with test data.
- Run ```php artisan serv```.
- Test app will be available at ```http://localhost:8000```.
- User login: ```test@example.com```
- User passw: ```password```
- Use ```TechTest.postman_collection.json``` in a root directory to test via Postman. Login will add Bearer token automatically
- Run ```php artisan test``` to execute functional tests.

