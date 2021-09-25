# basic_php_webdev-master

## setup (docker)
docker-compose up -d

参照: https://qiita.com/TAMIYAN/items/ed9ec892d91e5af962c6

- イメージのビルド
$ Docker-Compose build

- コンテナの作成
$ Docker-Compose up -d

- 起動したコンテナにログイン
$ docker-compose exec db bash

- MySQLを起動
$ mysql -u root -p -h 127.0.0.1

- この後パスワードを入力して完了
