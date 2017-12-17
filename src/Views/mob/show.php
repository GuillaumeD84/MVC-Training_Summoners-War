<?php $this->layout('layouts/default', [
  'title' => $mob->getName()
]); ?>

<div class="row">
  <div class="col-12">
    <h2><?= $mob->getName(); ?></h2>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <table>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>base_stars</th>
        <th>family</th>
        <th>element</th>
        <th>slug</th>
        <th>skill_1</th>
        <th>skill_2</th>
        <th>skill_3</th>
        <th>skill_4</th>
        <th>skill_leader</th>
        <th>archetype</th>
        <th>hp_lv40</th>
        <th>atk_lv40</th>
        <th>def_lv40</th>
        <th>spd_lv40</th>
        <th>cr_lv40</th>
        <th>cd_lv40</th>
        <th>res_lv40</th>
        <th>acc_lv40</th>
        <th>icon</th>
      </tr>
        <tr>
          <td><?= $mob->getId(); ?></td>
          <td>
            <a href="<?= $router->generate('mob_show', ['slug' => $mob->getSlug()]); ?>">
              <?= $mob->getName(); ?>
            </a>
          </td>
          <td><?= $mob->getBaseStars(); ?></td>
          <td><?= $mob->getFamily(); ?></td>
          <td><?= $mob->getElement(); ?></td>
          <td><?= $mob->getSlug(); ?></td>
          <td><?= $mob->getSkill1(); ?></td>
          <td><?= $mob->getSkill2(); ?></td>
          <td><?= $mob->getSkill3(); ?></td>
          <td><?= $mob->getSkill4(); ?></td>
          <td><?= $mob->getSkillLeader(); ?></td>
          <td><?= $mob->getArchetype(); ?></td>
          <td><?= $mob->getHpLv40(); ?></td>
          <td><?= $mob->getAtkLv40(); ?></td>
          <td><?= $mob->getDefLv40(); ?></td>
          <td><?= $mob->getSpdLv40(); ?></td>
          <td><?= $mob->getCrLv40(); ?></td>
          <td><?= $mob->getCdLv40(); ?></td>
          <td><?= $mob->getResLv40(); ?></td>
          <td><?= $mob->getAccLv40(); ?></td>
          <td><?= $mob->getIcon(); ?></td>
        </tr>
    </table>
  </div>
</div>
