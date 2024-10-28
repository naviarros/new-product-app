# To get started with the app, clone this repository thru
https://github.com/naviarros/new-product-app.git

# After cloning the repository, install necessary packages
composer install
composer require laravel/ui

# Run necessary package to enable vue
php artisan ui vue
npm install && npm run dev 

# After install the packages, run this command to migrate the migrations
php artisan migrate

# After migrating the migrations, to create seeder for user
php artisan db:seed --class=UserSeeder

# To create seeder for products, run
php artisan db:seed --class=ProductSeeder

# After creating seeder, run now the application
php artisan serve

# After serving the application, go to
/login

# The default password that is set on seeder is
password
