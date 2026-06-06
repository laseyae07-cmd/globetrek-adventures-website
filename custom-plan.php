<?php
include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $budget = floatval($_POST['budget']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $preferences = mysqli_real_escape_string($conn, $_POST['preferences']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO custom_plans (user_id, destination, budget, start_date, end_date, preferences, status) VALUES ($user_id, '$destination', $budget, '$start_date', '$end_date', '$preferences', 'Pending')";
    $message = mysqli_query($conn, $sql) ? 'Custom travel plan request submitted.' : 'Request failed.';
}
?>
<section class="page-banner"><h1>Custom Travel Plan</h1><p>Tell us your travel idea and our staff will prepare a plan.</p></section>
<section class="section"><div class="form-card">
<?php if ($message) echo '<div class="alert success">'.htmlspecialchars($message).'</div>'; ?>
<form method="POST">
<div class="form-group"><label>Preferred Destination</label><input name="destination" required></div>
<div class="form-grid"><div class="form-group"><label>Start Date</label><input type="date" name="start_date" required></div><div class="form-group"><label>End Date</label><input type="date" name="end_date" required></div></div>
<div class="form-group"><label>Budget</label><input type="number" step="0.01" name="budget" required></div>
<div class="form-group"><label>Preferences</label><textarea name="preferences" placeholder="Example: beaches, wildlife, hotels, transport, food preferences" required></textarea></div>
<button type="submit">Send Request</button>
</form></div></section>
<?php include 'includes/footer.php'; ?>
