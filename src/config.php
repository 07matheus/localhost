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

  $retorno = json_decode($sites, true);

  if(!is_null($id)) $retorno = isset($retorno[$id]) ? $retorno[$id]: [0];

  return $retorno;
}

function removerSite($id) {
  $status = false;
  $sites  = getSites();

  if(isset($sites[$id])) {
    unset($sites[$id]);
    setSites($sites, true);
    $status = true;
  }

  return $status;
}

function formatarSite($nome, $url, $drop = []) {
  $dados = [
    'nome' => $nome,
    'url'  => $url
  ];

  if(!empty($drop)) $dados['drop'] = $drop;

  return $dados;
}

function setSites($dados = [], $forcar = false) {
  if(empty($dados) && !$forcar) return;

  $dados = setJson($dados);
  file_put_contents(CONFIG, $dados);
}

function setJson($dados = []) {
  if(!is_array($dados)) $dados = [];

  return json_encode($dados, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

function getLayout($dir, $nameFile) {
  $path = HTML . $dir . '/' . $nameFile.'.html';
  $layout = '';
  
  if(file_exists($path)) $layout = file_get_contents($path);

  return $layout;
}

function setLayout($targets = [], $layout) {
  if(!empty($targets)) {
    foreach($targets as $target => $replace) {
      if(is_array($replace)) continue;

      $layout = str_replace('{{'.$target.'}}', $replace, $layout);
    }
  }

  return $layout;
}

function getMensagemAlerta($tipo, $mensagem) {
  $tipo = !in_array($tipo, ['success', 'danger', 'warning']) ? 'success': $tipo;
  
  // DEFINE DADOS DO ALERTA
  $layout = [
    'tipo'     => $tipo,
    'mensagem' => $mensagem
  ];

  return setLayout($layout, getLayout('alerta', 'html-alerta'));
}

// ADICIONA O ARQUIVO DE SITES
if(!file_exists(CONFIG)) setSites([], true);

$constantesJS = [
  'const URL="'.URL.'";'
];

$app = [
  'variaveisJS' => implode("\n", $constantesJS)
];
