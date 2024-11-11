<?php
echo "Password for 'password123': " . password_hash('password123', PASSWORD_BCRYPT) . "<br>";
echo "Password for 'mypassword': " . password_hash('mypassword', PASSWORD_BCRYPT) . "<br>";
?>
