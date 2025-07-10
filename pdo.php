<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Seema Henna calling pdo</title>
</head>

<body>

<?php
         $statement="Fill out the form below or call us at 507-421-8066.";
				$db_server="localhost";
				$db_user="root";
				$password="";
				$db_name="husers";
				$conn="";
				$conn =	mysqli_connect($db_server, $db_user, $password, $db_name);
				#$db = new PDO("mysql:host=127.0.0.1; dbname=husers", " ", " ");
				#$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    #var_dump($db);
			    if($conn){echo("you are connected");}
			    else {echo("Could nto connect");}
			    echo '\n';
				
				

?>

</body>
</html>
