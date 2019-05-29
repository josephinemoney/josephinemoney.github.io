#!/usr/local/bin/php -d display_errors=STDOUT
<?php 

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

$sql = "SELECT * FROM $table WHERE $field2=1";

$result = $db->query($sql); 
while($record=$result->fetchArray())
{
	echo $record[$field1] . "<br/>";
}


?>
