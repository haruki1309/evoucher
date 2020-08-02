# Evoucher With Blockchain

## Installation requirement

Firstly, you must have installed one php localhost server like xampp, ampp stacks, laragon, wamppserver,... In this project, i used xampp for localhost environment.
- [XAMPP](https://www.apachefriends.org/index.html)

Secondly, let's install composer - a dependency manager for PHP. Composer is used in all modern PHP frameworks, we'll use this to install laravel project.
- [Composer](https://getcomposer.org/doc/01-basic-usage.md)

After cloning this project, get neccessary packages and make sure you're put it in xampp\htdocs before going to run it.

Move to project directory, then open terminal (or command line) there and run:
1. Install composer to your project
```bash
composer install
```
2. Create .env file to config environment for our laravel webapp. Just copy .env.example to .env and config it
```bash
copy .env.example .env
```
3. Create laravel application's key
```bash
php artisan key:generate
```

I created database migrations and seeders:

1. Config your mysql database to .env file. Remember charset of DB is utf8_unicode_ci.
2. After that, rum below commands to create tables and fake data 
```bash
php artisan migrate
```

```bash
composer artisan db:seed
```

To run this web, open your browser and type
```bash
localhost/evoucher/public/
```

## Built with

- [Laravel](https://laravel.com/) - An open source web application framework developed by Taylor Otwell
- [Boostrap 4](https://getbootstrap.com/) - An open source for front-end web application development.
- [jQuery](https://jquery.com/) - A feature-rich JavaScript library.

## Dependencies

- [SB Admin 2](https://startbootstrap.com/themes/sb-admin-2/) - A free Bootstrap 4 admin theme built with HTML/CSS and a modern development workflow environment ready to use to build your next dashboard or web application.

## Authors

- Bùi Trung Tín - 16521239 - trungtin0904@gmail.com
- Trần Thị Cẩm Tú - 16521351
