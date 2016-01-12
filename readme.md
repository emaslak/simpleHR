# Test HR system

This is a small HR system, which allows you to add/remove/edit employees, calculate their vacations (without holidays) and track vacations taken. App is written on lumen framework.

## Requirements
* PHP >= 5.5.9
* PDO PHP Extension
* Composer

## Installation
1. Clone repository
2. Navigate through commandline to project root directory
3. `composer install`
4. `php artisan migrate`
5. `php artisan db:seed` (for dummy data)
6. `php -S {host}:{port} -t public/` 
7. Navigate to `http://{host}:{port}` in your browser :)