<?php
class database{
    public static $db_servername = 'rds-mysql.cvuwc6a0y2sz.ap-south-1.rds.amazonaws.com';
    public static $db_username = 'admin';
    public static $db_password = 'rdsadmin';
    public static $db_name = 'rdsmysql';
    public static $connection = null;

    public static function connection(){
      if(self::$connection == null){
         $conn = new mysqli(self::$db_servername,self::$db_username,self::$db_password,self::$db_name);
         if($conn->connect_error){
            echo("Error in Database Connection Error: $conn->connect_error");
         }
         else{
            echo('success');
            return self::$connection = $conn;
            
         }
      }
      else{
        echo('success');
        return self::$connection;
    
      }
    }
}

?>