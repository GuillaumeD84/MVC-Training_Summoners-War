<?php
namespace Sumwar\Models;

class MobModel extends CoreModel
{
  // Définition de la 'TABLE' pour le Model Mob
  const TABLE = 'mobs';

  protected $id;
  protected $name;
  protected $base_stars;
  protected $family;
  protected $element;
  protected $slug;
  protected $skill_1;
  protected $skill_2;
  protected $skill_3;
  protected $skill_4;
  protected $skill_leader;
  protected $archetype;
  protected $hp_lv40;
  protected $atk_lv40;
  protected $def_lv40;
  protected $spd_lv40;
  protected $cr_lv40;
  protected $cd_lv40;
  protected $res_lv40;
  protected $acc_lv40;
  protected $icon;

  /**
   * Active record
   * Permet de mettre à jour/créer un mob
   */
  public function save()
  {
    // Connexion à la BD
    $db = Database::getDB();

    // On créé la requête d'ajout/modification
    $sql = 'REPLACE INTO `mobs` (id, name, base_stars, family, element, slug, skill_1, skill_2, skill_3, skill_4, skill_leader, archetype, hp_lv40, atk_lv40, def_lv40, spd_lv40, cr_lv40, cd_lv40, res_lv40, acc_lv40, icon) VALUES (:id, :name, :base_stars, :family, :element, :slug, :skill_1, :skill_2, :skill_3, :skill_4, :skill_leader, :archetype, :hp_lv40, :atk_lv40, :def_lv40, :spd_lv40, :cr_lv40, :cd_lv40, :res_lv40, :acc_lv40, :icon)';

    // On prépare la requête
    $statement = $db->prepare($sql);

    $statement->bindValue(':id', $this->id, \PDO::PARAM_INT);
    $statement->bindValue(':name', $this->name, \PDO::PARAM_STR);
    $statement->bindValue(':base_stars', $this->base_stars, \PDO::PARAM_INT);
    $statement->bindValue(':family', $this->family, \PDO::PARAM_INT);
    $statement->bindValue(':element', $this->element, \PDO::PARAM_INT);
    $statement->bindValue(':slug', $this->slug, \PDO::PARAM_STR);
    $statement->bindValue(':skill_1', $this->skill_1, \PDO::PARAM_INT);
    $statement->bindValue(':skill_2', $this->skill_2, \PDO::PARAM_INT);
    $statement->bindValue(':skill_3', $this->skill_3, \PDO::PARAM_INT);
    $statement->bindValue(':skill_4', $this->skill_4, \PDO::PARAM_INT);
    $statement->bindValue(':skill_leader', $this->skill_leader, \PDO::PARAM_INT);
    $statement->bindValue(':archetype', $this->archetype, \PDO::PARAM_INT);
    $statement->bindValue(':hp_lv40', $this->hp_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':atk_lv40', $this->atk_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':def_lv40', $this->def_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':spd_lv40', $this->spd_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':cr_lv40', $this->cr_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':cd_lv40', $this->cd_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':res_lv40', $this->res_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':acc_lv40', $this->acc_lv40, \PDO::PARAM_INT);
    $statement->bindValue(':icon', $this->icon, \PDO::PARAM_STR);

    // On éxécute la requête
    $result = $statement->execute();

    // On récupère l'id du nouvel event créé dans $this->id
    $this->id = $db->lastInsertId();
  }

  /**
   * Retourne un mob de la table via son slug
   * SELECT * FROM `table` WHERE `slug` = $slug
   */
  public static function findBySlug($slug)
  {
    // Préparation de la requête
    $query = Database::getDB()->prepare('SELECT * FROM '.static::TABLE.' WHERE `slug` = :slug');

    // On associe à :slug la valeur $slug
    $query->bindValue(':slug', $slug, \PDO::PARAM_STR);

    // On éxécute la requête
    $query->execute();

    // On retourne le résultat sous la forme d'un objet
    return $query->fetchObject(static::class);
  }


  /**
   * Get the value of Id
   *
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of Id
   *
   * @param mixed id
   *
   * @return self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of Name
   *
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of Name
   *
   * @param mixed name
   *
   * @return self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of Base Stars
   *
   * @return mixed
   */
  public function getBaseStars()
  {
    return $this->base_stars;
  }

  /**
   * Set the value of Base Stars
   *
   * @param mixed base_stars
   *
   * @return self
   */
  public function setBaseStars($base_stars)
  {
    $this->base_stars = $base_stars;

    return $this;
  }

  /**
   * Get the value of Family
   *
   * @return mixed
   */
  public function getFamily()
  {
    return $this->family;
  }

  /**
   * Set the value of Family
   *
   * @param mixed family
   *
   * @return self
   */
  public function setFamily($family)
  {
    $this->family = $family;

    return $this;
  }

  /**
   * Get the value of Element
   *
   * @return mixed
   */
  public function getElement()
  {
    return $this->element;
  }

  /**
   * Set the value of Element
   *
   * @param mixed element
   *
   * @return self
   */
  public function setElement($element)
  {
    $this->element = $element;

    return $this;
  }

  /**
   * Get the value of Slug
   *
   * @return mixed
   */
  public function getSlug()
  {
    return $this->slug;
  }

  /**
   * Set the value of Slug
   *
   * @param mixed slug
   *
   * @return self
   */
  public function setSlug($slug)
  {
    $this->slug = $slug;

    return $this;
  }

  /**
   * Get the value of Skill 1
   *
   * @return mixed
   */
  public function getSkill1()
  {
    return $this->skill_1;
  }

