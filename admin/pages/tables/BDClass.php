<?php

  
  require_once 'datosBD.php';
  class BD
  {
          private static $database=null;
          private static $pdo;
          function __construct()
          {
                  try{
                        self::obtenerConexion();
                  }
                  catch(PODException $e)
                  {

                  }
          }
          public static function obtenerBD()
          {
                  if(self::$database==null)
                  {
                          self::$database=new self();
                  }
                  return self::$database;
          }
          public function obtenerConexion()
          {
                  if(self::$pdo==null)
                  {
                          self::$pdo=new PDO('mysql:dbname='.DATABASE.';host='.HOSTNAME.';',USERNAME,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
                          self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  }
                  return self::$pdo;
          }
          function __destructior()
          {
                  self::$pdo=null;
          }
  }


?>
