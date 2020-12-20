# Project set-up

## Root Directory

> Update env from .env.example

> Create Db and update credentials

> Get capcha credentials from [here](https://www.google.com/recaptcha/admin) and update env

> Set up a mail driver and update env

### Run the following commands from root directory

> composer install 

> npm install

> npm run dev

> php artisan migrate

## Server setup

> Make host file entry `\Windows\system32\drivers\etc\hosts` as `127.0.0.1      activity.test`

> Run the command `php artisan serve --host=activity.test`

> Open [Project](http://activity.test:8000) in browser