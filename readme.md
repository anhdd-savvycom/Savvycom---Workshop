# System Requirement
These are requirements of Laravel 5.2:

1. PHP >= 5.5.9
2. OpenSSL PHP Extension
3. PDO PHP Extension
4. Mbstring PHP Extension
5. Tokenizer PHP Extension

# Installation Guide

After cloning this repo, we need to:

*All commands will be run inside root directory*

1. Install composer packages: run command

    composer install
2. Install npm packages (optional, if you want to use elixir): run command
    
    npm i
3. Config with .env file:
    
    Copy .env.example to .env and update this file. Only database is needed.
4. Migrate and seed database: run command

    php artisan migrate
    
    php artisan db:seed
5. DONE!
