@echo off

composer install
run install
cp .env.example .env
php artisan key:generate

@REM php artisan migrate
@REM php artisan db:seed