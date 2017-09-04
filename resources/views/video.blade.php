
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="favicon" href="images/favicon.png">
    <link rel="favicon" href="images/favicon.png">
    <!-- custome js just for login page -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontiran.css">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/general.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Fixed navbar -->
@include('navbar',array('active'=>'dashboard'))

<header id="head" class="secondary">
    <div class="container">
        <h1>ویدئوها</h1>
        <p>مربوط به آموزش و تسهیل حل تمرین ها</p>
    </div>
</header>

<!-- container -->
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">ویدئوهای آموزشی</h3>
                    <p>این ویدئوها مربوط به آموزش قسمت های مختلف درس و یا آموزش حل تمرین ها به صورت ویدئویی می باشد.</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 news-box top-margin">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="newsBox">
                                <div class="thumbnail">
                                    <figure><img src="images/video1.png" alt=""></figure>
                                    <div class="caption maxheight2">
                                        <div class="box_inner">
                                            <div class="box">
                                                <p class="title"><h5>حل تمرین در اکسل 1</h5></p>
                                                <p>آموزش کشیدن نمودار میله ای در اکسل توسط دکتر عادل محمدپور.</p>
                                                <a href="#">لینک دانلود ویدئو</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="newsBox">
                                <div class="thumbnail">
                                    <figure><img src="images/video2.jpg" alt=""></figure>
                                    <div class="caption maxheight2">
                                        <div class="box_inner">
                                            <div class="box">
                                                <p class="title"><h5>حل تمرین در اکسل 2</h5></p>
                                                <p>آموزش کشیدن نمودار میله ای در اکسل توسط دکتر عادل محمدپور.</p>
                                                <a href="#">لینک دانلود ویدئو</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="newsBox">
                                <div class="thumbnail">
                                    <figure><img src="images/video3.jpg" alt=""></figure>
                                    <div class="caption maxheight2">
                                        <div class="box_inner">
                                            <div class="box">
                                                <p class="title"><h5>حل تمرین در اکسل 3</h5></p>
                                                <p>آموزش کشیدن نمودار میله ای در اکسل توسط دکتر عادل محمدپور.</p>
                                                <a href="#">لینک دانلود ویدئو</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->

@include('footer')

</body>
</html>
