# Miscellaneous

## Autoloading

Uses Composer PSR-4 autoloading. Namespaces match directories.

## Helpers

Located in `app/Helpers/function.php`, add global utilities like session or URL helpers.

## Error Handling

Logs are stored in `storage/logs`. Error display depends on `APP_ENV`.

## Sessions

Configured in `config/session.php`, started in `bootstrap/session.php`.