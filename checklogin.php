<?php

$logged_in = FALSE;

if (!isset($_SESSION['member_login'])) {
    $logged_in = TRUE;
} elseif (empty($_SESSION['member_login'])) {
    $logged_in = TRUE;
}

if ($logged_in) {
    header('refresh:0;url=' . $site['host']);
    session_destroy();
    exit();
}
?>
