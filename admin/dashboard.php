<?php include '../includes/db.php'; include '../includes/auth.php'; require_role('admin'); include '../includes/header.php';
function count_rows($conn, $table) { $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM $table")); return $r['total']; }
?>
<section class="page-banner"><h1>Admin Dashboard</h1><p>Manage and monitor GlobeTrek Adventures system activity.</p></section>
<section class="section">
    <div class="stat-grid">
        <div class="stat"><strong><?php echo count_rows($conn,'users'); ?></strong><span>Users</span></div>
        <div class="stat"><strong><?php echo count_rows($conn,'package_bookings'); ?></strong><span>Package Bookings</span></div>
        <div class="stat"><strong><?php echo count_rows($conn,'custom_plans'); ?></strong><span>Custom Plans</span></div>
        <div class="stat"><strong><?php echo count_rows($conn,'contact_messages'); ?></strong><span>Messages</span></div>
    </div>
    <h2>Recent Package Bookings</h2>
    <div class="table-wrap"><table><tr><th>Customer</th><th>Package</th><th>Date</th><th>Total</th><th>Status</th></tr>
    <?php $q = mysqli_query($conn, "SELECT b.*, u.name, p.title FROM package_bookings b JOIN users u ON b.user_id=u.user_id JOIN travel_packages p ON b.package_id=p.package_id ORDER BY b.booking_id DESC LIMIT 10"); while ($r = mysqli_fetch_assoc($q)) { ?>
        <tr><td><?php echo htmlspecialchars($r['name']); ?></td><td><?php echo htmlspecialchars($r['title']); ?></td><td><?php echo htmlspecialchars($r['travel_date']); ?></td><td>LKR <?php echo number_format($r['total_amount'],2); ?></td><td><?php echo htmlspecialchars($r['status']); ?></td></tr>
    <?php } ?></table></div>
    <p style="margin-top:20px"><a class="btn" href="../queries.php">View Customer Queries</a></p>
</section>
<?php include '../includes/footer.php'; ?>
