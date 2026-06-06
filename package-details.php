<?php
include 'includes/db.php';
include 'includes/header.php';
$id = intval($_GET['id'] ?? 0);
$result = mysqli_query($conn, "SELECT * FROM travel_packages WHERE package_id=$id");
$package = mysqli_fetch_assoc($result);
if (!$package) { echo '<section class="section"><div class="alert error">Package not found.</div></section>'; include 'includes/footer.php'; exit(); }
?>
<section class="page-banner"><h1><?php echo htmlspecialchars($package['title']); ?></h1><p><?php echo htmlspecialchars($package['destination']); ?> • <?php echo htmlspecialchars($package['duration']); ?></p></section>
<section class="section grid">
    <div><img src="<?php echo htmlspecialchars($package['image_url']); ?>" alt="<?php echo htmlspecialchars($package['title']); ?>" style="border-radius:24px;box-shadow:var(--shadow)"></div>
    <div>
        <h2>Package Details</h2>
        <p><?php echo htmlspecialchars($package['description']); ?></p>
        <p><strong>Destination:</strong> <?php echo htmlspecialchars($package['destination']); ?></p>
        <p><strong>Duration:</strong> <?php echo htmlspecialchars($package['duration']); ?></p>
        <p><strong>Price:</strong> LKR <?php echo number_format($package['price'], 2); ?></p>
        <a class="btn" href="booking.php?package_id=<?php echo $package['package_id']; ?>">Book This Package</a>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
