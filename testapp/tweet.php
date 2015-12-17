<?php
require_once 'common.php';

$data = unserialize(file_get_contents('./users.dat'));

// 登録ユーザー全員でツイートする
foreach ($data as $key => $val) {
  $connection = new TwitterOAuth(
    CONSUMER_KEY,
    CONSUMER_SECRET,
    $val['access_token'],
    $val['oauth_token_secret']
  );
  // テストなのでここでは全員同じコメントをツイートする
  $connection->post("statuses/update",
    array("status" => "this is test for twitterapi!!!!"));
}
