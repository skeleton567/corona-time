<div style="display:flex; align-items: center">
  <h1 style="position:relative; top: -6px" >Coronatime App</h1>
</div>

---
Coronatime is an App where we can register, go through authorization (as well as restore the password if we have forgotten it) 
and see what covid situation is in the countries of the world today.

#
### Table of Contents
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Migrations](#migration)
* [Development](#development)
* [Resources](#resources)

#
### Prerequisites

* <img src="readme/assets/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@8.1 and up*
* <img src="readme/assets/mysql.png" width="35" style="position: relative; top: 4px" /> *MYSQL@8 and up*
* <img src="readme/assets/npm.png" width="35" style="position: relative; top: 4px" /> *npm@7 and up*
* <img src="readme/assets/composer.png" width="35" style="position: relative; top: 6px" /> *composer@2.4 and up*


#
### Tech Stack

* <img src="readme/assets/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@9.x](https://laravel.com/docs/9.x) - back-end framework
* <img src="readme/assets/spatie.png" height="19" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
* <img src="readme/assets/tailwind.png" height="19" style="position: relative; top: 4px" /> [Tailwind CSS](https://tailwindcss.com) - CSS library

#
### Getting Started
1\. First of all you need to clone Coronatime repository from github:
```sh
git clone https://github.com/RedberryInternship/guram-tsagareishvili-corona-time
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```sh
npm install
```

4\. Now we need to set our env file. 
```sh
cp .env.example .env
```
5\. Next we need to generate Laravel key:
```sh
php artisan key:generate
```
And now you should provide **.env** file all the necessary environment variables:

#
**MYSQL:**
>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=*****

>DB_USERNAME=*****

>DB_PASSWORD=*****

#
**MAIL:**
>MAIL_MAILER=*****

>MAIL_HOST=*****

>MAIL_PORT=*****

>MAIL_USERNAME=*****

>MAIL_PASSWORD=*****

>MAIL_PASSWORD=*****

>MAIL_ENCRYPTION=*****

>MAIL_FROM_ADDRESS=*****

>MAIL_FROM_NAME=*****


##### Now, you should be good to go!


#
### Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```sh
php artisan migrate
```

#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

For Tailiwind CSS to work you must also run:

```sh
  npm run dev
```

#
### Resources

1\. Database structure in DrawSQL:
```sh
https://drawsql.app/teams/skeleton-team/diagrams/coronatime
```
<img src="readme/assets/drawsql.png" width="100%" height="500" style="position: relative; top: 5px" />