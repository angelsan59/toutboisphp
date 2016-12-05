<?php
 
//db connexion class using singleton pattern
class Connexion{
 
//variable to hold connection object.
protected static $db;
 
//private construct - class cannot be instatiated externally.
private function __construct() {
 
try {
// assign PDO object to db variable
self::$db = new PDO( 'mysql:host=localhost;dbname=toutbois', 'root', '' );
self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $e) {
//Output error - would normally log this to error file rather than output to user.
echo "Connexion Error: " . $e->getMessage();
}
 
}
 
// get connection function. Static method - accessible without instantiation
public static function getInstance() {
 
//Guarantees single instance, if no connection object exists then create one.
if (!self::$db) {
//new connexion object.
new Connexion();
}
 
//return connection.
return self::$db;
}

public function query($query)
{
    return self::$db->query($query);
}

public function prepare($query){
    return self::$db->prepare($query);
}
 
 
 /* exemple usage
 <?php
//calling static method ( '::' rather than '->')
$db = Connexion::getInstance();
?> */
 
 
}//end class
 