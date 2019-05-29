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

$table = "messages"; 
$field1 = "name";
$field2 = "message"; 
$field3 = "timestamp"; 

$sql = "CREATE TABLE IF NOT EXISTS $table (
$field1 varchar(30),
$field1 varchar(10000),
$field3 varchar(30)
)";
$result = $db->query($sql);

$message = $_GET['msg'];

if(isset($message)){
	$timestamp = time();
	$user = $_SESSION['name'];
	$sql = "INSERT INTO $table ($field1, $field2, $field3) VALUES ('$user','$message', $timestamp)";
	print $sql;
	$result = $db->query($sql);
}

?>

</body>
</html>