###Install vendor libraries via composer navigate to the root folder of the project (where composer.json is located) run:

composer install
composer update

###Virtual Host ConfiguratioN:

apache\conf\extra\httpd-vhosts.conf

<VirtualHost 127.0.0.1:80>
    DocumentRoot "D:/xampp7/htdocs/article_manager/public/"
    DirectoryIndex index.php
    ServerName article.local
    <Directory "D:/xampp7/htdocs/article_manager/public/">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        Order Deny,Allow
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>


###Virtual Host Configuration:
### Append to host file: C:\Windows\System32\drivers\etc

    127.0.0.1   localhost   article.local   

###Run migration:
###In your terminal/cli/bash command following  run the following commands:

composer dump-autoload
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ArticleSeeder

###Running the app, Execute the following command:

php artisan serve


###User Credentials

#Username: admin@gmail.com
#Password: password

