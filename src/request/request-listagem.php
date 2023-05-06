<?php
require_once dirname(__FILE__) . '/../config.php';

$conteudo = getLayout('listagem', 'html-listagem');

// ADICIONA OS ITENS AO LAYOUT
$conteudo = setLayout(['itens' => getLayoutItensListagem()], $conteudo);

echo $conteudo;