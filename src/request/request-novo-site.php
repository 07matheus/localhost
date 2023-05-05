<?php
require_once dirname(__FILE__) . '/../config.php';

$response = getLayout('novo-site', 'html-novo-site');

if(isset($_POST) && !empty($_POST)) {
  $response = [
    'sucesso' => false,
    'message' => getMensagemAlerta('danger', 'Nenhum dado foi enviado')
  ];

  $nome      = $_POST['nomeSite'];
  $link      = $_POST['urlSite'];
  $https     = ($_POST['https'] == 's') ? 'https://': 'http://';
  $www       = ($_POST['www']   == 's') ? 'www.': null;
  $url       = $https . $www . $link;
  $continuar = true;

  if(!strlen($nome) || !strlen($url)) {
    $response['message'] = getMensagemAlerta('danger', 'Os campos "Nome do site" e "Url do site", são obrigatórios');
    $continuar           = false;
  }

  if($continuar) {
    $sites = getSites();
    $site  = formatarSite($nome, $url);

    $sites[] = $site;

    setSites($sites);

    $response['sucesso'] = true;
    $response['message'] = getMensagemAlerta('success', 'Site cadastrado com sucesso!');
  }

  $response = setJson($response);
}

echo $response;