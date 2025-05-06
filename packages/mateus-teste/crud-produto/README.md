# Package para inserir CRUD de produtos e categoria

Lembrar de adicionar a barra lateral do menu do AdminLTE:

```
'menu' => [
    [
        'text' => 'Products',
        'route'  => 'products.index',
        'icon' => 'fas fa-box',
    ],
    [
        'text' => 'Categories',
        'route'  => 'categories.index',
        'icon' => 'fas fa-tags',
    ],
],
```

### 1 - Configurar no Projeto Principal:

composer.json:
```
"repositories": [
    {
        "type": "path",
        "url": "./packages/mateus-teste/crud-produto"
    }
],
"require": {
    "mateus-teste/crud-produto": "@dev"
}
```

executar: ```composer update```

### 2 - Publicar recurso:

```
php artisan vendor:publish --provider="MateusTeste\CrudAdminlte\CrudAdminlteServiceProvider"
```

lembrar de executar: ```composer dump-autoload```


### Obs: Não foi adicionado ao pacote inserções de dados de teste via Seeders/Factory
