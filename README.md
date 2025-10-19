# 3eus Starter
![Main Banner](docs/screenshoots/v2.1.jpg)

## Description

A lightweight starter template for PHP projects using MVC architecture. It includes routing, views, controllers, PDO-based models, autoloading, and configuration system.

## Installation

```bash
git clone https://github.com/poddfonarem/3eus.git my-project
cd my-project
composer install
cp .env.example .env
```

## Running

```bash
php -S localhost:8000 -t public
```

## Database Setup

You must set up your database separately before running the application.

1. Install and start MYSQL.
2. Create a database (e.g., `3eus`).
3. Update your `.env` file with the correct DB credentials:


## Documentation

- [Project Structure](docs/structure.md)
- [Routing](docs/routing.md)
- [Controllers](docs/controllers.md)
- [Models](docs/models.md)
- [Views](docs/views.md)
- [Configurations](docs/configs.md)
- [Misc: Helpers, Autoloading, Errors](docs/misc.md)
