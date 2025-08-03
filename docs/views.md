# Views

Templates are located in `resources/views`. Structure:

- `layouts/` — base layouts (e.g., `main.php`)
- `pages/` — content pages
- `errors/` — error pages

Rendering from a controller:

```php
$this->render('pages/home', ['title' => 'Home']);
```