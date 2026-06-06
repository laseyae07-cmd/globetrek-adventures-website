<?php include 'includes/db.php'; include 'includes/auth.php'; require_role(['admin','staff']); include 'includes/header.php'; ?>
<section class="page-banner"><h1>Customer Queries</h1><p>View contact messages submitted by website visitors.</p></section>
<section class="section"><div class="table-wrap"><table><tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Status</th></tr>
<?php $q = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY message_id DESC"); while ($r = mysqli_fetch_assoc($q)) { ?>
<tr><td><?php echo htmlspecialchars($r['name']); ?></td><td><?php echo htmlspecialchars($r['email']); ?></td><td><?php echo htmlspecialchars($r['subject']); ?></td><td><?php echo htmlspecialchars($r['message']); ?></td><td><?php echo htmlspecialchars($r['status']); ?></td></tr>
<?php } ?></table></div></section>
<?php include 'includes/footer.php'; ?>
