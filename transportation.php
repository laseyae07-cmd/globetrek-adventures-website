<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<section class="page-banner"><h1>Transportation</h1><p>Book transport services for airport transfers, tours, and safari journeys.</p></section>
<section class="section"><div class="card-grid">
<?php $items = mysqli_query($conn, "SELECT * FROM transport_services ORDER BY transport_id DESC"); while ($row = mysqli_fetch_assoc($items)) { ?>
    <div class="card">
        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        <div class="card-body">
            <span class="meta"><?php echo htmlspecialchars($row['vehicle_type']); ?> • <?php echo htmlspecialchars($row['capacity']); ?> passengers</span>
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="price">From LKR <?php echo number_format($row['base_price'], 2); ?></div>
            <a class="btn" href="transport-booking.php?transport_id=<?php echo $row['transport_id']; ?>">Book Transport</a>
        </div>
    </div>
<?php } ?>
</div></section>
<?php include 'includes/footer.php'; ?>
