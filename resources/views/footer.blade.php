
<footer id="footer">

    <div class="container">
        <div class="row">
            <div class="footerbottom">
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="#" data-toggle="modal" data-target="#teacher-modal">
                                اساتید عضو
                            </a></h4>
                        <div class="menu-course">
                            <ul class="menu">
                                @foreach($teachers as $teacher)
                                    @if($teacher->type == 'teacher')
                                        <li><a href="#">{{$teacher->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="#" data-toggle="modal" data-target="#school-modal">
                                مدارس عضو
                            </a></h4>
                        <div class="menu-course">
                            <ul class="menu">
                                @foreach($schools as $school)
                                    <li> <a href="#">{{$school->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="#" data-toggle="modal" data-target="#course-modal">
                                دروس ارائه شده
                            </a></h4>
                        <div class="menu-course">
                            <ul class="menu">
                                @foreach($courses as $course)
                                    <li><a href="#">{{$course->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footerwidget">
                        <h4><a href="/Contact">ارتباط با ما</a></h4>
                        <p>ارتباط مستقیم</p>
                        <div class="contact-info">
                            <i class="fa fa-map-marker"></i>&nbsp; تهران، چهارراه ولیعصر، دانشگاه صنعتی امیرکبیر<br>
                            <i class="fa fa-phone"></i>&nbsp; 021-22224444<br>
                            <i class="fa fa-envelope-o"></i>&nbsp; youremail@email.com
                        </div>
                    </div><!-- end widget -->
                </div>
            </div>
        </div>
        <div class="supporter text-center">
            <h4>حامیان: &nbsp;</h4>
            <a  href="http://www.aut.ac.ir"><img  src="{{URL::asset('images/AKUT.svg.png')}}" title="دانشگاه صنعتی امیرکبیر"></a>
            <a href="#"></a>
        </div>
        <div class="social text-center">
            {{--<a href="#"><i class="fa fa-twitter" title="twitter"></i></a>--}}
            {{--<a href="#"><i class="fa fa-facebook" title="facebook"></i></a>--}}
            <a href="https://www.instagram.com/_u/official.hich"><i class="fa fa-instagram" title="instagram"></i></a>
            <a href="https://t.me/Official_Hich"><i class="fa fa-location-arrow" title="telegram"></i></a>
        </div>

        <!-- Modal -->
        <!--Teacher Modal-->
        <div id="teacher-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h4 class="modal-title">اساتید عضو در سایت :</h4>
                    </div>
                    <div class="modal-body">
                        <p>جستجو در نام اساتید:</p>
                        <form>
                            <input class="search-modal" type="text" placeholder="جستجو ..."data-search>
                        </form>
                        <hr>
                        <div class="result-search">
                            @foreach($teachers as $teacher)
                            @if($teacher->type == 'teacher')
                                <div class="teacher-block" data-filter-item data-filter-name="{{$teacher->name}}">
                                    <img src='images/profile1.png'>
                                    <p>{{$teacher->name}}</p>
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Teacher Modal-->
        <!--school Modal-->
        <div id="school-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h4 class="modal-title">مدارس ثبت شده در سایت: </h4>
                    </div>
                    <div class="modal-body">
                        <p>جستجو در نام مدارس:</p>
                        <form>
                            <input class="search-modal" type="text" name="search" placeholder="جستجو ..."data-search>
                        </form>
                        <hr>
                        <div class="result-search">
                            @foreach($schools as $school)
                                <div class="school-block" data-filter-item data-filter-name="{{$school->name}}">
                                    <p>{{$school->name}}</p>
                                    <p>{{$school->address}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /school Modal-->
        <!--school Modal-->
        <div id="course-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <br/>
                        <h4 class="modal-title">دروس  موجود در سایت: </h4>
                    </div>
                    <div class="modal-body">
                        <p>جستجو در نام دروس:</p>
                        <form>
                            <input class="search-modal" type="text" name="search" placeholder="جستجو ..."data-search>
                        </form>
                        <hr>
                        <div class="result-search">
                            @foreach($courses as $course)
                                <div class="course-block" data-filter-item data-filter-name="{{$course->name}}">
                                    <p>{{$course->name}}</p>
                                    @foreach($grades as $grade)
                                        @if($grade->id == $course->grade_id)
                                            <p>مقطع: &nbsp;<span>{{$grade->name}}</span></p>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ببندش!</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /school Modal-->
        <!-- /Modal -->

        <div class="clear"></div>
        <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 panel footer-col">
                    <div class="panel-body">
                        <p class="simplenav">
                            <a href="#">صفحه اصلی</a> |
                            <a href="#AboutUs">درباره ی ما</a> |
                            <a href="#">آموزش</a> |
                            <a href="/Contact">ارتباط با ما</a> |
                            <a href="/Dashboard">داشبورد</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5 panel footer-col">
                </div>
                <div class="col-md-3 panel footer-col">
                    <p class="text-right">
                        Copyright &copy; 2017 example.com
                    </p>
                </div>
            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>