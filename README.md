# Readme

Book catalog API

## Description

The project uses the PHP framework Symfony 6.4 and the powerful API Platform tool for API development.

## Requirements

* PHP 8.1 or higher

## Installation

1. Clone the repository to your local machine into the chosen folder (for example, using HTTPS):
   ```
   git clone https://github.com/zabolserg/book_catalog_rest_api.git
   ```
2. Create a `.env` file in the root folder of the cloned project. Add default Symfony content to this file:
   ```
   # In all environments, the following files are loaded if they exist,
   # the latter taking precedence over the former:
   #
   #  * .env                contains default values for the environment variables needed by the app
   #  * .env.local          uncommitted file with local overrides
   #  * .env.$APP_ENV       committed environment-specific defaults
   #  * .env.$APP_ENV.local uncommitted environment-specific overrides
   #
   # Real environment variables win over .env files.
   #
   # DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
   # https://symfony.com/doc/current/configuration/secrets.html
   #
   # Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
   # https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration
   
   ###> symfony/framework-bundle ###
   APP_ENV=dev
   APP_SECRET=6dba6c20513bac6f252d00cbc5ad07da
   ###< symfony/framework-bundle ###
   
   ###> doctrine/doctrine-bundle ###
   # Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
   # IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
   #
   # DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
   # DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
   # DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
   DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
   ###< doctrine/doctrine-bundle ###
   
   ###> nelmio/cors-bundle ###
   CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'
   ###< nelmio/cors-bundle ###
   ```
3. Configure the database connection in this file.
4. Run composer:
   ```
   composer install
   ```
5. Execute migrations to create tables
   ```
   php bin/console doctrine:migrations:migrate
   ```
