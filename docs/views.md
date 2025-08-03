# Views

Templates are located in `resources/views`. Structure:

- `layouts/` — base layouts (e.g., `main.php`)
- `pages/` — content pages
- `errors/` — error pages

Route to controller (config/routes.php):

```php
'' => [PageController::class, 'home'],
```

Rendering from a controller (src/Controllers/PageController):

```php
    public function home(): array
    {
        return [
            'view' => 'pages/home',
            'data' => [
                'h1_content' => 'MVC Starter by poddfonarem',
            ]
        ];
    }
```
