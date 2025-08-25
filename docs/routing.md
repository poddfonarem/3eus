# Routing

Routes are defined in `routes/web.php`. Example:

```php
return [
    'routes' => [
        '' => [PageController::class, 'home'],
        '403' => [PageController::class, 'show403'],

        // handlers
        // ...
    ],

    'noBuilderPages' => [

        // min layout pages
        'pagesWithLayout' => [],

        // no layout pages
        'pagesWithoutLayout' => [],
    ]
];
```

The router matches the URL to the corresponding controller and method.
