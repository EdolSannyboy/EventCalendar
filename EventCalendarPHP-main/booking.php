

<?php

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

include 'templates/header.php';
include 'templates/navbar.php';
include 'includes/db.php';


if(isset($_POST['title'])){

    $sql = "INSERT INTO events 
    (title,start_datetime,end_datetime,requester_name,office,contact,description)
    VALUES (:title,:start,:end,:name,:office,:contact,:description)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title'=>$_POST['title'],
        ':start'=>$_POST['start'],
        ':end'=>$_POST['end'],
        ':name'=>$_POST['requester_name'],
        ':office'=>$_POST['office'],
        ':contact'=>$_POST['contact'],
        ':description'=>$_POST['description']
    ]);

    echo "<div class='alert alert-success text-center'>Booking Submitted!</div>";
}
?>

<div class="container mt-5">
<div class="card shadow p-4">

<h2 class="text-center mb-4">School Office Event Booking</h2>

<form method="POST">

<label>Event Title</label>
<input type="text" name="title" class="form-control mb-3" required>

<label>Requester Name</label>
<input type="text" name="requester_name" class="form-control mb-3" required>

<label>Office</label>
<input type="text" name="office" class="form-control mb-3" required>

<label>Contact Number</label>
<input type="text" name="contact" class="form-control mb-3">

<label>Description</label>
<textarea name="description" class="form-control mb-3"></textarea>

<label>Start Date & Time</label>
<input type="datetime-local" name="start" class="form-control mb-3" required>

<label>End Date & Time</label>
<input type="datetime-local" name="end" class="form-control mb-3" required>

<button class="btn btn-primary w-100">Submit Booking</button>

</form>
</div>
</div>

<?php include 'templates/footer.php'; ?>