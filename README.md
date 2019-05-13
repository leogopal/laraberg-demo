# Laraberg Demo
This is a demo application for [Laraberg](https://github.com/VanOns/laraberg). A live version of this project can found over at [laraberg.io](http://laraberg.io).

# Setup


To get this project running locally first you have to run composer install:

```
composer install
```

Then you have to publish all vendor assets:

```
php artisan vendor:publish
```

Before running the database migrations you have to setup a database connection in the `.env` file. Then you can run:

```
php artisan migrate
```

# Starting the dev server

When you plan to make changes to JS or SASS files you have to let npm watch your file changes:
```
npm run watch
```

Then you can start the development server:

```
php artisan serve
```

