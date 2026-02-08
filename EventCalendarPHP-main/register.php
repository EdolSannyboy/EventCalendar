<?php
include 'includes/db.php';

if(isset($_POST['register'])){

    $sql = "INSERT INTO users(fullname,office,username,password)
            VALUES(:fullname,:office,:username,:password)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':fullname'=>$_POST['fullname'],
        ':office'=>$_POST['office'],
        ':username'=>$_POST['username'],
        ':password'=>md5($_POST['password'])
    ]);

    echo "Registered Successfully! <a href='login.php'>Login Here</a>";
}
?>

<h2>Office Registration</h2>
<form method="POST">

Full Name:
<input type="text" name="fullname" required><br>

Office:
<input type="text" name="office" required><br>

Username:
<input type="text" name="username" required><br>

Password:
<input type="password" name="password" required><br>

<button name="register">Register</button>

</form>
