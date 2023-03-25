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

  return $retorno;
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

  $dados = json_encode($dados, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  file_put_contents(CONFIG, $dados);
}

function getLayout($dir, $nameFile) {
  $path = HTML . $dir . '/' . $nameFile.'.html';
  $layout = '';
  
  if(file_exists($path)) $layout = file_get_contents($path);

  return $layout;
}

function setLayout($target, $replace, $layout) {
  return str_replace('{{'.$target.'}}', $replace, $layout);
}

function getMensagemAlerta($tipo, $mensagem) {
  $tipo = !in_array($tipo, ['success', 'danger', 'warning']) ? 'success': $tipo;

  $alerta = getLayout('alerta', 'html-alerta');
  
  // DEFINE DADOS DO ALERTA
  $alerta = setLayout('tipo', $tipo, $alerta);
  $alerta = setLayout('mensagem', $mensagem, $alerta);

  return $alerta;
}

// ADICIONA O ARQUIVO DE SITES
if(!file_exists(CONFIG)) setSites([], true);

$constantesJS = [
  'const URL="'.URL.'";'
];

$app = [
  'variaveisJS' => implode("\n", $constantesJS)
];
