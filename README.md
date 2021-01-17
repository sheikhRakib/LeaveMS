<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# LeaveMS
LeaveMS is a web-based Leave Management System based on Laravel framework (v8) where we can track leave applications of employees. In this system, employees can apply for leave, and then the Line Manager will process the application. When a new leave application is made, line managers will get notified by a push and email notification. Similarly, if the application is approved then both the applier and payroll managers will get a notification via mail and push. And if the application gets rejected only the applier will get the notification.

### Framework
1. Laravel (version 8)

## Install
01. `git clone https://github.com/sheikhRakib/LeaveMS.git`
02. `cd LeaveMS`
03. `composer update`
04. `cp .env.example .env`
05. `php artisan key:generate`
06. `php artisan migrate --seed`
07. `php artisan serve`
08. `php artisan queue:work`

## Note
* Only Line manaagers and Admins can process an application. Payroll managers will only notified if any application is approved.
* To get full functionality, a mailer service needs to be set-up.  

## Default and demo users 
email            | password
-----------------|---------
admin@mail.com   | 12345
payroll@mail.com | 12345
line@mail.com    | 12345 
user@mail.com    | 12345

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
