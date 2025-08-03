# Controllers

Controllers are located in `app/Controllers` and extend `App\Core\Controller`.

```php
class PagesController extends Controller {
    public function index() {
        $this->render('pages/home', ['title' => 'Home']);
    }
}
```

The `render` method displays the template with the given data.