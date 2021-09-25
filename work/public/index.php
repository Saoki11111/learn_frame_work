<?php

var_dump($_SERVER['REQUEST_URI']);
if (empty ($_SERVER['REQUEST_URI'])) {
  echo 'hoge';
  exit;
}
