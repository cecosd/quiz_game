# Quiz Game

This is a simple Quiz Game with two game modes:
1. Binary
2. Optional

To install and enjoy the game:
1. Start a local server with the following command: 
php -S 127.0.0.1:8000
This will start the routing system
2. Use the SQL file in the root folder called quiz_game.sql to create the database and to seed some questions and options
3. If you like you can add more questions using the admin panel located in /admin
4. The admin panel form is basic, so please will everything in it to be able to use the question afterwards.
5. Enjoy!

Development workflow:

1. Finding a working structure of the database. The relation between QUESTIONS and OPTIONS is oneToMany by OPTIONS.QUESTION_ID = QUESTIONS.ID
2. Creating the App\Database\DB::class connector using PHP PDO(PHP Data Object) with connection data from the ENV.php file.
3. Creating the App\Services\GameRervice::class for managing the databse fetching and forming the response data for the front end;
4. Creating a basic routing system for managing the API requests in the application. Code inspiration from:
https://medium.com/the-andela-way/how-to-build-a-basic-server-side-routing-system-in-php-e52e613cf241
5. Creating a bootstrap file for getting code up and running: autoloader, env, routes;
6. Creating a resources folder for the views for front end and admin;
7. Using Vue.JS for creating a Single Page Application.
