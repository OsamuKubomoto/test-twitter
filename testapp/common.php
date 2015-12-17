<?php
// Twitter API を利用するための Twitter Apps の情報を入れる
define('CONSUMER_KEY', '');
define('CONSUMER_SECRET', '');
define('OAUTH_CALLBACK', 'http://localhost:8080/callback.php');

// パッケージを読み込む
require_once '../vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
