<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: index.html");
    exit;
}
session_start();
session_unset();
session_destroy();
header("Location: index.html");
exit;
?>
