<?php

function getLayoutItensListagem() {
  $sites = getSites();
  if(empty($sites)) return getLayout('listagem', 'htm-listagem-sem-resultado');

  // MONTA OS ITENS
  $layoutItens  = '';
  $itemListagem = getLayout('listagem', 'html-listagem-item');

  // ITERA SOBRE CADA UM DOS SITES
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

  return $layoutItens;
}