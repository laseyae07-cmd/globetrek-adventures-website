<?php
include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php';
$id = intval($_GET['accommodation_id'] ?? $_POST['accommodation_id'] ?? 0);
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM accommodations WHERE accommodation_id=$id"));
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $check_in = mysqli_real_escape_string($conn, $_POST['check_in']);
    $check_out = mysqli_real_escape_string($conn, $_POST['check_out']);
    $guests = intval($_POST['guests']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO accommodation_bookings (user_id, accommodation_id, check_in, check_out, guests, status) VALUES ($user_id, $id, '$check_in', '$check_out', $guests, 'Pending')";
    $message = mysqli_query($conn, $sql) ? 'Accommodation booking submitted.' : 'Booking failed.';
}
?>
<section class="page-banner"><h1>Accommodation Booking</h1><p>Reserve your stay.</p></section>
<section class="section"><div class="form-card">
<?php if ($message) echo '<div class="alert success">'.htmlspecialchars($message).'</div>'; ?>
<?php if ($item) { ?><h2><?php echo htmlspecialchars($item['name']); ?></h2>
<form method="POST">
<input type="hidden" name="accommodation_id" value="<?php echo $id; ?>">
<div class="form-grid"><div class="form-group"><label>Check-in</label><input type="date" name="check_in" required></div><div class="form-group"><label>Check-out</label><input type="date" name="check_out" required></div></div>
<div class="form-group"><label>Guests</label><input type="number" name="guests" min="1" value="1" required></div>
<button type="submit">Submit Booking</button>
</form><?php } else { echo '<div class="alert error">Invalid accommodation selected.</div>'; } ?>
</div></section>
<?php include 'includes/footer.php'; ?>
