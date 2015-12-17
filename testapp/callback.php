<?php
session_start();
require_once 'common.php';

// トークン妥当性チェック
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
    die('Error!');
}

// OAuthトークンを加えてTwitterOAuthをインスタンス化
$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET,
  $_SESSION['oauth_token'],
  $_SESSION['oauth_token_secret']
);

// access_tokenを取得
$access_token = $connection->oauth(
  "oauth/access_token",
  array(
    "oauth_verifier" => $_REQUEST['oauth_verifier']
  )
);

// 取得したアクセストークンとシークレットでTwitterOAuthをインスタンス化
$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET,
  $access_token['oauth_token'],
  $access_token['oauth_token_secret']
);

// ユーザー情報をGET
$user = $connection->get("account/verify_credentials");

// ユーザーデータを追加保存
$data = unserialize(file_get_contents('./users.dat'));
if (!is_array($data)) {
  $data = array();
}
$data[(string)$user->id] = array(
  'access_token' => $access_token['oauth_token'],
  'oauth_token_secret' => $access_token['oauth_token_secret'],
);
file_put_contents('./users.dat', serialize($data));

// リダイレクト
header( 'location: /complete.php' );
