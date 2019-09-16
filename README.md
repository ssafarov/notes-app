# Simple notes app.

**Author:** Sergei Safarov <inbox@sergeyasfarov.com>  

Notes app: Sample Laravel + VueJS crud application.
This is proof-of-concept/demo application.


### Functions/requests
* There should be a list of all notes.
* You should be able to add a note.
* You should be able to edit a note.
* The notes should be persisted and retrieved via a service.
* You should be able to go straight to a note if specified in the url.

### Minimums requirements
* PHP 7.1.x and above
* MySQL 5.6 / MariaDB
* NPM package manager
* Composer package manage

### Technologies/frameworks used 
* Laravel 5.8 for backend and api
* Vue.JS for frontend

### Installation 
1. Clone repo from the URL: https://github.com/ssafarov/notes-app.git
2. Goto folder where you cloned the repo.
3. Create your own configuration file by copying **.env.local** file into **.env**
4. Adjust database section in the your **.env** file: set the DB server name, port, database name and user credentials
5. Create an empty database with the parameters specified above.
6. Open the console and run following commands, one by one:
```
npm install
composer install
composer dump-autoload
php artisan migrate
npm run dev
php artisan serve
```  
After the last command you'll see laravel server output:
> Laravel development server started: <http://127.0.0.1:8000>

7. Open your browser and proceed to the dev server URL. (http://127.0.0.1:8000 in this example) 
8. You should see the application welcome screen, where you can select between app versions and and test them.
9. Enjoy!
10. Also you can run some basic unit and browser tests but the following command:
```
phpunit
php artisan dusk 
```
> **Please note:** you'll need to have Chrome version 76 as a minimum, to run Laravel Dusk tests
11. Enjoy! Finally!

### License
MIT: [http://mit-license.org](http://mit-license.org)
