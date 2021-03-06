## 前提

* 実行環境にPHPがインストールされていることが前提です。


## 準備

1. アプリを登録してください

※デベロッパー登録やアプリの登録手順は下記ページがわかりやすいです
https://syncer.jp/twitter-api-matome

2. common.phpに必要な情報を入れてください

3. パッケージをダウンロードしてください

    cd /path/to/test-twitter
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install


## テスト手順

1. コマンドプロンプトで下記を実行してください

    cd /path/to/test-twitter/testapp
    php -S localhost:8080

2. 登録したいTwitterアカウントにログインして、同じブラウザ上でlogin.phpにアクセスしてください。
   登録完了画面が表示されればOKです。

3. 登録したいTwitterアカウントの数だけ上記2の手順を繰り返してください。

4. tweet.phpにアクセスしてください。

5. 登録したTwitterアカウント全員で、同じツイートを実行したことを確認してください。


## カスタマイズについて

* 今回はusers.datに各Twitterアカウントを保存しましたが、実際はMySQLに保存する形になると思います。
* 今回は登録したアカウント全員が同じツイートを実行していますが、
  実際は登録されているアカウントの中から１つ任意のアカウントを指定して、個別のツイートを実行する形になると思います。
