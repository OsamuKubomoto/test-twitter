<?php
session_start();
require_once 'common.php';

// TwitterOAuth をインスタンス化
$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET
);

// コールバックURLをここでセット
$token = $connection->oauth(
  'oauth/request_token',
  array('oauth_callback' => OAUTH_CALLBACK)
);

// callback.phpで使うのでセッションに保存
$_SESSION = array(
  'oauth_token' => $token['oauth_token'],
  'oauth_token_secret' => $token['oauth_token_secret'],
);

// Twitter.comの認証画面のURLを取得
$url = $connection->url(
  'oauth/authenticate',
  array(
    'oauth_token' => $token['oauth_token']
  )
);

// 認証画面へリダイレクト
header( 'location: '. $url );
