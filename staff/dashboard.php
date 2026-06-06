<?php include '../includes/db.php'; include '../includes/auth.php'; require_role('staff'); include '../includes/header.php'; ?>
<section class="page-banner"><h1>Staff Dashboard</h1><p>Review bookings, custom plan requests, and customer messages.</p></section>
<section class="section">
<h2>Pending Custom Plans</h2>
<div class="table-wrap"><table><tr><th>Customer</th><th>Destination</th><th>Budget</th><th>Dates</th><th>Status</th></tr>
<?php $q = mysqli_query($conn, "SELECT c.*, u.name FROM custom_plans c JOIN users u ON c.user_id=u.user_id ORDER BY c.plan_id DESC LIMIT 10"); while ($r = mysqli_fetch_assoc($q)) { ?>
<tr><td><?php echo htmlspecialchars($r['name']); ?></td><td><?php echo htmlspecialchars($r['destination']); ?></td><td>LKR <?php echo number_format($r['budget'],2); ?></td><td><?php echo htmlspecialchars($r['start_date'].' to '.$r['end_date']); ?></td><td><?php echo htmlspecialchars($r['status']); ?></td></tr>
<?php } ?></table></div>
<p style="margin-top:20px"><a class="btn" href="../queries.php">View Customer Queries</a></p>
</section>
<?php include '../includes/footer.php'; ?>
