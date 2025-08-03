# Models

The base model class uses PDO.

```php
class User extends Model {
    protected $table = 'users';
}
```

Database connection is configured in `config/db.php`. Models are stored in `app/Models`.