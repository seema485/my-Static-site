<?php
require_once "pdo.php";
session_start();
?>
<html>
<head></head><body>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

echo('<table border="1">'."\n");
echo('<tr>');
	echo('<th>name</th>');
	echo('<th>email</th>');
	echo('<th>password</th>');
	echo('<th>Edit/Delete</th>');
	echo('<tr>');	
#var_dump($stmt);
$dataquery="SELECT * FROM husers";			         	 
$stmt = $conn->query($dataquery);
if ($stmt->num_rows > 0) {
while ( $row = $stmt->fetch_assoc()) {
	 echo("<tr><td>");
	 echo($row['name']);
	 echo("</td><td>");	 
	 echo($row['email']);
    #echo(htmlentities($row['email']));
    echo("</td><td>");
    echo($row['password']);
    echo("</td><td>");
    echo('<a href="edit.php?user_id='.$row['user_id'].'">Edit</a> / ');
    echo('<a href="delete.php?user_id='.$row['user_id'].'">Delete</a>');
    echo("</td></tr>\n");
    
} }
echo"</table>\n";
?>

<a href="add.php">Add New</a>
