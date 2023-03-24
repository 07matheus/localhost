<?php
require_once dirname(__FILE__) . '/../config.php';

$conteudo = getLayout('listagem', 'html-listagem');

echo $conteudo;