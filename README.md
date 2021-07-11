# rese-api

飲食店予約サービスのバックエンドです。

## プロジェクトセットアップ
```
git clone https://github.com/tekpro-s/rese-api.git rese-api
cd rese-api/
composer install
```
## MySQL接続・マイグレーション・シーディング
ターミナルでMySQL設定
```
CREATE DATABASE dbpj;
USE dbpj;
quit;
```

.env.exampleをもとに.envを作成し、MySQL接続情報を設定
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbpj
DB_USERNAME=root
DB_PASSWORD=（MySQLのパスワード）
```

マイグレーション
```
php artisan migrate
```

シーディング
```
php artisan db:seed
```


## Laravelサーバー立ち上げ
```
php artisan serve
```
