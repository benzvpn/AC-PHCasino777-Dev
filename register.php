<?php
session_start();

$site = include(__DIR__ . '/config/site.php');
$pg = include(__DIR__ . '/config/pg.php');

include(__DIR__ . "/captcha/simple-php-captcha.php");
//require_once __DIR__ . '/captcha/simple-php-captcha.php"';
$_SESSION['captcha'] = simple_php_captcha();

?>

<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="th" style="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,user-scalable=no">
    <meta name="description" content="ตัวแทนตรงจาก SAGAME คาสิโนออนไลน์ บาคาร่า เสือมังกร ไฮโล รูเล็ต สล็อต slot กำถั่ว คาสิโนสด live casino ระบบฝากถอน AUTO 30วินาที ดีที่สุดในไทย">
    <meta name="keywords" content="sagame, sagame1688, คาสิโนออนไลน์, บาคาร่าออนไลน์, บาคาร่า, คาสิโนสด, คาสิโนออนไลน์, sagaming, เสือสังกร, ไฺฮโล, รูเล็ต, สล็อตออนไลน์, เกมส์สล็อตออนไลน์, สล็อต, เกมสล็อต ,กำถั่ว , slot ออนไลน์, slot online, live คาสิโน,  คาสิโน auto ฝากถอน, เล่นคาสิโนออนไลน์, casino sagame, casino sagaming">
    <meta property="og:url" content="<?= $site['host'] ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $site['title'] ?>">
    <meta property="og:description" content="ตัวแทนตรงจาก SAGAME คาสิโนออนไลน์ บาคาร่า เสือมังกร ไฮโล รูเล็ต สล็อต slot กำถั่ว คาสิโนสด live casino ระบบฝากถอน AUTO 30วินาที ดีที่สุดในไทย">
    <meta property="og:image" content="<?= $site['host'] ?>/assets/img/icon.png">
    <meta property="og:image:alt" content="สมัครวันนี้รับโบนัส 50% ฟรีทันที">
    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets/img/fav.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/img/logo.png">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate,max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Title -->
    <title>
        <?= $site['title'] ?>
    </title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- Elegent Icon CSS -->
    <link rel="stylesheet" href="/assets/css/elegent-icons.css">

    <!-- All Plugins CSS css -->
    <link rel="stylesheet" href="/assets/css/plugins.css">

    <!-- style css -->
    <link rel="stylesheet" href="/assets/css/main.css">

    <!-- toastr css -->
    <link rel="stylesheet" href="/assets/css/toastr.min.css">

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="/assets/css/sweetalert2.css">

    <!-- modernizr JS
    ============================================ -->
    <script src="https://connect.facebook.net/signals/config/2408990612763027?v=2.9.15&amp;r=stable" async=""></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        @media print {
            #ghostery-purple-box {
                display: none !important
            }
        }
    </style>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-155353834-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-155353834-1');
    </script>
    -->
    <style data-styled="" data-styled-version="4.2.0"></style>
</head>

<body>
    <!-- Main Wrapper Start -->
    <div class="wrapper bg--shaft">
        <!-- 1st Main Content Wrapper Start -->
        <div class="main-content-wrapper ">
            <div class="container login-register-area">
                <form id="register_form">
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="text" required="" class="form__input form__input--2" id="phone" name="phone" maxlength="10" placeholder="กรุณากรอกเบอร์โทรศัพท์">
                    </div>
                    <div class="form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input type="text" required="" class="form__input form__input--2" id="password" maxlength="24" name="password" placeholder="โปรดใส่รหัสผ่าน">
                    </div>
                    <label for="name">ชื่อ - นามสกุล</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" required="" class="form__input form__input--2" id="name" name="name" placeholder="ชื่อจริง">
                        </div>
                        <div class="col">
                            <input type="text" required="" class="form__input form__input--2" id="surname" name="surname" placeholder="นามสกุล">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="banknumber">หมายเลขบัญชี</label>
                        <input type="text" class="form__input form__input--2" id="banknumber" maxlength="15" required="" name="banknumber" placeholder="หมายเลขบัญชีธนาคาร">
                        <small id="infomation" class="form-text text-muted ">
                            ชื่อและนามสกุลของบัญชีต้องตรงกับที่กรอกมา
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="banktype">ธนาคาร</label>
                        <select class="form__input form__input--2" id="banktype" required="" name="banktype">
                            <option value="000">ไทยพาณิชย์</option>
                            <option value="002">กรุงเทพ</option>
                            <option value="004">กสิกรไทย</option>
                            <option value="006">กรุงไทย</option>
                            <option value="034">ธกส</option>
                            <option value="011">ทหารไทย</option>
                            <option value="070">ไอซีบีซี</option>
                            <option value="071">ไทยเครดิต</option>
                            <option value="017">ซิตี้แบงก์</option>
                            <option value="018">ซูมิโตโม มิตซุย</option>
                            <option value="020">สแตนดาร์ดชาร์เต</option>
                            <option value="022">ซีไอเอ็มบี</option>
                            <option value="024">ยูโอบี</option>
                            <option value="025">กรุงศรีฯ</option>
                            <option value="030">ออมสิน</option>
                            <option value="031">เอชเอสบีซี</option>
                            <option value="039">มิซูโฮ</option>
                            <option value="033">ธอส.</option>
                            <option value="073">แลนด์แอนด์เฮ้าส</option>
                            <option value="065">ธนชาต</option>
                            <option value="067">ทิสโก้</option>
                            <option value="069">เกียรตินาคิน</option>
                            <option value="066">อิสลาม</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lineid">Line ID</label>
                        <input type="text" class="form__input form__input--2" id="lineid" required="" name="lineid" placeholder="หากไม่มีไลน์ ให้ใส่เบอร์มือถือแทน">
                    </div>
                    <div class="form-group">
                        <label for="captcha">
                            <img src="<?=$_SESSION['captcha']['image_src']?>" class="img-fluid"> 
                        </label> <?=$_SESSION['captcha']['code']?>
                        <input type="text" class="form__input form__input--2" id="captcha" required="" name="captcha" placeholder="กรอกตัวอักษรในรูปที่ท่านเห็น">
                    </div>
                    <input type="hidden" name="aff" value="">
                    <button type="submit" class="btn btn-style-2">ลงทะเบียน</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Wrapper End -->

    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery.min.js"></script>

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- All Plugins Js -->
    <script src="/assets/js/plugins.js"></script>

    <!-- Toastr Js -->
    <script src="/assets/js/toastr.min.js"></script>

    <!-- SweetAlert2 Js -->
    <script src="/assets/js/sweetalert2.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>
    <script type="text/javascript">
        $("#login_form").submit(function(e) {
            e.preventDefault();
            $.post('/member/api/login', $(this).serialize(), function(data) {
                $("#results").html(data)
            });
            return false;
        });
    </script>
    <script>
        $("#register_form").submit(function(e) {
            e.preventDefault();
            $.post('/exec/register.php', $(this).serialize(), function(data) {
                $("#results").html(data)
            });
            return false;
        });
    </script>

</body>

</html>