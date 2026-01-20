<?php require_once '../controllers/auth_check.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="navbar">
        <h3>Plane Ticket Management - Employee Panel</h3>
        <div>
            <span>Welcome, <?php echo $_SESSION['username']; ?></span>
            <a href="../index.php?logout=true" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="card">
            <h3>Add New Flight</h3>
            <form action="../controllers/flight_ops.php" method="POST">
                <input type="text" name="f_name" placeholder="Flight Name (e.g. BG-001)" required>
                <input type="text" name="f_dest" placeholder="Destination (e.g. London)" required>
                <input type="number" name="f_price" placeholder="Ticket Price" required>
                <button type="submit" name="add_flight">Add Flight</button>
            </form>
            <?php if(isset($_GET['success'])) { echo "<p style='color:green'>Flight Added Successfully!</p>"; } ?>
        </div>

        <div class="card">
            <h3>Search Flights</h3>
            <input type="text" id="searchBox" onkeyup="searchFlight()" placeholder="Search by flight name...">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Destination</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="flightTable">
                    <tr><td colspan="4">Start typing to search...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../assets/script.js"></script>
</body>
</html>