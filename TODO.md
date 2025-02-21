1. create project

```bash
composer create-project laravel/laravel <name>
cd <name>
```

1. (optional) update `.env`

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=trevenque
DB_USERNAME=user
DB_PASSWORD=user
```

1. (optional) prepare compose

```bash
# database up
docker compose up -d

# database down
docker compose down -v
```

## basic api

1. install

```bash
php artisan install:api
```

## create models

### category

```bash
php artisan make:model -f -c -s -m Category
```

- update migration
- update model
- update factory
- update seeder / `DatabaseSeeder`
- move controller to Api
- update controller
- update route
- (optional) test

```bash
php artisan make:test Api/CategoriesTest
```

### product

```bash
php artisan make:model -f -c -s -m Product
```

- update migration
- update model / update category
- update factory
- update seeder / `DatabaseSeeder`
- move controller to Api
- update controller
- update route
- (optional) test

```bash
php artisan make:test Api/ProductsTest
```

### product image

```bash
php artisan make:model -f -c -s -m ProductImage
```

- update migration
- update model
- update factory
- update products controller
- (optional) ? update products test

## basic view

1. start server

```bash
php artisan migrate
php artisan serve
```

1. create controller

```bash
php artisan make:controller ProductController
```

1. update routes
1. create layout
1. add bootstrap cdn
1. add theme.js
1. create index
1. basic navbar with switch

```bash
php artisan make:component layouts.navbar --view
```

1. update controller
1. create product views
