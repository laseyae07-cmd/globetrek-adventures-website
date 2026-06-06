<?php
include 'includes/db.php'; include 'includes/auth.php'; include 'includes/header.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' LIMIT 1");
    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            redirect_by_role($user['role']);
        }
    }
    $error = 'Invalid email or password.';
}
?>
<section class="page-banner"><h1>Login</h1><p>Access your customer, staff, or admin dashboard.</p></section>
<section class="section"><div class="form-card">
<?php if ($error) echo '<div class="alert error">'.htmlspecialchars($error).'</div>'; ?>
<form method="POST">
<div class="form-group"><label>Email</label><input type="email" name="email" required></div>
<div class="form-group"><label>Password</label><input type="password" name="password" required></div>
<button type="submit">Login</button>
</form>
<p style="margin-top:16px">Demo accounts are listed in the README file.</p>
</div></section>
<?php include 'includes/footer.php'; ?>
