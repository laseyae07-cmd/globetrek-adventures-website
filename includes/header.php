<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']);
$basePath = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false || strpos($_SERVER['PHP_SELF'], '/staff/') !== false || strpos($_SERVER['PHP_SELF'], '/customer/') !== false) ? '../' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlobeTrek Adventures</title>
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-wrap">
        <a class="logo" href="<?php echo $basePath; ?>index.php">GlobeTrek Adventures</a>
        <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
        <div class="nav-links">
            <a href="<?php echo $basePath; ?>index.php">Home</a>
            <a href="<?php echo $basePath; ?>packages.php">Packages</a>
            <a href="<?php echo $basePath; ?>accommodation.php">Accommodation</a>
            <a href="<?php echo $basePath; ?>transportation.php">Transport</a>
            <a href="<?php echo $basePath; ?>travel-guides.php">Guides</a>
            <a href="<?php echo $basePath; ?>contact.php">Contact</a>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <?php if ($_SESSION['role'] === 'admin') { ?>
                    <a href="<?php echo $basePath; ?>admin/dashboard.php">Dashboard</a>
                <?php } elseif ($_SESSION['role'] === 'staff') { ?>
                    <a href="<?php echo $basePath; ?>staff/dashboard.php">Dashboard</a>
                <?php } else { ?>
                    <a href="<?php echo $basePath; ?>customer/dashboard.php">Dashboard</a>
                <?php } ?>
                <a class="btn btn-outline" href="<?php echo $basePath; ?>logout.php">Logout</a>
            <?php } else { ?>
                <a href="<?php echo $basePath; ?>login.php">Login</a>
                <a class="btn" href="<?php echo $basePath; ?>register.php">Register</a>
            <?php } ?>
        </div>
    </div>
</nav>
