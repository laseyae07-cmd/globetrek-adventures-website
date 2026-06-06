<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<section class="page-banner"><h1>Accommodation</h1><p>Browse accommodation options for your trip.</p></section>
<section class="section"><div class="card-grid">
<?php $items = mysqli_query($conn, "SELECT * FROM accommodations ORDER BY accommodation_id DESC"); while ($row = mysqli_fetch_assoc($items)) { ?>
    <div class="card">
        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        <div class="card-body">
            <span class="meta"><?php echo htmlspecialchars($row['location']); ?> • <?php echo htmlspecialchars($row['type']); ?></span>
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="price">LKR <?php echo number_format($row['price_per_night'], 2); ?> / night</div>
            <a class="btn" href="accommodation-booking.php?accommodation_id=<?php echo $row['accommodation_id']; ?>">Book Now</a>
        </div>
    </div>
<?php } ?>
</div></section>
<?php include 'includes/footer.php'; ?>
