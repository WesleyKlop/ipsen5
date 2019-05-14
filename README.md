StemApp 2.0
===========

This is the repository for StemApp 2.0

## Tech
* [Laravel]
* [React]
* [Postgres]
* [Composer]
* [Yarn]

## Getting started

First setup your development environment, I recommend using either [valet] or [homestead].  
Clone the repository somewhere:
```bash
git clone git@github.com:WesleyKlop/ipsen5.git && cd ipsen5
```
Install the needed dependencies using composer and yarn(alternative to npm)
```bash
composer install
yarn install
```
You can now run the application (see homestead/valet documentation or use `php artisan serve`)  
While developing the frontend react part of the application you should run this to compile your code:
```bash
yarn watch 
```
If you want a better frontend development experience without having to manually reload, you should use this:
```bash
yarn hot
```

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

## Workflow

We use [Git Flow] to try and force everyone to keep to a certain workflow. When starting a new feature you can do this:
```bash
git flow feature start my-feature-name
```
When you've done some commits you can create a pull request on [/WesleyKlop/ipsen5/pull](https://github.com/WesleyKlop/ipsen5/pull/)  
Releases will be done every sprint by the repository owner.

[Git Flow]: https://nl.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow
[Laravel]: https://laravel.com/docs/5.8/
[React]: https://reactjs.org/
[Postgres]: https://www.postgresql.org/
[Composer]: https://getcomposer.org/
[Yarn]: https://yarnpkg.com/
[valet]: https://laravel.com/docs/5.8/valet
[homestead]: https://laravel.com/docs/5.8/homestead
