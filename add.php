<?php
require_once "pdo.php";
session_start();
echo("session started.\n");

if ( isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['password'])&& isset($_POST['user_id'])) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: add.php");
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: add.php");
        return;
    }
    
     #$user_id=$_POST['user_id']";
     #$name="";#"$_POST['name']";
     #$email="";#"$_POST['email']";
     #$password=""; #"$_POST['password']";
     
    #$name ="Fred";
     #$password="fuz2";
     #$hash=password_hash($password, PASSWORD_DEFAULT);    
     echo("reached after hash line.\n");
     if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['user_id']) && isset($_POST['password'])){
     	 
     	 if(isset($_POST['submit'])){   	 
									$name= $_POST['name'];
									$email= $_POST['email'];
									$password= $_POST['password'];
									$user_id= $_POST['user_id'];
     echo("reached after isset line .\n");									
    $dataQuery = "INSERT INTO husers (user_id, name, email, password) VALUES ('" . $user_id . "', '" . $name . "', '" . $email . "', '" . $password . "')"; 
    
    
    #VALUES('$user_id','$name', '$email','$password')";
    #var_dump($dataQuery);
    echo("after insert query.\n");
    $stmt = $conn->query($dataQuery);
    $#stmt = $conn->prepare($dataQuery);
    #var_dump($stmt);
    $_SESSION['success'] = 'Record Added';
    header( 'Location: index.php' ) ;
    return;
         }
     }
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>
<p>Add A New User</p>
<form method="post">
<p>UserID:
<input type="text" name="User_ID"></p>	
<p>Name:
<input type="text" name="name"></p>
<p>Email:
<input type="text" name="email"></p>
<p>Password:
<input type="password" name="password"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
