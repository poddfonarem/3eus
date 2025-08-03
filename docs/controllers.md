# Controllers

Controllers are located in `src/Controllers` and extend `src\Core\BaseController`.

```php
class PageController extends BaseController
{
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

The `render` method displays the template with the given data.
