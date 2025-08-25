# Models

The base model class uses PDO.

```php
class Auth extends BaseModel
{
    private static ?self $instance = null;

    public function login($nickname, $password): array
    {
        if (!$nickname || !$password) {
            return ['error' => 'Помилка отримання ніку та паролю'];
        }

        $sql = "SELECT * FROM 3eus.users WHERE nickname = :nickname";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return [
                    'user_id' => $user['id'],
                    'nickname' => $user['nickname'],
                    'logged' => true
                ];
            } else {
                return ['error' => 'Невірний пароль'];
            }
        } else {
            return ['error' => 'Користувача з таким нікнеймом не знайдено'];
        }
    }
}
```

Database connection is configured in `config/database.php`. Models are stored in `app/Models`.
