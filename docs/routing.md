# Routing

Routes are defined in `config/routes.php`. Example:

```php
return [
    '/' => ['PagesController', 'index'],
    '/about' => ['PagesController', 'about'],
];
```

The router matches the URL to the corresponding controller and method.