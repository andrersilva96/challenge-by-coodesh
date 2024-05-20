### 🔴 This package uses Laravel v11.

👉 Requirements:

1. PHP 8.3
2. Node 21
3. Composer
4. MySQL
5. Redis

### 🟢 To install this project run the script bellow:

```
composer install --no-dev --prefer-dist --optimize-autoloader --ignore-platform-reqs
php artisan key:generate
php artisan migrate:fresh
php artisan db:seed
php artisan storage:link
npm install
npm run build
php artisan optimize
```
