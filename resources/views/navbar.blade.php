<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/">
                <img src="{{URL::asset('images/logo.png')}}" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav pull-right mainNav" >
                @if($active=="home")
                <li class="active"><a href="/">صفحه ی اصلی</a></li>
                @else
                        <li><a href="/">صفحه ی اصلی</a></li>
                @endif
                <li><a href="/#AboutUs">درباره ی ما</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">تمرین
                        &nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right multi-column columns-3" >
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی دهم</li>
                                    <li><a href="/Courses/amar10">آمار</a></li>
                                    <li class="disabled"><a href="#">ریاضی</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی یازدهم</li>
                                    <li><a href="#">آمار</a></li>
                                    <li class="disabled"><a href="#">احتمال</a></li>
                                    <li class="disabled"><a href="#">ریاضی</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">دوره ی دوازدهم</li>
                                    <li><a href="#">آمار</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li><a href="#">آموزش</a></li>
                <li><a href="/Contact">ارتباط با ما</a></li>
                <?php
                if(Session::get('Login')=="True")
                {
                ?>
                <li><a href="/Dashboard">داشبورد</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Session::get('Name')}}
                        &nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/Profile">پروفایل</a></li>
                        <li><a href="/Logout">خروج</a></li>
                    </ul>
                </li>
                <?php
                }
                else {
                ?>
                <li><a href="/UserArea">ورود | ثبت نام</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->