<?php
class Database
{
    //Vaiables privadas para el acceso a la base de datos
    private static $dbName = 'ejercicio' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
     //Funcion para hacer la conexion a la base de datos
    public static function connect()
    {
       if ( null == self::$cont )
       {     
        try
        {
          //Enlace hacia la base de datos
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>