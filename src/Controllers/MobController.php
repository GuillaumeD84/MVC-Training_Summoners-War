<?php
namespace Sumwar\Controllers;

class MobController extends CoreController
{
  public function show($params)
  {
    // On récupère la liste de toutes les communautés
    $mob = \Sumwar\Models\MobModel::findBySlug($params['slug']);

    // On affiche le template 'test' en passant en paramètre '$list'
    echo $this->templates->render('mob/show', [
      'mob' => $mob
    ]);
  }
}
