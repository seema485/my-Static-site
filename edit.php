<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['password']) && isset($_POST['user_id']) ) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?user_id=".$_POST['user_id']);
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: edit.php?user_id=".$_POST['user_id']);
        return;
    }

   $sql = "UPDATE husers SET name = :name,
            email = :email, password = :password
            WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':user_id' => $_POST['user_id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['user_id']) ) {
  $_SESSION['error'] = "Missing user_id";
  header('Location: index.php');
  return;
}
$zip=$_GET['user_id'];
$sql="SELECT * FROM husers where user_id ='zip'";
$stmt = $conn->prepare($sql);
#$stmt->execute(array(":xyz" => $_GET['user_id']));
$stmt = $conn->query($sql);
var_dump($stmt);
#$stmt->execute(array(":xyz" => $_REQUEST['user_id']));
$row = $stmt->fetch_assoc();
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for user_id';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$n = htmlentities($row['name']);
$e = htmlentities($row['email']);
$p = htmlentities($row['password']);
$user_id = $row['user_id'];
?>
<p>Edit User</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $n ?>"></p>
<p>Email:
<input type="text" name="email" value="<?= $e ?>"></p>
<p>Password:
<input type="text" name="password" value="<?= $p ?>"></p>
<input type="hidden" name="user_id" value="<?= $user_id ?>">
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
