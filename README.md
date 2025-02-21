# PT-Trevenque

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
