<?php

session_start();

//require_once 'dbmodel.php';
//require_once 'function.php';

$site = include(__DIR__ . '/config/site.php');
$pg = include(__DIR__ . '/config/pg.php');

//include(__DIR__.'/checklogin.php');
/*
$data_members = $mysqli->query("SELECT * FROM members WHERE member_login = '" . $_SESSION['member_login'] . "'")->fetch_assoc();

if (count($data_members) > 0) {
    //echo "<BR>".$data_members['member_login']."<BR>";
} else {
    exit();
}
$_SESSION['level'] = $data_members['member_level'];
*/

$web_lobby_url = "";
$web_lobby_url .= $pg['web_lobby'];
$web_lobby_url .= "operator_token=" . $pg['operator_token'] . "&";
$web_lobby_url .= "operator_player_session=" . urlencode(uniqid()) . "&";
$web_lobby_url .= "language=" . $pg['language'];
$web_lobby_url .= "";

?>

<!DOCTYPE html>
<html lang="th">

<head>
</head>

<body>
    <script> window.location.href = '<?=$web_lobby_url ?>';</script>
</body>

</html>