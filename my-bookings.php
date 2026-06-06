<?php include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php'; $uid = $_SESSION['user_id']; ?>
<section class="page-banner"><h1>My Bookings</h1><p>View your package, accommodation, and transport bookings.</p></section>
<section class="section">
<h2>Package Bookings</h2>
<div class="table-wrap"><table><tr><th>Package</th><th>Date</th><th>Travellers</th><th>Total</th><th>Status</th></tr>
<?php $q = mysqli_query($conn, "SELECT b.*, p.title FROM package_bookings b JOIN travel_packages p ON b.package_id=p.package_id WHERE b.user_id=$uid ORDER BY b.booking_id DESC"); while ($r = mysqli_fetch_assoc($q)) { ?>
<tr><td><?php echo htmlspecialchars($r['title']); ?></td><td><?php echo htmlspecialchars($r['travel_date']); ?></td><td><?php echo $r['travellers']; ?></td><td>LKR <?php echo number_format($r['total_amount'],2); ?></td><td><?php echo htmlspecialchars($r['status']); ?></td></tr>
<?php } ?></table></div>
<br><h2>Accommodation Bookings</h2>
<div class="table-wrap"><table><tr><th>Accommodation</th><th>Check-in</th><th>Check-out</th><th>Guests</th><th>Status</th></tr>
<?php $q = mysqli_query($conn, "SELECT b.*, a.name FROM accommodation_bookings b JOIN accommodations a ON b.accommodation_id=a.accommodation_id WHERE b.user_id=$uid ORDER BY b.booking_id DESC"); while ($r = mysqli_fetch_assoc($q)) { ?>
<tr><td><?php echo htmlspecialchars($r['name']); ?></td><td><?php echo htmlspecialchars($r['check_in']); ?></td><td><?php echo htmlspecialchars($r['check_out']); ?></td><td><?php echo $r['guests']; ?></td><td><?php echo htmlspecialchars($r['status']); ?></td></tr>
<?php } ?></table></div>
<br><h2>Transport Bookings</h2>
<div class="table-wrap"><table><tr><th>Transport</th><th>Date</th><th>Pickup</th><th>Drop-off</th><th>Status</th></tr>
<?php $q = mysqli_query($conn, "SELECT b.*, t.name FROM transport_bookings b JOIN transport_services t ON b.transport_id=t.transport_id WHERE b.user_id=$uid ORDER BY b.booking_id DESC"); while ($r = mysqli_fetch_assoc($q)) { ?>
<tr><td><?php echo htmlspecialchars($r['name']); ?></td><td><?php echo htmlspecialchars($r['trip_date']); ?></td><td><?php echo htmlspecialchars($r['pickup_location']); ?></td><td><?php echo htmlspecialchars($r['dropoff_location']); ?></td><td><?php echo htmlspecialchars($r['status']); ?></td></tr>
<?php } ?></table></div>
</section>
<?php include 'includes/footer.php'; ?>
