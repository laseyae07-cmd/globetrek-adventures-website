<?php include '../includes/db.php'; include '../includes/auth.php'; require_role('customer'); include '../includes/header.php'; ?>
<section class="page-banner"><h1>Customer Dashboard</h1><p>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>.</p></section>
<section class="section grid">
    <div class="card"><div class="card-body"><h3>My Bookings</h3><p>View all package, accommodation, and transport bookings.</p><a class="btn" href="../my-bookings.php">View Bookings</a></div></div>
    <div class="card"><div class="card-body"><h3>Custom Plans</h3><p>Request or track personalized travel plans.</p><a class="btn" href="../my-custom-plans.php">View Plans</a></div></div>
    <div class="card"><div class="card-body"><h3>Explore Packages</h3><p>Browse available travel packages.</p><a class="btn" href="../packages.php">Explore</a></div></div>
</section>
<?php include '../includes/footer.php'; ?>
