<?php
include 'includes/db.php'; include 'includes/header.php';
$message = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check = mysqli_query($conn, "SELECT user_id FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = 'Email already registered.';
    } else {
        $sql = "INSERT INTO users (name, email, phone, password, role) VALUES ('$name', '$email', '$phone', '$password', 'customer')";
        $message = mysqli_query($conn, $sql) ? 'Registration successful. You can login now.' : 'Registration failed.';
    }
}
?>
<section class="page-banner"><h1>Create Account</h1><p>Register as a customer to make bookings and custom plan requests.</p></section>
<section class="section"><div class="form-card">
<?php if ($message) echo '<div class="alert success">'.htmlspecialchars($message).'</div>'; ?>
<?php if ($error) echo '<div class="alert error">'.htmlspecialchars($error).'</div>'; ?>
<form method="POST">
<div class="form-group"><label>Full Name</label><input name="name" required></div>
<div class="form-grid"><div class="form-group"><label>Email</label><input type="email" name="email" required></div><div class="form-group"><label>Phone</label><input name="phone" required></div></div>
<div class="form-group"><label>Password</label><input type="password" name="password" minlength="6" required></div>
<button type="submit">Register</button>
</form></div></section>
<?php include 'includes/footer.php'; ?>
