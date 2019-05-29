#!/usr/local/bin/php -d display_errors=STDOUT
<?php 

session_save_path("./sessions");
session_start();

$database = "finalproject.db";          

try  
{     
     $db = new SQLite3($database);
}
catch (Exception $exception)
{
    echo '<p>There was an error connecting to the database!</p>';

    if ($db)
    {
        echo $exception->getMessage();
    }
        
}

$table = "users";
$field1 = "name";
$field2 = "status";
$field3 = "entertime";

$user = $_SESSION['name'];

if (isset($user)){
	$sql = "UPDATE $table SET $field2=0 WHERE $field1='$user'";
	echo $sql;
	$result = $db->query($sql);
	unset($_SESSION['name']);
}

$sql = "SELECT * FROM $table WHERE $field2=1";

$result = $db->query($sql); 
while($record=$result->fetchArray())
{
	echo $record[$field1] . "<br/>";
}

?>
