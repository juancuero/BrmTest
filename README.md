# BrmTest - Juan Cuero

A simple store for testing purposes. Based on Laravel 5.8. Where the administrator user can manage the inventory of products. Customers can register, manage a shopping cart and view the invoice in PDF with the Dompdf library.
## Requirements

- Laravel 5.8
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Installation

Clone the repository

    git clone https://github.com/juancuero/BrmTest.git
  
 Switch to the repo folder

    cd BrmTest

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations and default data

    php artisan migrate --seed

This will create some products and a new user that you can use to sign in :
```yml
email: juan.cuero@unillanos.edu.co
password: juan12345
```
    
Start the local development server

    php artisan serve
