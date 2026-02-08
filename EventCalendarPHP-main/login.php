
<?php

session_start();
include 'includes/db.php';

if(isset($_POST['login'])){

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([
        $_POST['username'],
        md5($_POST['password'])
    ]);

    if($stmt->rowCount()>0){

        $user=$stmt->fetch();

        $_SESSION['user']=$user['username'];
        $_SESSION['role']=$user['role'];
        $_SESSION['office']=$user['office'];

        header("Location:index.php");

    } else {
        echo "Invalid login!";
    }
}
?>



<h2>Login</h2>
<form method="POST">

Username:
<input type="text" name="username"><br>

Password:
<input type="password" name="password"><br>

<button name="login">Login</button>

<a href="register.php">Register</a>

</form>




