for template : 
 https://github.com/almasaeed2010/AdminLTE

for Permission : 
```bash
php artisan permission:create-role Admin  
php artisan permission:create-role Manager  
php artisan permission:create-role Receptionist  
php artisan permission:create-role Client 
```

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
