<?php

if (empty ($_SERVER['REQUEST_URI'])) {
  exit;
}

// URL を '/' で分解
$array_parse_uri = explode('/', $_SERVER['REQUEST_URI']);
// 最後の文字
$last_uri = end($array_parse_uri);
// クエリ文字列外す
$call = substr($last_uri, 0, strcspn($last_uri, '?'));

// app/controller 配下に同盟の PHP ファイルがないか探す。
if (file_exists('../app/controlelr/' . $call . 'php')) {
  // 見つかったファイルをインクルードしコントローラをインスタンス化
  include('../app/controller/' . $call . 'php');
  $class = 'app\controller\\' . $call;
  $obj   = new $class();

  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // GET なら index メソッドを呼び出す
    $response = $obj->index();
  } else {
    // POST なら post メソッドを呼び出す
    $response = $obj->post();
  }

  // コントローラから戻された内容をレスポンスとして戻す。
  echo $response;
  exit;
} else {
  // ファイルがなければ 404 エラー
  header("HTTP/0 404 Not Found");
  exit;
}
