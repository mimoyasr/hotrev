for template : 
 https://github.com/almasaeed2010/AdminLTE

# notification configration
step 1 : 

in .nav file put make the values like that :

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xyz@gmail.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
QUEUE_DRIVER=database
```
step 2 :

run the commend : 

```
php artisan queue:work 
```
=========================
stripe:

composer require stripe/stripe-php

