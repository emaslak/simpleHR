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
4. Create mysql database for the project
5. Rename `.env.example` file to `.env` and set appropriate configuration
6. `php artisan migrate`
7. `php artisan db:seed` (for dummy data)
8. `php -S {host}:{port} -t public/`
9. Navigate to `http://{host}:{port}` in your browser :)