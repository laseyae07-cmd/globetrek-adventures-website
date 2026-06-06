<?php include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php'; $uid = $_SESSION['user_id']; ?>
<section class="page-banner"><h1>My Custom Plans</h1><p>Track your requested travel plans.</p></section>
<section class="section"><div class="table-wrap"><table><tr><th>Destination</th><th>Budget</th><th>Dates</th><th>Status</th><th>Requested</th></tr>
<?php $q = mysqli_query($conn, "SELECT * FROM custom_plans WHERE user_id=$uid ORDER BY plan_id DESC"); while ($r = mysqli_fetch_assoc($q)) { ?>
<tr><td><?php echo htmlspecialchars($r['destination']); ?></td><td>LKR <?php echo number_format($r['budget'],2); ?></td><td><?php echo htmlspecialchars($r['start_date'].' to '.$r['end_date']); ?></td><td><?php echo htmlspecialchars($r['status']); ?></td><td><?php echo htmlspecialchars($r['created_at']); ?></td></tr>
<?php } ?></table></div></section>
<?php include 'includes/footer.php'; ?>
