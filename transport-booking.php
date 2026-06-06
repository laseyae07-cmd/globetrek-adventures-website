<?php
include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php';
$id = intval($_GET['transport_id'] ?? $_POST['transport_id'] ?? 0);
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transport_services WHERE transport_id=$id"));
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pickup = mysqli_real_escape_string($conn, $_POST['pickup_location']);
    $dropoff = mysqli_real_escape_string($conn, $_POST['dropoff_location']);
    $trip_date = mysqli_real_escape_string($conn, $_POST['trip_date']);
    $passengers = intval($_POST['passengers']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO transport_bookings (user_id, transport_id, pickup_location, dropoff_location, trip_date, passengers, status) VALUES ($user_id, $id, '$pickup', '$dropoff', '$trip_date', $passengers, 'Pending')";
    $message = mysqli_query($conn, $sql) ? 'Transport booking submitted.' : 'Booking failed.';
}
?>
<section class="page-banner"><h1>Transport Booking</h1><p>Reserve your transport service.</p></section>
<section class="section"><div class="form-card">
<?php if ($message) echo '<div class="alert success">'.htmlspecialchars($message).'</div>'; ?>
<?php if ($item) { ?><h2><?php echo htmlspecialchars($item['name']); ?></h2>
<form method="POST">
<input type="hidden" name="transport_id" value="<?php echo $id; ?>">
<div class="form-grid"><div class="form-group"><label>Pickup Location</label><input name="pickup_location" required></div><div class="form-group"><label>Drop-off Location</label><input name="dropoff_location" required></div></div>
<div class="form-grid"><div class="form-group"><label>Trip Date</label><input type="date" name="trip_date" required></div><div class="form-group"><label>Passengers</label><input type="number" name="passengers" min="1" value="1" required></div></div>
<button type="submit">Submit Booking</button>
</form><?php } else { echo '<div class="alert error">Invalid transport selected.</div>'; } ?>
</div></section>
<?php include 'includes/footer.php'; ?>
