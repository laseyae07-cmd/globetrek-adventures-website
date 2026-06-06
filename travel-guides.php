<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<section class="page-banner"><h1>Travel Guides</h1><p>Helpful articles for planning a better Sri Lankan trip.</p></section>
<section class="section"><div class="card-grid">
<?php $guides = mysqli_query($conn, "SELECT * FROM travel_guides ORDER BY guide_id DESC"); while ($row = mysqli_fetch_assoc($guides)) { ?>
    <div class="card">
        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
        <div class="card-body">
            <span class="meta"><?php echo htmlspecialchars($row['category']); ?></span>
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <p><?php echo htmlspecialchars($row['summary']); ?></p>
        </div>
    </div>
<?php } ?>
</div></section>
<?php include 'includes/footer.php'; ?>
