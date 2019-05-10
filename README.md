# StemApp 2.0

This is the repository for StemApp 2.0

## Tech
* [Laravel]
* [React]
* [Postgres]

## Getting started

First setup your development environment, I recommend using either [valet] or [homestead].  
Clone the repository somewhere:
```bash
git clone git@github.com:WesleyKlop/ipsen5.git && cd ipsen5
```
Install the needed dependencies using composer and NPM(though I would recommend using yarn)
```bash
composer install
npm install # or yarn install
```
You can now run the application (see homestead/valet documentation or use `php artisan serve`)  
While developing the frontend react part of the application you should run this to compile your code:
```bash
npm watch 
```
// TODO@Wesley: Setup hot reloading

## Database
Laravel includes db migrations, so if you're using a local test db you can run the following pieces of code:
```bash
php artisan migrate # optional: use migrate:fresh to rerun all migrations
```
You can also seed your db with dummy data(provided that there are seeders for it)
```bash
php artisan db:seed
```

For more info on migrations and stuff, RTFM.

[Laravel]: https://laravel.com/docs/5.8/
[React]: https://reactjs.org/
[Postgres]: https://www.postgresql.org/
[valet]: https://laravel.com/docs/5.8/valet
[homestead]: https://laravel.com/docs/5.8/homestead
