<style>
/* ===== IMPORT POPPINS ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

/* ===== NAVBAR ONLY ===== */
.app-navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1e3a8a; /* BLUE */
  padding: 12px 20px;
  font-family: 'Poppins', sans-serif;
}

.app-navbar .nav-left,
.app-navbar .nav-right {
  display: flex;
  gap: 20px;
}

.app-navbar a {
  color: #ffffff;
  text-decoration: none;
  font-weight: 500;
  font-size: 14px;
}

.app-navbar a:hover {
  color: #facc15; /* MUSTARD */
}

.app-navbar .logout {
  color: #facc15; /* MUSTARD */
  font-weight: 600;
}
</style>

<nav class="app-navbar">
  <div class="nav-left">
    <a href="dashboard.php">Dashboard</a>
  </div>

  <div class="nav-right">
    <a href="index.php">Calendar</a>
    <a href="booking.php">Add Booking</a>
    <a href="logout.php" class="logout">Logout</a>
  </div>
</nav>

