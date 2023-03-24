<?php
require_once dirname(__FILE__) . '/../config.php';

$conteudo = getLayout('listagem', 'html-listagem');

$sites       = getSites();
$layoutItens = '';

// MONTA OS ITENS
if(!empty($sites)) {
  $layoutItens = getLayout('listagem', 'html-listagem-item');
}

// ADICIONA OS ITENS AO LAYOUT
$conteudo = setLayout('itens', $layoutItens, $conteudo);

echo $conteudo;