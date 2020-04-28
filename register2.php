<?php
session_start();

require_once 'dbmodel.php';
require_once 'function.php';

$site = include(__DIR__ . '/config/site.php');
$pg = include(__DIR__ . '/config/pg.php');

include(__DIR__ . "/captcha/simple-php-captcha.php");
//require_once __DIR__ . '/captcha/simple-php-captcha.php"';
$_SESSION['captcha'] = simple_php_captcha();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php
    //include(__DIR__ . '/include/head.php');
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .field-icon {
            float: right;
            margin-left: 0px;
            margin-top: -38px;
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body>
    <form method="POST" id="register_form">
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="ชื่อจริง"><BR>
        <button type="submit" id="btn-submit">สมัครสมาชิก</button>
    </form>

    <?php
    include(__DIR__ . '/include/footer_js.php');
    ?>

    <script>
        $("#register_form").submit(function(e) {
            //sayHi();
            e.preventDefault();
            $.post('/exec/register2.php', $(this).serialize(), function(data) {
                $("#results").html(data)
            });
            return false;
        });
    </script>

</body>

</html>