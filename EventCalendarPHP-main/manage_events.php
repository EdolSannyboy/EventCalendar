<?php

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

include 'includes/db.php';

if(isset($_GET['approve'])){
    $id=$_GET['approve'];
    $conn->query("UPDATE events SET status='Approved' WHERE id=$id");
}

$stmt=$conn->query("SELECT * FROM events");

while($row=$stmt->fetch()){
    echo $row['title']." - ".$row['status'];

    if($_SESSION['role']=='admin'){
        echo "<a href='?approve=".$row['id']."'>Approve</a><br>";
    }
}
?>
