# MyZenTeam Test Assignment

## Requirements

[Click here to read requirements](./requirements.md)

## Pre-requisites

- Composer >= 2.3.5
- Node.js >= 16
- PHP >= 8.0
- Apache >= 2.4
- MySQL >= 5.6

## Technologies Used

- Laravel
- Vue.js
- PHPUnit
- Prettier (code formatter)
- Husky

## How to Install

- Install node_modules `npm install`
- Install vendor `composer install`
- Create a database
- Set environment
  - Copy `.env.example` as `.env`
  - `php artisan key:generate`
  - Set following variables and more you want
    ```
    ...
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[name of the DB you created]
    DB_USERNAME=root
    DB_PASSWORD=
    ...
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=[your email address]
    MAIL_PASSWORD=[your password]
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS=donotreply@mzt.com
    MAIL_FROM_NAME="${APP_NAME}"
    ...
    ```

## How to Run (1)

- `php artisan serve` to serve the app
- Navigate `https://127.0.0.1:8000` on your browser

## How to Run (2)

- Set your app on a virtual host domain. (apache/conf/extra/httpd-vhosts.conf)
- Run Apache
- Navigate app.domain.com on your browser

## How to Test (Just checked if prevented security holes)

- Create a database for testing.
- Set environment
  - Copy `.env` as `.env.testing`
  - Change `DB_DATABASE` as the name of DB you created for testing
- Run following commands.
  ```
  $ php artisan key:generate --env=testing
  $ php artisan config:cache
  $ php artisan config:clear
  $ php artisan cache:clear
  $ php artisan test
  ```

## Commands for devlopment

- `npm run prettier-fix` to beautify code
