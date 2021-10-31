<?php


if (isset($_POST['submit'])) {

    $con = new PDO("mysql:host=localhost;dbname=booyebeh_site", "booyebeh_users", "123!@#qwe");

    $con->exec("SET CHARACTER SET utf8");
    if ($con) {
        $name = $_POST['name'];
        $lastname = $_POST['last_name'];
        $addr = $_POST['adr'];
        $snum = $_POST['snum'];
        $phone = $_POST['phone'];
        $ssn = $_POST['ssn'];
        //   $stdnumber=$_POST['stdnumber'];
        if ($_POST['sex'] === "men") {
            $sex = "مرد";
        } else $sex = "زن";

        if ($_POST['mar'] === "bachelor") {
            $status = "مجرد";
        } else $status = "متاهل";

        $sql = "insert into `users`(`name`,`family`,`phone`,`ssn`,`sex`,`status`,`address`,`snumber`)values (?,?,?,?,?,?,?,?)";
        $statement = $con->prepare($sql);
        $res = $statement->execute(array($name, $lastname, $phone, $ssn, $sex, $status,$addr,$snum));

        if ($res)
            header("Location:index.php?success");
        else header("Location:index.php?error");
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>پیش ثبت نام کربلای معلی</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/materialize_rtl.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
<!---->
<!--  <nav class="teal" role="navigation">-->
<!--    <div class="nav-wrapper container">-->
<!--      <a href="#!" class="brand-logo right">پیش ثبت نام کربلا</a>-->
<!--        <ul id="nav-mobile" class="left hide-on-med-and-down">-->
<!--            <li><a href="http://booyebehesht.loxblog.com">ارتباط با ما</a></li>-->
<!---->
<!--        </ul>-->
<!---->
<!--      <ul id="nav-mobile" class="sidenav">-->
<!--        <li><a href="#">Navbar Link</a></li>-->
<!--      </ul>-->
<!--      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>-->
<!--    </div>-->
<!--  </nav>-->


<nav>
    <div class="teal nav-wrapper">
        <a href="#!" class="brand-logo right">پیش ثبت نام کربلا معلی</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <!--            <li><a href="http://booyebehesht.loxblog.com">ارتباط با ما</a></li>-->
            <li><a href="file3.pdf" download="book">دانلود کتاب آزمون </a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav teal" id="mobile-demo" >
    <!--    <li><a  style="color:#fff" href="http://booyebehesht.loxblog.com">ارتباط با ما</a></li>-->
    <li><a style="color:#fff" href="file3.pdf" download="book">دانلود کتاب آزمون </a></li>

</ul>


<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container" style="width: 100%">




            <!--          <div class="left" style="width: 100%">-->
            <!--              <h1 style="color: lavenderblush;margin-top: 50px" id="demo"></h1>-->
            <!--          </div>-->




        </div>
    </div>
    <div class="parallax"><img src="Capture.PNG" alt="Unsplashed background img 1"></div>
</div>






<!--<div class="parallax-container valign-wrapper">-->
<!--<div class="section no-pad-bot">-->
<!--<div class="container">-->
<!--<div class="row center">-->
<!--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="parallax"><img src="karbala.jpg" alt="Unsplashed background img 2"></div>-->
<!--</div>-->




<div class="container" style="width: 90%">

    <center class="row">
        <?php
        if (isset($_GET['success']))
            echo '<div class="card-panel green accent-4" style="width: 50%;color: white">ثبت نام با موفقیت انجام شد<i class="material-icons prefix">verified_user</i></div>';
        else if (isset($_GET['error']))
            echo '<div class="card-panel red accent-3" style="width: 50%;color: white">مشکلی هنگام ثبت نام رخ داد<i class="material-icons prefix">error_outline</i></div>';
        ?>

    </center>

    <div class="row" >

        <form method="post" action="index.php" class="card col l6 m6 s12" >
            <div class="row">

                <div class="input-field col l6 m6 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="name" name="name" type="text" required class="validate" oninvalid="this.setCustomValidity('لطفا نام خود را وارد کنید')" oninput="this.setCustomValidity('')"  >
                    <label for="name"  >نام</label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="last_name" name="last_name" type="text" required class="validate" oninvalid="this.setCustomValidity('لطفا نام خانوادگی خود را وارد کنید')" oninput="this.setCustomValidity('')" >
                    <label for="last_name">نام خانوادگی</label>
                </div>
            </div>
            <div class="row">

                <div class="input-field col l6 m6 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="snum" name="snum" type="text" required class="validate" oninvalid="this.setCustomValidity('لطفا شماره دانشجویی خود را وارد کنید')" oninput="this.setCustomValidity('')">
                    <label for="snum">شماره دانشجویی</label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="adr" name="adr" type="text"  class="validate" oninvalid="this.setCustomValidity('لطفا نشانی محل سکونت خود را وارد کنید')" oninput="this.setCustomValidity('')">
                    <label for="adr">نشانی محل سکونت </label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col l6 m6 s12">
                    <i class="material-icons prefix">call</i>
                    <input id="phone" name="phone" type="text" required class="validate" oninvalid="this.setCustomValidity('لطفا شماره تماس خود را وارد کنید')" oninput="this.setCustomValidity('')">
                    <label for="phone">شماره موبایل</label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="ssn" name="ssn" type="text" required class="validate" oninvalid="this.setCustomValidity('لطفا شماره ملی خود را وارد کنید')" oninput="this.setCustomValidity('')">
                    <label for="ssn">کدملی</label>
                </div>
            </div>

            <div class="row">
                <center>
                    جنسیت:
                    <label style="margin-right: 50px">
                        <input name="sex" type="radio" value="men" checked />
                        <span>مرد</span>
                    </label>
                    <label style="margin-right: 50px">
                        <input name="sex" value="women" type="radio" />
                        <span>زن</span>
                    </label>
                </center>
            </div>

            <div class="row">
                <center>
                    وضعیت تاهل:
                    <label style="margin-right: 50px">
                        <input name="mar" type="radio" value="bachelor" checked />
                        <span>مجرد</span>
                    </label>
                    <label style="margin-right: 50px">
                        <input name="mar" value="married" type="radio" />
                        <span>متاهل</span>
                    </label>
                </center>
            </div>

            <div class="row">
                <button class="btn blue-grey waves-effect waves-light" style="margin-right: 50px" type="submit" name="submit">ثبت
                    <i class="material-icons right">send</i>
                </button>
            </div>

        </form>


        <div class="col l6 m6 s12" >

            <div class="card-panel blue-grey accent-4" style="color: white">شاید جواب سوال توهم اینجا باشه</div>

            <ul class="collapsible">

                <li>
                    <div class="collapsible-header"  ><i class="material-icons ">whatshot</i>هزینه اردو چقدره؟</div>
                    <div class="collapsible-body"><span>حدودا دو میلیون تومان زمینی وسه میلیون ونیم هوایی</span></div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>کی میریم ایشالا؟</div>
                    <div class="collapsible-body"><span>دهه ی اول یا دوم شهریور 98</span></div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>من که ترم آخرم میتونم بیام؟</div>
                    <div class="collapsible-body"><span>بله،تا یک سال بعد از فارغ التحصیل شدنتون میتونین بیاین</span></div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>هرکسی که اسم بنویسه رو میبرین؟</div>
                    <div class="collapsible-body"><span>هرسال یک آزمون که منبعش رو توی همین سایت قرار میدیم،برگزار میکنیم(معمولا حجم کتابش بیشتر از 70-60 صفحه بیشتر نیست)بعد براساس نمرات شرکت کنندگان نفرات اصلی و ذخیره مشخص می شوند .همچنین به نفرات اول تا دهم شرکت کننده در این آزمون مبلغ 200 هزار تومان کمک هزینه سفر تعلق میگیرد.</span></div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>اشکال داره اسم بنویسم بعدش نیام،بالاخره آدمیزاده شاید کار پیش اومد؟</div>
                    <div class="collapsible-body"><span>در مراحل اولیه ثبت نام خیر،هیچ ایرادی نداره،اما پس از اعلام اسامی نفرات اصلی و درخواست تحویل مدارک، طبیعتالغو ناگهانی وخارج از زمان مقرر ،اعلام انصراف،ممکنه جریمه ای داشته باشه که از طریق دانشگاه و عتبات عالیات دانشگاهی اعلام می شود.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>هزینه های سفر بالاست،وامم میدین؟</div>
                    <div class="collapsible-body"><span>بله،برا این سفر میتونین از دو طریق اقدام به گرفتن وام بکنید.اولی از طریق شعب بانک ملت سراسر کشور که مبلغ این وام2میلیون تومان،باسود 4درصدواقساظ 18ماهه است اما برای سفر هوایی مبلغ وام تا سه میلیون ونیم افزایش پیدا میکنه. اما روش دوم از طریق صندوق رفاه دانشگاه یزد هست که این وام هیچ سودی نداره واقساطش از دوسال بعد از اینکه فارغ التحصیل شدین شروع میشه مبلغش هم حدود800 هزار تومان است.البته این وام مخصوص دانشجویان دانشگاه یزد هست. </span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>من یکی از دوستام میخواد بیاد ،ولی دانشجوی دانشگاه یزد نیست،میشه اونم باهامون بیاد؟</div>
                    <div class="collapsible-body"><span>بله دوستتونم میتونه بیاد،شرط این سفر فقط دانشجو بودن فرد هست و فرقی نمیکنه که دانشجوی کدام دانشگاه یا شهر باشد. </span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>با چه وسیله ای میریم؟</div>
                    <div class="collapsible-body"><span>پسرها با اتوبوس.ولی دخترهاو متاهلین با هواپیما</span></div>
                </li>



            </ul>

        </div>

    </div>
</div>




<!---->
<!--  <div class="parallax-container valign-wrapper">-->
<!--    <div class="section no-pad-bot">-->
<!--      <div class="container">-->
<!--        <div class="row center">-->
<!--          <h5 class="header col s12 light"></h5>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="parallax"><img src="karbala.jpg" alt="Unsplashed background img 3"></div>-->
<!--  </div>-->

<footer class="page-footer teal">


    <p class="grey-text text-lighten-4 " style="text-align: center">

        شماره تماس:09366646637
    </p>

    <div style="text-align: center">
        <img src="logotype-telegram-round-blue-logo-512.png " style="width:20px;height:20px;">
        behnam_abbasi110
    </div>





</footer>




<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>


<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

</body>
</html>
