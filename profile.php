<?php

session_start();


require_once 'dbmodel.php';
require_once 'function.php';

$site = include(__DIR__ . '/config/site.php');
$pg = include(__DIR__ . '/config/pg.php');
include(__DIR__.'/checklogin.php');

$data_members = $mysqli->query("SELECT * FROM members WHERE member_login = '" . $_SESSION['member_login'] . "'")->fetch_assoc();

if (count($data_members) > 0) {
    //echo "<BR>".$data_members['member_login']."<BR>";
} else {
    exit();
}
$_SESSION['level'] = $data_members['member_level'];

$web_lobby_url = "";
$web_lobby_url .= $pg['web_lobby'];
$web_lobby_url .= "operator_token=" . $pg['operator_token'] . "&";
$web_lobby_url .= "operator_player_session=" . urlencode($_SESSION['member_login']) . "&";
$web_lobby_url .= "language=" . $pg['language'];
$web_lobby_url .= "";

$data_member_wallet = $mysqli->query("SELECT * FROM member_wallet WHERE member_no = " . $data_members['member_no'])->fetch_assoc();

$total_wallet = $data_member_wallet['main_wallet'] + $data_member_wallet['bonus_wallet'] + $data_member_wallet['commission_wallet'];
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php
    include(__DIR__ . '/include/head.php');
    ?>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>

<body>
    <!-- Header -->
    <button onclick="window.location.href='<?= $web_lobby_url ?>';">เข้าสู่ระบบ1</button><BR>
    <button onclick="window.open('<?= $web_lobby_url ?>','_blank');">เข้าสู่ระบบ2</button><BR>

    <!-- Main -->
    <main class="main">
        <!-- Banner -->
        <!-- Content -->
        <section class="content">
            <div class="container">
                <div class="card card-content">
                    <!-- profile -->
                    <div class="profile card-body">
                        <h3 class="card-title">ข้อมูลบัญชี</h3>
                        <!-- Show Credit-->
                        <?php
                        //include(__DIR__.'/include/show_credit.php');
                        ?>
                        <div class="card card-body card-form p-lg-5">
                            <p class="text-center " style="color:#495057">เครดิตคงเหลือ : <?= $total_wallet ?></p>
                        </div>
                        <form action="/" class="card card-body card-form p-lg-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="./assets/images/password.png" alt=""></span>
                                </div>
                                <span class="form-control">ยูสเซอร์ :</span>
                                <input type="text" class="form-control" value="<?php echo $data_members['member_username']; ?>" disabled>
                            </div>
                            <div class="input-group mb-3" onclick="passwordToggle()">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="./assets/images/password.png" alt=""></span>
                                </div>
                                <span class="form-control">พาสเวิร์ด :</span>
                                <input id="passwordInput" type="password" class="form-control" value="<?php echo $data_members['member_password']; ?>" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="./assets/images/plus.png" alt=""></span>
                                </div>
                                <span class="form-control">ชื่อ-นามสกุล :</span>
                                <input type="text" class="form-control" value="<?php echo $data_members['member_name'] . ' ' . $data_members['member_surname']; ?>" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="./assets/images/phone.png" alt=""></span>
                                </div>
                                <span class="form-control">เบอร์โทร :</span>
                                <input type="tel" class="form-control" value="<?php echo $data_members['member_phone']; ?>" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="./assets/images/bank-number.png" alt=""></span>
                                </div>
                                <span class="form-control">เลขบัญชี :</span>
                                <input type="text" class="form-control" value="<?php echo $data_members['member_bank_number']; ?>" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="./assets/images/bank.png" alt=""></span>
                                </div>
                                <span class="form-control">ธนาคาร :</span>
                                <input type="text" class="form-control" value="<?php echo bank_name($data_members['member_bank_type']); ?>" disabled>
                            </div>
                        </form>
                    </div>
                    <div class="transaction card-body">
                        <h3 class="card-title">ลิงค์แนะนำเพื่อน</h3> <?= $site['host'] ?>/aff?<?= $_SESSION['member_login'] ?>
                    </div>
                    <div class="transaction card-body">
                        <h3 class="card-title">โปรโมชั่น</h3> <?= $site['host'] ?>/aff?<?= $_SESSION['member_login'] ?>
                    </div>
                    <!--
                    <div class="transaction card-body">
                        <h3 class="card-title">ประวัติการทำรายการ 7 วันล่าสุด</h3>
                        <form action="/" class="card card-body card-form p-lg-5">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-deposit-tab" data-toggle="pill" href="#pills-deposit" role="tab" aria-controls="pills-deposit" aria-selected="true">ฝากเงิน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-withdraw-tab" data-toggle="pill" href="#pills-withdraw" role="tab" aria-controls="pills-withdraw" aria-selected="false">ถอนเงิน</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="color:#495057">
                                                    <th>วัน-เวลา</th>
                                                    <th>จำนวน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $date = date('Y-m-d');
                                                $query = $mysqli->query("SELECT `topup_amount`,`topup_datetime` FROM `slot_topup` 
                                                    WHERE `topup_username` = '" . $_SESSION['username'] . "' AND `topup_type` IN ('promptpay','wallet') AND `topup_datetime` > DATE('" . $date . "') - INTERVAL 7 DAY ORDER BY topup_datetime DESC");
                                                while ($result = $query->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td style="color:#495057">
                                                            <?php echo $result['topup_datetime']; ?>
                                                        </td>
                                                        <td style="color:#495057">
                                                            <?php echo $result['topup_amount']; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    -->
                </div>
            </div>
        </section>


    </main>
    <script>
        function passwordToggle() {
            var x = document.getElementById("passwordInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <!-- Footer -->
    <?php
    //include(__DIR__ . '/include/menu_footer.php');
    ?>

    <!-- JS -->
    <?php
    include(__DIR__ . '/include/footer_js.php');
    ?>
</body>

</html>