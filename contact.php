<?php
include 'includes/db.php'; include 'includes/header.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $body = mysqli_real_escape_string($conn, $_POST['message']);
    $sql = "INSERT INTO contact_messages (name, email, subject, message, status) VALUES ('$name', '$email', '$subject', '$body', 'New')";
    $message = mysqli_query($conn, $sql) ? 'Message sent successfully.' : 'Message could not be sent.';
}
?>
<section class="page-banner"><h1>Contact Us</h1><p>Send us your questions about packages, bookings, or custom trips.</p></section>
<section class="section"><div class="form-card">
<?php if ($message) echo '<div class="alert success">'.htmlspecialchars($message).'</div>'; ?>
<form method="POST">
<div class="form-grid"><div class="form-group"><label>Name</label><input name="name" required></div><div class="form-group"><label>Email</label><input type="email" name="email" required></div></div>
<div class="form-group"><label>Subject</label><input name="subject" required></div>
<div class="form-group"><label>Message</label><textarea name="message" required></textarea></div>
<button type="submit">Send Message</button>
</form></div></section>
<?php include 'includes/footer.php'; ?>
