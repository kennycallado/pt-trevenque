# PT-Trevenque

## Get the project

```bash
git clone https://github.com/kennycallado/pt-trevenque
cd pt-trevenque
```

## Solve dependencies

### system

- php >= 8.2
- composer

### project

```bash
composer install
```

## Prepare the environment

- Copy `.env.example` to `.env`

```bash
cp .env.example .env
```

In case you want to use the sqlite database, you can skip this step.

- Update `.env`

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

- Execute the migrations and seeders

```bash
php artisan migrate:refresh --seed
```

## Testing endpoints

I have provided a `rest.http` with some examples of how to use the API. You can use it with the `REST Client` extension for Visual Studio Code or `kulala.nvim` plugin for neovim. Anyway I also provide the curl commands for each endpoint.

### Endpoints

#### Categories

1. index

```bash
curl -X 'GET' -v -s -H 'Accept:application/json' 'http://localhost:8000/api/categories'
```

1. show

```bash
curl -X 'GET' -v -s -H 'Accept:application/json' 'http://localhost:8000/api/categories/2'
```

1. create

```bash
curl -X 'POST' -v -s -H 'Accept:application/json' -H 'Content-Type:application/json' --data-binary '{"name": "Category X"}' 'http://localhost:8000/api/categories'
```

1. update

```bash
curl -X 'PUT' -v -s -H 'Accept:application/json' -H 'Content-Type:application/json' --data-binary '{"name": "Category 2"}' 'http://localhost:8000/api/categories/2'
```

1. delete

```bash
curl -X 'DELETE' -v -s -A 'kulala.nvim/4.10.0' 'http://localhost:8000/api/categories/2'
```

#### Products

1. index

```bash
curl -X 'GET' -v -s -H 'Accept:application/json' 'http://localhost:8000/api/products'
```

1. show

```bash
curl -X 'GET' -v -s -H 'Accept:application/json' 'http://localhost:8000/api/products/2'
```

1. create

```bash
curl -X 'POST' -v -s -H 'Accept:application/json' -H 'Content-Type:application/json' --data-binary '{"name": "Name Foo", "stock": 1,    "price": 10.5, "active": true, "category_id": 1}' 'http://localhost:8000/api/products'
```

1. update

```bash
curl -X 'PUT' -v -s -H 'Accept:application/json' -H 'Content-Type:application/json' --data-binary '{"name": "Name 6", "stock": 12, "price": 10.60, "active": true, "category_id": 1}' 'http://localhost:8000/api/products/1'
```

1. delete

```bash
curl -X 'DELETE' -v -s -A 'kulala.nvim/4.10.0' 'http://localhost:8000/api/products/1'
```

#### Images

1. create

```bash
curl -X 'POST' -v -s -H 'Accept:application/json' -H 'Content-Type:application/json' --data-binary '{"image": "https://picsum.photos/400/400?t=ab"}' 'http://localhost:8000/api/products/2/images'
```

1. delete

```bash
curl -X 'DELETE' -v -s -H 'Accept:application/json' 'http://localhost:8000/api/products/2/images/2'
```
