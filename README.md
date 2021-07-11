# rese-api

飲食店予約サービスのバックエンドです。

## Project setup
```
git clone https://github.com/tekpro-s/rese-api.git rese-api
cd rese-api/
composer install
yarn install
```
## MySQLDB接続・マイグレーション・シーディング
```
**MySQLDB設定**
MySQL
CREATE DATABASE dbpj;
USE dbpj;
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'MySQLのパスワード';
flush privileges;
quit;

**.env.exampleをもとにMySQLDB接続情報を設定**
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbpj
DB_USERNAME=root
DB_PASSWORD=（MySQLのパスワード）

**マイグレーション**
php artisan migrate

**シーディング**
php artisan db:seed
```


## Laravelサーバー立ち上げ
```
php artisan serve
```
