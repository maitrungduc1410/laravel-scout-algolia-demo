# Laravel Scout and Algolia demo

# Demo
Link of my demo: [https://arcane-bayou-33967.herokuapp.com/](https://arcane-bayou-33967.herokuapp.com/)

# Install Instruction

- Clone this project
- Run: `composer install` and `npm install` 
- Setup your database information
- Go to `algolia.com` and create an account. 
- Add these lines to bottom of your `.env` file:
	- SCOUT_QUEUE = true
	- ALGOLIA_APP_ID = {YOUR_ALGOLIA_APP_ID}
	- ALGOLIA_SECRET = {YOUR_ALGOLIA_ADMIN_SECRET}
- Finally, run `php artisan migrate --seed`. It will take a while to seed data. In this example I set it to 7500 rows. 
- Then, run `php artisan serve` and `npm run watch` (in another terminal) to boot your app 
- Access: [http://localhost:8000](http://localhost:8000) and try to search anything.
