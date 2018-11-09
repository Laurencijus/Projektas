<?php include 'header.php';?>

<?php
if (isset($_SESSION['flash_messages'])) {
    foreach ($_SESSION['flash_messages'] as $message) {
        $messageType = $message['type'];
        $message = $message['text'];
        include 'flashMessage.php';
    }

    unset($_SESSION['flash_messages']);
}?>

<h1>Login</h1>
<form action="login.php" method="POST">
    <label>Password</label>
    <input type="password" name="password" />
    <input type="submit" value="Login" />
</form>
<?php include 'footer.php';