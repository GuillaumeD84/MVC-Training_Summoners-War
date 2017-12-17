<?php
namespace Sumwar\Models;
/**
 * Classe Database
 * Gère la connexion (unique) à la base de données, et la "transmet" aux Models grâce à la fonction statique getDB()
 * Elle est paramétrée dans le constructeur du CoreController
 * C'est un singleton : sa seule fonction est de faire en sorte qu'il n'y est qu'une seule connexion à la DB
 */
class Database
{
  private static $db;
  private static $config;

  public static function setConfig($config)
  {
    self::$config = $config;
  }

  public static function getDB()
  {
    if (!self::$db)
    {
      self::$db = new \PDO(
          "mysql:host=".self::$config["DB_HOST"].";dbname=".self::$config["DB_NAME"].";charset=utf8",
          self::$config["DB_USER"],
          self::$config["DB_PASS"]
      );
    }
    return self::$db;
  }
}
