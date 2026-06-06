<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<section class="hero">
    <div class="hero-content">
        <span class="badge">Travel planning made simple</span>
        <h1>Discover Sri Lanka with GlobeTrek Adventures</h1>
        <p>Browse travel packages, reserve accommodation, book transport, request custom plans, and manage your travel bookings from one platform.</p>
        <div class="hero-actions">
            <a class="btn" href="packages.php">Explore Packages</a>
            <a class="btn btn-outline" href="custom-plan.php">Request Custom Plan</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <div>
            <h2>Featured Travel Packages</h2>
            <p>Popular experiences selected for local and international travellers.</p>
        </div>
        <a class="btn btn-outline" href="packages.php">View All</a>
    </div>
    <div class="card-grid">
        <?php
        $packages = mysqli_query($conn, "SELECT * FROM travel_packages ORDER BY package_id DESC LIMIT 3");
        while ($row = mysqli_fetch_assoc($packages)) { ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <div class="card-body">
                    <span class="meta"><?php echo htmlspecialchars($row['duration']); ?></span>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <div class="price">LKR <?php echo number_format($row['price'], 2); ?></div>
                    <a class="btn" href="package-details.php?id=<?php echo $row['package_id']; ?>">View Details</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="section">
    <div class="grid">
        <div class="card"><img src="assets/images/accommodation.svg" alt="Accommodation"><div class="card-body"><h3>Accommodation</h3><p>Compare hotels, villas, eco lodges, and beach resorts.</p><a class="btn btn-outline" href="accommodation.php">Browse</a></div></div>
        <div class="card"><img src="assets/images/transport.svg" alt="Transport"><div class="card-body"><h3>Transportation</h3><p>Book airport transfers, tour vans, private cars, and safari jeeps.</p><a class="btn btn-outline" href="transportation.php">Browse</a></div></div>
        <div class="card"><img src="assets/images/guides/culture.svg" alt="Travel Guides"><div class="card-body"><h3>Travel Guides</h3><p>Read destination guides, packing tips, and cultural advice.</p><a class="btn btn-outline" href="travel-guides.php">Read Guides</a></div></div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
