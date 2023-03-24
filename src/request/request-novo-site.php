<?php
require_once dirname(__FILE__) . '/../config.php';

$response = getLayout('novo-site', 'html-novo-site');

if(isset($_POST) && !empty($_POST)) {
  $response = [
    'sucesso' => true,
    'message' => '
    <div class="mb-0 ms-1 py-1 alert alert-success alert-dismissible fade show" role="alert">
      <strong>O site foi criado com sucesso!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0;right: 10px;top: calc(75% - 16px);"></button>
    </div>'
  ];

  $response = json_encode($response, JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
}

echo $response;