web: vendor/bin/heroku-php-apache2 public/ 
worker: php artisan queue:listen --daemon --scale=1
twitter: php artisan dashboard:listen-twitter-mentions --daemon --scale=1

