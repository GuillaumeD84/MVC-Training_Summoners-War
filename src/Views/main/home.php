<?php $this->layout('layouts/default', [
  'title' => 'Liste des mobs'
]); ?>

<div class="row">
  <div class="col-12">
    <h2>Liste des mobs</h2>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Slug</th>
      </tr>
        <?php foreach($mobs as $mob): ?>
          <tr>
            <td><?= $mob->getId(); ?></td>
            <td>
              <a href="<?= $router->generate('mob_show', ['slug' => $mob->getSlug()]); ?>">
                <?= $mob->getName(); ?>
              </a>
            </td>
            <td><?= $mob->getSlug(); ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
  </div>
</div>
