<?php
require_once dirname(__FILE__) . '/../config.php';

$response = [
  'status'   => false,
  'mensagem' => getMensagemAlerta('danger', 'Os dados enviados são inválidos!')
];

if(!empty($_POST) || isset($_POST['idSite']) || is_numeric($_POST['idSite'])) {
  $idSite               = $_POST['idSite'];
  $response['mensagem'] = getMensagemAlerta('danger', 'Não foi possível remover o site informado. Tente novamente mais tarde!');

  if(removerSite($idSite)) {
    $response['status']   = true;
    $response['mensagem'] = getMensagemAlerta('success', 'Site removido com sucesso!');
  }
}

echo setJson($response);