  /**
   * Set the value of Skill 1
   *
   * @param mixed skill_1
   *
   * @return self
   */
  public function setSkill1($skill_1)
  {
    $this->skill_1 = $skill_1;

    return $this;
  }

  /**
   * Get the value of Skill 2
   *
   * @return mixed
   */
  public function getSkill2()
  {
    return $this->skill_2;
  }

  /**
   * Set the value of Skill 2
   *
   * @param mixed skill_2
   *
   * @return self
   */
  public function setSkill2($skill_2)
  {
    $this->skill_2 = $skill_2;

    return $this;
  }

  /**
   * Get the value of Skill 3
   *
   * @return mixed
   */
  public function getSkill3()
  {
    return $this->skill_3;
  }

  /**
   * Set the value of Skill 3
   *
   * @param mixed skill_3
   *
   * @return self
   */
  public function setSkill3($skill_3)
  {
    $this->skill_3 = $skill_3;

    return $this;
  }

  /**
   * Get the value of Skill 4
   *
   * @return mixed
   */
  public function getSkill4()
  {
    return $this->skill_4;
  }

  /**
   * Set the value of Skill 4
   *
   * @param mixed skill_4
   *
   * @return self
   */
  public function setSkill4($skill_4)
  {
    $this->skill_4 = $skill_4;

    return $this;
  }

  /**
   * Get the value of Skill Leader
   *
   * @return mixed
   */
  public function getSkillLeader()
  {
    return $this->skill_leader;
  }

  /**
   * Set the value of Skill Leader
   *
   * @param mixed skill_leader
   *
   * @return self
   */
  public function setSkillLeader($skill_leader)
  {
    $this->skill_leader = $skill_leader;

    return $this;
  }

  /**
   * Get the value of Archetype
   *
   * @return mixed
   */
  public function getArchetype()
  {
    return $this->archetype;
  }

  /**
   * Set the value of Archetype
   *
   * @param mixed archetype
   *
   * @return self
   */
  public function setArchetype($archetype)
  {
    $this->archetype = $archetype;

    return $this;
  }

  /**
   * Get the value of Hp Lv
   *
   * @return mixed
   */
  public function getHpLv40()
  {
    return $this->hp_lv40;
  }

  /**
   * Set the value of Hp Lv
   *
   * @param mixed hp_lv40
   *
   * @return self
   */
  public function setHpLv40($hp_lv40)
  {
    $this->hp_lv40 = $hp_lv40;

    return $this;
  }

  /**
   * Get the value of Atk Lv
   *
   * @return mixed
   */
  public function getAtkLv40()
  {
    return $this->atk_lv40;
  }

  /**
   * Set the value of Atk Lv
   *
   * @param mixed atk_lv40
   *
   * @return self
   */
  public function setAtkLv40($atk_lv40)
  {
    $this->atk_lv40 = $atk_lv40;

    return $this;
  }

  /**
   * Get the value of Def Lv
   *
   * @return mixed
   */
  public function getDefLv40()
  {
    return $this->def_lv40;
  }

  /**
   * Set the value of Def Lv
   *
   * @param mixed def_lv40
   *
   * @return self
   */
  public function setDefLv40($def_lv40)
  {
    $this->def_lv40 = $def_lv40;

    return $this;
  }

  /**
   * Get the value of Spd Lv
   *
   * @return mixed
   */
  public function getSpdLv40()
  {
    return $this->spd_lv40;
  }

  /**
   * Set the value of Spd Lv
   *
   * @param mixed spd_lv40
   *
   * @return self
   */
  public function setSpdLv40($spd_lv40)
  {
    $this->spd_lv40 = $spd_lv40;

    return $this;
  }

  /**
   * Get the value of Cr Lv
   *
   * @return mixed
   */
  public function getCrLv40()
  {
    return $this->cr_lv40;
  }

  /**
   * Set the value of Cr Lv
   *
   * @param mixed cr_lv40
   *
   * @return self
   */
  public function setCrLv40($cr_lv40)
  {
    $this->cr_lv40 = $cr_lv40;

    return $this;
  }

  /**
   * Get the value of Cd Lv
   *
   * @return mixed
   */
  public function getCdLv40()
  {
    return $this->cd_lv40;
  }

  /**
   * Set the value of Cd Lv
   *
   * @param mixed cd_lv40
   *
   * @return self
   */
  public function setCdLv40($cd_lv40)
  {
    $this->cd_lv40 = $cd_lv40;

    return $this;
  }

  /**
   * Get the value of Res Lv
   *
   * @return mixed
   */
  public function getResLv40()
  {
    return $this->res_lv40;
  }

  /**
   * Set the value of Res Lv
   *
   * @param mixed res_lv40
   *
   * @return self
   */
  public function setResLv40($res_lv40)
  {
    $this->res_lv40 = $res_lv40;

    return $this;
  }

  /**
   * Get the value of Acc Lv
   *
   * @return mixed
   */
  public function getAccLv40()
  {
    return $this->acc_lv40;
  }

  /**
   * Set the value of Acc Lv
   *
   * @param mixed acc_lv40
   *
   * @return self
   */
  public function setAccLv40($acc_lv40)
  {
    $this->acc_lv40 = $acc_lv40;

    return $this;
  }

  /**
   * Get the value of Icon
   *
   * @return mixed
   */
  public function getIcon()
  {
    return $this->icon;
  }

  /**
   * Set the value of Icon
   *
   * @param mixed icon
   *
   * @return self
   */
  public function setIcon($icon)
  {
    $this->icon = $icon;

    return $this;
  }
}
