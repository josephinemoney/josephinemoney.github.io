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

$sql = "CREATE TABLE IF NOT EXISTS $table (
$field1 varchar(50),
$field2 int(1),
$field3 varchar(30)
)";
$result = $db->query($sql);

$user = $_GET['name'];
$_SESSION['name'] = $user;
$ts = time();
$_SESSION['time'] = $ts; 

if (isset($user)){
	$sql = "INSERT INTO $table ($field1, $field2, $field3) VALUES ('$user', 1, $ts)";
//	print $sql;
	$result = $db->query($sql);
	echo "test print"; 
}

?>
