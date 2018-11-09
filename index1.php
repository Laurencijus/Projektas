<?php
include 'header.php';
require_once 'functions.php';
// require_once 'config.php';

checkLoginAndRedirect();
?>
<?php echo password_hash('admin', PASSWORD_BCRYPT); ?><br>
<?php (password_verify('admin', ADMIN_PASSWORD_HASH));?>
<?php include 'footer.php';
