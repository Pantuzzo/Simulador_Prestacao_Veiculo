# PRE REQUISITO
- Node.js
- NPM
- php 8
- vue 3
- composer
- mysql

# Despesas
 Teste Seletivo Listra Digital

# PARA INSTALAR
- npm install
- npm i laravel-mix cross-env --save-dev
- npm i laravel-mix cross-env --save-dev
- composer dump-autoload
- composer install --no-scripts
- composer update
- composer install
- npm install v-money
- npm install autoprefixer@10.4.5 --save-exact

# CONFIGURAÇÕES
- renomar o .env.example para .env 
- criar um database despesas

## CONEXÕES
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=veiculo
- DB_USERNAME=root
- DB_PASSWORD=root

# EXTENSÕES
- extension=pdo_mysql
- extension=openssl
- extension=mbstring
- extension=fileinfo
- extension=curl
- extension=openssl

# migration
- php artisan migrate

# seed
## Caso queira popular o banco com exemplos, basta rodar o comando abaixo
- php artisan db:seed --class=VeiculosTableSeeder

# Como rodar o projeto
- npm run watch
- php artisan serve

