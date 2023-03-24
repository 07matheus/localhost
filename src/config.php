<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

define('ROOT', __DIR__);
define('CONFIG', ROOT . '/resources/.sites.json');
define('HTML', ROOT . '/html/');
define('URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI']);

function getSites($id = null) {
  $sites   = file_get_contents(CONFIG);
  $retorno = [];

  $retorno = json_decode($sites);

  return $retorno;
}

function getLayout($dir, $nameFile) {
  $path = HTML . $dir . '/' . $nameFile.'.html';
  $layout = '';
  
  if(file_exists($path)) $layout = file_get_contents($path);

  return $layout;
}

$constantesJS = [
  'const URL="'.URL.'";'
];

$app = [
  'variaveisJS' => implode("\n", $constantesJS)
];
