# Controllers

Controllers are located in `app/Controllers` and extend `App\Core\BaseController`.

```php
class PageController extends BaseController
{
    public function home(): array
    {
        return [
            'view' => 'pages/home',
            'data' => [
                'h1_content' => '3eus Starter by poddfonarem',
            ]
        ];
    }
```

The `render` method displays the template with the given data.
