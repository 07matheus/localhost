<?php
require_once dirname(__FILE__) . '/../config.php';

$conteudo = getLayout('listagem', 'html-listagem');

$sites       = getSites();
$layoutItens = '';

// MONTA OS ITENS
if(!empty($sites)) {
  $itemListagem = getLayout('listagem', 'html-listagem-item');

  foreach($sites as $idItemPrincipal => $site) {
    if(isset($site['drop'])) {
      foreach($site['drop'] as $idItemDrop => $itemDrop) {
        $itemDrop['id'] = $idItemPrincipal . '-' . $idItemDrop;

        $site['drop'] .= setLayout($itemDrop, $itemListagem);
      }
    }

    $site['id']   = $idItemPrincipal;
    $layoutItens .= setLayout($site, $itemListagem);
  }
}

// ADICIONA OS ITENS AO LAYOUT
$conteudo = setLayout(['itens' => $layoutItens], $conteudo);

echo $conteudo;