<?php
namespace Sumwar\Controllers;

class MainController extends CoreController
{
  public function home()
  {
    // On récupère la liste de toutes les mobs
    $list = \Sumwar\Models\MobModel::findAll();

    // On affiche le template en passant en paramètre '$list'
    echo $this->templates->render('main/home', [
      'mobs' => $list
    ]);
  }
}
