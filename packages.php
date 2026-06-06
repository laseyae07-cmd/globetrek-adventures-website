<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<section class="page-banner"><h1>Travel Packages</h1><p>Choose from curated trips around Sri Lanka.</p></section>
<section class="section">
    <div class="card-grid">
        <?php $packages = mysqli_query($conn, "SELECT * FROM travel_packages ORDER BY package_id DESC");
        while ($row = mysqli_fetch_assoc($packages)) { ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <div class="card-body">
                    <span class="meta"><?php echo htmlspecialchars($row['destination']); ?> • <?php echo htmlspecialchars($row['duration']); ?></span>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <div class="price">LKR <?php echo number_format($row['price'], 2); ?></div>
                    <a class="btn" href="package-details.php?id=<?php echo $row['package_id']; ?>">Details</a>
                    <a class="btn btn-outline" href="booking.php?package_id=<?php echo $row['package_id']; ?>">Book</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
