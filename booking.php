<?php
include 'includes/db.php';
include 'includes/auth.php';
require_login();
include 'includes/header.php';
$package_id = intval($_GET['package_id'] ?? $_POST['package_id'] ?? 0);
$package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM travel_packages WHERE package_id=$package_id"));
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
    $travellers = intval($_POST['travellers']);
    $notes = mysqli_real_escape_string($conn, $_POST['notes']);
    $total = $package ? $package['price'] * $travellers : 0;
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO package_bookings (user_id, package_id, travel_date, travellers, notes, total_amount, status) VALUES ($user_id, $package_id, '$travel_date', $travellers, '$notes', $total, 'Pending')";
    $message = mysqli_query($conn, $sql) ? 'Booking submitted successfully.' : 'Booking failed. Please try again.';
}
?>
<section class="page-banner"><h1>Book Package</h1><p>Reserve your selected travel package.</p></section>
<section class="section">
    <div class="form-card">
        <?php if ($message) echo '<div class="alert success">'.htmlspecialchars($message).'</div>'; ?>
        <?php if ($package) { ?>
        <h2><?php echo htmlspecialchars($package['title']); ?></h2>
        <form method="POST">
            <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">
            <div class="form-grid">
                <div class="form-group"><label>Travel Date</label><input type="date" name="travel_date" required></div>
                <div class="form-group"><label>No. of Travellers</label><input type="number" name="travellers" min="1" value="1" required></div>
            </div>
            <div class="form-group"><label>Special Notes</label><textarea name="notes" placeholder="Tell us your preferences"></textarea></div>
            <button type="submit">Submit Booking</button>
        </form>
        <?php } else { echo '<div class="alert error">Invalid package selected.</div>'; } ?>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
