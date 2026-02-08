<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include 'templates/header.php';
include 'templates/navbar.php';
include 'includes/db.php';

$total = $conn->query("SELECT COUNT(*) FROM events")->fetchColumn();
$pending = $conn->query("SELECT COUNT(*) FROM events WHERE status='Pending'")->fetchColumn();
$approved = $conn->query("SELECT COUNT(*) FROM events WHERE status='Approved'")->fetchColumn();
?>

<style>
.sidebar{
    height:100vh;
    background:white;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}
.sidebar-item{
    padding:15px;
    border-radius:8px;
}
.sidebar-item:hover{
    background:#eef3ff;
}
</style>

<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<div class="col-md-3 sidebar p-4">

<h4>Dashboard</h4>
<hr>

<div class="sidebar-item">
Total Bookings <span class="badge bg-primary"><?php echo $total;?></span>
</div>

<div class="sidebar-item">
Pending <span class="badge bg-warning"><?php echo $pending;?></span>
</div>

<div class="sidebar-item">
Approved <span class="badge bg-success"><?php echo $approved;?></span>
</div>

<div class="sidebar-item">
Generate Report <span class="badge bg-success"><?php echo $generatereport;?></span>
</div>

<div class="sidebar-item">
Login History <span class="badge bg-success"><?php echo $loginhistory;?></span>
</div>

<hr>

<a href="manage_events.php" class="btn btn-success w-100 mb-2">Manage Events</a>

</div>

<!-- MAIN CONTENT -->
<div class="col-md-9 p-5">

<h2>Welcome, <?php echo $_SESSION['user']; ?></h2>
<p>Event Tracking Overview</p>

<div class="row mt-4">

<div class="col-md-4">
<div class="card shadow p-4 text-center">
<h5>Total Bookings</h5>
<h2><?php echo $total;?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card shadow p-4 text-center">
<h5>Pending</h5>
<h2><?php echo $pending;?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card shadow p-4 text-center">
<h5>Approved</h5>
<h2><?php echo $approved;?></h2>
</div>
</div>

</div>

</div>

</div>
</div>

<?php include 'templates/footer.php'; ?>
