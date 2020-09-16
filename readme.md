## Installation

Clone Repository

`git clone https://github.com/mohamedjs/-blog_task.git`

Move to the newly created directory

`cd blog_task`

Create a new .env file from .env.example

`cp .env.example .env`

Now edit your .env file and set your env parameters (Specially the database username/pass, database name)

Install dependencies

`composer install`

`yarn install`

Generate a new key for your app

`php artisan key:generate`

install node module

`npm i`

Run Mix to build assets and js

`npm run dev`

Reload Database

`php artisan migrate:refresh --seed`

Done, You're ready to go

`php artisan serve`
