# Laravel Television microservice

## Description

In this project Laravel Sail have been installed. It provides a convenient way to set up a Laravel project using Laravel Sail, a lightweight Docker development environment for Laravel.

## Installation

1. Clone the repository:
````
git clone https://github.com/websergcode/soc-education
````
2. Install dependencies:
````
composer install
````

3. There is no need to copy the `.env.example` file to `.env` as because it's a mock project `.env` was added to git to speed up deployment (please don't do this in your professional practice)
4. Create alias:
````
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
````
5. Start server
````
sail up -d
````
6. Run migrations
````
sail artisan migrate
````
7. Visit http://localhost/televisions

## Contact

You can write to me on Telegram [Web Code Dev](https://t.me/web_code_dev) for discussions and support.

![Telegram Group](https://img.shields.io/badge/Telegram-Web%20Code%20Dev-blue?logo=telegram)

