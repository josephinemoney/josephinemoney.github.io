#!/usr/local/bin/php -d display_errors=STDOUT
<?php 
session_save_path("./sessions");
session_start();
$user = $_SESSION['name'];
$time_enter = $_SESSION['time'];

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

$sql = "SELECT * FROM $table ORDER BY $field3";
$result = $db->query($sql);

date_default_timezone_set('America/Los_Angeles');

while ($record = $result -> fetchArray()){
//	if ($record[$field3] >= $time_enter){
//	if($record[$field1] == $user) {
	echo "<span style='color:blue'>" . $record[$field1] . ":</span>";
	echo "<span style='color:green'>" . $record[$field2] . " </span>";
	echo "<span style='color:red'>" . date('g:i', $record[$field3]) . "</span>"; 
	echo "<br/>";
}


?>

</body>
</html>