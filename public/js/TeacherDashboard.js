/**
 * Created by RshNk on 06/09/2016.
 */
$(document).ready(function(){
    $('#choose-test-group').on('change', function() {
        if (this.value == '1') {
            $(".stu-name").hide();

        }
        else {
            $(".stu-name").show();
        }
    });
    //---------------------
    // chips jQuery
    //---------------------
    var sampleTags = ["لیلا رضایی", "سیما بیات", "هنگامه حبیبی", "زیبا نعمتی",
        "هلیا هاشمی","نیلوفر جزایری","سمن عنایتی","راحیل سروش","مینا علیزاده"];
    //-------------------------------
    // Single field
    //-------------------------------
    $('#studentTag').tagit({
        availableTags: sampleTags
    });
    $('#whole-student').tagit({
        availableTags: sampleTags
    });

    /*$(".choose-class").show();
    $(".choose-test").hide();
    $(".choose-stu").hide();
    $("#class-bar").show();
    $("#test-bar").hide();
    $("#test-pie").hide();
    $("#student-line").hide();*/

    //noChanges button
    $('#noChange').click(function () {
        $('.editable').attr('disabled');
        $('.test-data-btn:eq(0)').hide();
        $('#testDataStuEdit').parent('.form-group').hide();
        $('#testDataStu').parent('.form-group').show();
    });

    //answer part in solved test
    $('.NC-tag').each(function(){
        if($(this).text()=='C')
        {
            //alert('correct');
            $(this).siblings('.answer-pic').attr('src',"/images/Correct-stamp.png");
        }
        else
        {
            //alert('notCOrrect');
            $(this).siblings('.answer-pic').attr('src',"/images/Wrong-stamp.png");
        }
    });
    $('.question-box img').each(function() {

        if ($(this).attr('title') == 'ساده')
        {
            $(this).attr('src',"images/emoticon/32easy.png");
            $(this).siblings('.point').children('span').text("۱");
        }
        else if($(this).attr('title') == 'متوسط')
        {
            $(this).attr('src',"images/emoticon/32normal.png");
            $(this).siblings('.point').children('span').text("۲");
        }
        else if($(this).attr('title') =='سخت')
        {
            $(this).attr('src',"images/emoticon/32hard.png");
            $(this).siblings('.point').children('span').text("۳");
        }
    });
    //class-data page in dashboard
    //fill progress bar
    $('.dash-table-content').each(function () {
        var stuPoint= parseInt($(this).find('.stuPoint').text());
        var totalPoint=  parseInt($(this).find('.totalPoint').text());
        var per=(stuPoint/totalPoint*100).toFixed(2);
        //alert($(this).html());
        $(this).find('.progress-bar').attr({
            "aria-valuemin":"0",
            "aria-valuemax":totalPoint,
            "style":'width:'+per+'%'
        });
        $(this).find('.progress-bar').text(per+'%');
        difficultyMode($(this),per);
    });
});
function difficultyMode(thisObj,per){
    if(per>66)
    {
        $(thisObj).find('.progress-bar').addClass("progress-bar-info");
    }
    else if(per > 33)
    {
        $(thisObj).find('.progress-bar').addClass("progress-bar-warning");
    }
    else
    {
        $(thisObj).find('.progress-bar').addClass("progress-bar-danger");
    }
}
function virtual_click(ev) {
    $("[class='active']").attr('class','');
    $("a[href="+ev+"]")[0].click();
}
$('#class-rename').click(function () {
   $('#rename-form').show();
});
function change_test() {
    $('.editable').each(function () {
        $(this).removeAttr('disabled');
    });
    $('.test-data-btn:eq(0)').show();
    $('#testDataStuEdit').parent('.form-group').show();
    $('#testDataStu').parent('.form-group').hide();

}
var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var randomColor = function(opa) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() +','+ opa + ')';
};

//student info
$('#ch_class').on('change', function() {
    //get selected id
    var id = $("#ch_class option:selected").val();
    // <canvas id='student-line'>
    var stuLine = document.getElementById("student-line");

    $.ajax({
        url: '/student/ajax/'+id,
        type: "GET",
        dataType: "json",
        success:function(data) {
            $('#selectStudent').empty(); // with change class,remove student info
            $.each(data, function(key, value) {

                $('#selectStudent').append('<option value="'+ key +'">'+ value.name +'</option>');
                $('#selectStudent').on('click', function(){
                    var st = $("#selectStudent option:selected").val();
                    if(key == st){
                        $('#stu_name').val(value.name);
                        $('#stu_email').val(value.email);
                        //create a chart, labels and data get array
                        var StuLine = new Chart(stuLine, {
                            type: 'line',
                            data: {
                                labels: value.labels,
                                datasets: [
                                    {
                                        label: "نمره",
                                        fill: false,
                                        lineTension: 0.1,
                                        backgroundColor: "rgba(75,192,192,0.4)",
                                        borderColor: "rgba(75,192,192,1)",
                                        borderCapStyle: 'butt',
                                        borderDash: [],
                                        borderDashOffset: 0.0,
                                        borderJoinStyle: 'miter',
                                        pointBorderColor: "rgba(255, 102, 102, 1)",
                                        pointBackgroundColor: "#fff",
                                        pointBorderWidth: 5,
                                        pointHoverRadius: 7,
                                        pointHoverBackgroundColor: "rgba(255, 102, 102, 1)",
                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                        pointHoverBorderWidth: 2,
                                        pointRadius: 1,
                                        pointHitRadius: 10,
                                        data: value.data,
                                        spanGaps: false
                                    }
                                ]},
                            options: {
                                responsive: true,
                                title:{
                                    display:true,
                                    text:'نمودار پیشرفت وضعیت دانش آموز',
                                    position: 'top',
                                    fontSize: 16,
                                    fontFamily: "IRANSans"
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            max:100,
                                            min:0,
                                            stepSize: 10
                                        }
                                    }]
                                }
                            }
                        });

                        $('#exercise_info').empty()
                        $.each(value.score , function(i,val){
                            $('#exercise_info').append(
                                '<div class="col-md-5"><p>'+val.exercise_name+'</p></div><div class="col-md-3">' +
                                '<p><span class="stuPoint">'+val.exercise_st_point+'</span>/<span class="totalPoint">'+val.exercise_t_point+'</span></p></div>'+
                                '<div class="col-md-4"><div class="progress">'+
                                '<div class="progress-bar progress-bar-striped" style="width:'+val.exercise_percent+'%'+'">'+val.exercise_percent+'%'+'</div></div></div>'
                            );
                        });
                    }
                });
            });
        }
    });
});

<!--when user choose class,show student info-->
$('#chooseClass').on('change', function() {
    var id = $("#chooseClass option:selected").val();
    var classBar = document.getElementById("class-bar");
    $.ajax({
        url: '/cl/ajax/'+id,
        type: "GET",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
        },
        success:function(data) {
            $('#class_delete').html(
            '<div class="col-md-1 col-sm-1"><i class="fa fa-2x fa-pencil" aria-hidden="true"></i>&nbsp;:</div>'+
            '<form method="get" action="/DeleteClass/'+id+'"><input type="hidden" name="_token" value={{ csrf_token()}}>'+
            '<div class="col-md-3 col-sm-5"><button id="class-delete" class="btn btn-block btn-delete">حذف کلاس</button></div></form>');

                        var ClassBar = new Chart(classBar, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: 'نمره',
                                    data: data.data,
                                    backgroundColor: [
                                        randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2),
                                        randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2)
                                    ],
                                    borderColor: [
                                        randomColor(1),randomColor(1),randomColor(1),randomColor(1),randomColor(1),
                                        randomColor(1),randomColor(1),randomColor(1),randomColor(1)
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {

                                defaultFontFamily: "IRANSans",
                                title: {
                                    display: true,
                                    text: 'نمرات در کل تمرین های کلاس',
                                    position: 'top',
                                    fontSize: 16,
                                    fontFamily: "IRANSans"
                                },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true,
                                            max:100,
                                            min:0
                                        }
                                    }]
                                }
                            }

                        });
                        $('#stud_info').empty();
                        $.each(data.user , function(i,val){
                            $('#stud_info').append(
                                '<div class="row dash-table-content chapter"><div class="col-md-5">'+
                                '<p class="black">'+val.stud_name+'</p></div><div class="col-md-6"></div><div class="col-md-1">'+
                                '<button class="btn-delete btn-sm delete-student" title="حذف دانش آموز"><i class="fa fa-1x fa-user-times"></i></button></div></div>');

                            $.each(val.section , function(j,v){
                                $.each(v , function(x,y){
                                    $('#stud_info').append(
                                        '<div class="row dash-table-content dash-section">'+
                                        '<div class="col-md-5"><p>'+y.section_name+'</p></div>'+
                                        '<div class="col-md-2"><p><span class="stuPoint">'+y.status+'</span>/<span class="totalPoint">'+
                                        y.total+'</span></p></div>'+'<div class="col-md-4"><div class="progress">'+
                                        '<div class="progress-bar progress-bar-striped" style="width:'+y.progress+'%'+'">'+y.progress+'%'+'</div></div></div></div>');
                                });
                            });
                            $('#stud_info').append('<hr/>');
                        });
        }
    });
});

<!--when user choose school,show class name & student info-->
//$('#selectSchool').on('change', function() {
//    var id = $("#selectSchool option:selected").val();
//
//    var classBar = document.getElementById("class-bar");
//    $.ajax({
//        url: '/school/ajax/'+id,
//        type: "GET",
//        dataType: "json",
//        headers: {
//            'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
//        },
//        success:function(data) {
//            $('#chooseClass').empty();
//            $('#class_delete').empty();
//            $.each(data, function(key,value){
//                $('#chooseClass').append('<option value="'+ key +'">'+ value.class_name +'</option>');
//                $('#chooseClass').on('click',function(){
//                    var cl = $("#chooseClass option:selected").val();
//
//                    if(key == cl){
//
//                        $('#class_delete').html(
//                            '<div class="col-md-1 col-sm-1"><i class="fa fa-2x fa-pencil" aria-hidden="true"></i>&nbsp;:</div>'+
//                            '<form method="get" action="/DeleteClass/'+cl+'"><input type="hidden" name="_token" value={{ csrf_token()}}>'+
//                            '<div class="col-md-3 col-sm-5"><button id="class-delete" class="btn btn-block btn-delete">حذف کلاس</button></div></form>');
//
//                        var ClassBar = new Chart(classBar, {
//                            type: 'bar',
//                            data: {
//                                labels: value.labels,
//                                datasets: [{
//                                    label: 'نمره',
//                                    data: value.data,
//                                    backgroundColor: [
//                                        randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2),
//                                        randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2)
//                                    ],
//                                    borderColor: [
//                                        randomColor(1),randomColor(1),randomColor(1),randomColor(1),randomColor(1),
//                                        randomColor(1),randomColor(1),randomColor(1),randomColor(1)
//                                    ],
//                                    borderWidth: 1
//                                }]
//                            },
//                            options: {
//
//                                defaultFontFamily: "IRANSans",
//                                title: {
//                                    display: true,
//                                    text: 'نمرات در کل تمرین های کلاس',
//                                    position: 'top',
//                                    fontSize: 16,
//                                    fontFamily: "IRANSans"
//                                },
//                                scales: {
//                                    yAxes: [{
//                                        ticks: {
//                                            beginAtZero:true,
//                                            max:100,
//                                            min:0
//                                        }
//                                    }]
//                                }
//                            }
//
//                        });
//                        $('#stud_info').empty();
//                        $.each(value.user , function(i,val){
//                            $('#stud_info').append(
//                                '<div class="row dash-table-content chapter"><div class="col-md-5">'+
//                                '<p class="black">'+val.stud_name+'</p></div><div class="col-md-6"></div><div class="col-md-1">'+
//                                '<button class="btn-delete btn-sm delete-student" title="حذف دانش آموز"><i class="fa fa-1x fa-user-times"></i></button></div></div>');
//
//                            $.each(val.section , function(j,v){
//                                $.each(v , function(x,y){
//                                    $('#stud_info').append(
//                                        '<div class="row dash-table-content dash-section">'+
//                                        '<div class="col-md-5"><p>'+y.section_name+'</p></div>'+
//                                        '<div class="col-md-2"><p><span class="stuPoint">'+y.status+'</span>/<span class="totalPoint">'+
//                                        y.total+'</span></p></div>'+'<div class="col-md-4"><div class="progress">'+
//                                        '<div class="progress-bar progress-bar-striped" style="width:'+y.progress+'%'+'">'+y.progress+'%'+'</div></div></div></div>');
//                                });
//
//                            });
//
//                            $('#stud_info').append('<hr/>');
//                        });
//                    }
//                });
//
//            });
//        }
//    });
//});

//test chart info-circle
$('#selectExercise').on('change',function(){
    var ID = $(this).val();
    var testPie = document.getElementById("test-pie");
    var testBar = document.getElementById("test-bar");

    $.ajax({
        url: '/exercise_info/ajax/'+ID,
        type: "GET",
        dataType: "json",
        success:function(data) {
            $.each(data, function(key,value){
                $('#sect').val(value.section_name);

                var TestPie = new Chart(testPie, {
                    type: 'pie',
                    data: {
                        labels: [
                            "خوب (66-100%)",
                            "متوسط (33-66%)",
                            "بد (0-33%)"
                        ],
                        datasets: [
                            {
                                data: value.data,
                                backgroundColor: [

                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)',
                                    'rgba(255, 99, 132, 0.8)'
                                ],
                                hoverBackgroundColor: [
                                    "#36A2EB",
                                    "#FFCE56" ,
                                    "#FF6384"
                                ]
                            }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'وضعیت پاسخگویی در این تمرین',
                            position: 'top',
                            fontSize: 16,
                            fontFamily: "IRANSans"
                        }
                    }
                });

                var TestBar = new Chart(testBar, {
                    type: 'bar',
                    data: {
                        labels: value.labels,
                        datasets: [{
                            label: 'نمره',
                            data: value.udata,
                            backgroundColor: [
                                randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2),
                                randomColor(.2),randomColor(.2),randomColor(.2),randomColor(.2)
                            ],
                            borderColor: [
                                randomColor(1),randomColor(1),randomColor(1),randomColor(1),randomColor(1),
                                randomColor(1),randomColor(1),randomColor(1),randomColor(1)
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'نمرات تمرین',
                            position: 'top',
                            fontSize: 16,
                            fontFamily: "IRANSans"
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    max:100,
                                    min:0
                                }
                            }]
                        }
                    }
                });

                $('.chapter').empty();
                $.each(value.exercise, function(j,val){
                    $.each(val.score, function(k,v){
                        $('.chapter').append(
                            '<div class="col-md-4"><p class="black">'+val.name+'</p></div>'+
                            '<div class="col-md-3"><p><span class="stuPoint">'+ v.exercise_st_point+'</span>/<span class="totalPoint">'+
                            v.exercise_t_point+'</span></p></div><div class="col-md-5"><div class="progress">'+
                            '<div class="progress-bar progress-bar-striped" style="width:'+v.exercise_percent+'%'+'">'+v.exercise_percent+'%'+'</div></div></div>'
                        );
                    });
                });
            });
        }
    });
});


$('.which_ex').on('click',function(){
    var ID = $(this).val();
    $.ajax({
        url: '/exercise/ajax/'+ID,
        type: "GET",
        dataType: "json",
        success:function(data) {
            $('#ex-info').empty();
            $('#ex-info').append(
                "<form method=\"get\" action=\"/EditEx/"+ID+"\">"+
                '<input type="hidden" name="csrf-token" value="'+$('meta[name="csrf-token"]').attr('content')+'">'+
                '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><label>نام</label><input id="ex_name" type="text" class="form-control" value="" disabled></div></div>'+
                '<div class="col-md-4 col-sm-12"><div class="form-group"><label>رمز</label><input id="ex_code" type="text" class="form-control" value="" disabled></div></div>'+
                '<div class="col-md-4 col-sm-12"><div class="form-group"><label>درس</label><input id="ex_course" type="text" class="form-control" value="" disabled></div></div></div>'+
                '<div class="row"><div class="col-md-6 col-sm-12"><div class="form-group"><label>فصل</label><input id="ex_section" type="text" class="form-control" value="" disabled></div></div></div>'+
                '<div class="row"><div class="col-md-4 col-sm-12"><div class="form-group"><label>تاریخ شروع</label><input name="start" id="ex_start" type="date" class="form-control editable" value="" disabled></div></div>'+
                '<div class="col-md-4 col-sm-12"><div class="form-group"><label>تاریخ پایان</label><input name="end" id="ex_end" type="date" class="form-control editable" value="" disabled></div></div></div>'+
                '<div ><div class="row"><div class="col-md-3 col-sm-12"><div class="form-group"><label class="control-label">تعداد سوال:</label></div></div>'+
                '<div class="col-md-1 col-sm-4"><div class="form-group"><label>آسان</label></div></div>'+
                '<div class="col-md-2 col-sm-8"><div class="form-group"><input id="ex_easy" type="number" class="form-control" value="" disabled></div></div>'+
                '<div class="col-md-1 col-sm-4"><div class="form-group"><label>متوسط</label></div></div>'+
                '<div class="col-md-2 col-sm-8"><div class="form-group"><input id="ex_medium" type="number" class="form-control" value="" disabled></div></div>'+
                '<div class="col-md-1 col-sm-4"><div class="form-group"><label>سخت</label></div></div>'+
                '<div class="col-md-2 col-sm-8"><div class="form-group"><input id="ex_hard" type="number" class="form-control" value="" disabled></div></div></div></div>'+
                '<div class="row"><div class="col-md-12 col-sm-12"><div class="form-group"><label>دانش آموزان</label><input id="testDataStu" class="form-control" value="" disabled></div>'+
                '<div class="form-group" hidden><label>دانش آموزان</label><ul class="add-std" id="testDataStuEdit"></ul></div></div></div>'+
                '<div class="row test-data-btn" hidden><div class="col-md-3 col-sm-3"><div class="form-group"><button id="setChanges" class="btn btn-block btn-success">اعمال تغییر</button></div></div>'+
                '<div class="col-md-3 col-sm-3"><div class="form-group"><button class="btn btn-block btn-delete" id="noChange">انصراف</button></div></div></div></form>'+
                '<div class="row"><div class="col-md-1 col-sm-1"><i class="fa fa-2x fa-pencil" aria-hidden="true"></i>&nbsp;:</div>'+
                '<div class="col-md-3 col-sm-3"><a href="/del/'+ID+'" class="btn btn-block btn-delete" >حذف</a></div>'+
                '<div class="col-md-3 col-sm-3"><button class="btn btn-block btn-success" onclick="change_test()">ایجاد تغییرات</button></div>'+
                '<div class="col-md-5 col-sm-12"><a href="/exercise/'+ID+'" class="btn btn-block btn-default">مشاهده تمرین</a></div></div>'
            );

            $('#ex_name').val(data.name);
            $('#ex_code').val(data.code);
            $('#ex_course').val(data.course_name);
            $('#ex_section').val(data.section_name);
            $('#ex_start').val(data.start);
            $('#ex_end').val(data.end);
            $('#ex_easy').val(data.easy);
            $('#ex_medium').val(data.medium);
            $('#ex_hard').val(data.hard);


            $('#testDataStuEdit').tagit({
                //availableTags: {value:value ,label:key},
                singleField: true ,
                singleFieldNode: $('#testDataStu')
            });
            $("#testDataStuEdit").tagit('removeAll');

            $.each(data.user , function(key,value){
                $('#testDataStuEdit').tagit('createTag',value);

                //$("#testDataStuEdit").tagit({
                //    afterTagRemoved: function(event, ui) {
                //        // do something special
                //        console.log(ui.tag);
                //    }
                //});

            });
        }
    });
});



$('.whichQ').on('click',function(){
    var ID = $(this).val();
    console.log(ID);
    $.ajax({
        url: '/Q/ajax/'+ID,
        type: "GET",
        dataType: "json",

        success:function(data) {

            $('#show-question').empty();

            $('#show-question').append(
                '<div class="row"><div class="col-sm-10 col-md-10"><h3 class="black">اضافه کردن سوال</h3><br>'+
                "<form method=\"get\" action=\"/EditQuestion/"+ID+"\">"+
                '<input type="hidden" name="csrf-token" value="'+$('meta[name="csrf-token"]').attr('content')+'">'+
                '<div class="row"><div class="col-md-4 col-sm-4"><div class="form-group"><label for="chapter">درس :</label>'+
                '<select name="course" class="form-control" id="cha_course" required>'+
                '<option value='+ID+' selected>'+data.course+'</option>'+
                '</select></div></div><div class="col-md-4 col-sm-4"><div class="form-group"><label for="chapter">فصل:</label>'+
                '<select name="section" class="form-control" id="ch_chapter" required><option value='+data.section_id+'>'+data.section+'</option>'+
                '</select></div></div><div class="col-md-4 col-sm-4"><div class="form-group"><label for="difficulty">میزان سختی سوال:</label><select name="difficulty" class="form-control " id="difficulty" required>'+
                '<option value="0">آسان (1نمره)</option><option value="1">متوسط (2نمره)</option><option value="2">سخت (3نمره)</option></select></div></div></div>'+
                '<div class="form-group"><label>صورت سوال:</label><textarea name="question" rows="4" class="form-control" required>'+data.content+'</textarea></div>'+
                ' <div class="form-group"><label>گزینه ها:</label></div><div class="row"><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine1" class="form-control " value='+data.gozine1+'></div></div><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine2" class="form-control " value='+data.gozine2+'> </div></div></div><div class="row"><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine3" class="form-control " value='+data.gozine3+'> </div></div><div class="col-md-6 col-sm-12"><div class="form-group">'+
                '<input name="gozine4" class="form-control " value='+data.gozine4+'> </div></div></div><div class="row"><div class="col-md-6 col-sm-12">'+
                '<div class="form-group"><label>گزینه درست:</label><input name="answer" class="form-control " type="number" value='+data.gozine_correct+'> </div></div></div>'+
                '<div class="form-group"><label>راه حل(اختیاری):</label><textarea name="solution" rows="4" class="form-control" required>'+data.solution+'</textarea></div><div class="form-group">'+
                '<button id="khar" type="submit" class="btn btn-default btn-lg">ویرایش</button></div></form></div></div>');

                $.each(data.courses, function(key,value){
                    if(value == data.course){

                    }else {
                        $('#cha_course').append('<option value=' + key + '>' + value + '</option>')
                    }
                });

                $.each(data.sections, function(key,value){
                    if(value == data.section){

                    }else {
                        $('#ch_chapter').append('<option value=' + key + '>' + value + '</option>')
                    }
                });


        }
    });
});

<!--for exercise creation -->
$('#all').on('click', function(){
    if($(this).prop("checked") == true){
        $('#code-cl').prop('disabled', 'disabled');
    }else{
        $('#code-cl').prop('disabled', false);
    }
});

$('#choose_course').on('change', function() {
    var id = $("#choose_course option:selected").val();

    $.ajax({
        url: '/section/ajax/'+id,
        type: "GET",
        dataType: "json",
        success:function(data) {
            $('#choose_section').empty();
            $.each(data, function(key, value) {
                $('#choose_section').append('<option value="'+ key +'">'+ value.name +'</option>');
                $('#choose_section').on('click' , function(){

                    var sec = $('#choose_section option:selected').val();
                    if(key == sec){
                        $('#easy_no').val(value.easy);
                        $('#medium_no').val(value.medium);
                        $('#hard_no').val(value.hard);
                    }
                });
            });
        }
    });
});

$('#ch_course').on('change', function() {
    var id = $("#ch_course option:selected").val();

    $.ajax({
        url: '/question/ajax/'+id,
        type: "GET",
        dataType: "json",
        success:function(data) {
            $('#choose_chapter').empty();
            $.each(data, function(key, value) {

                $('#choose_chapter').append('<option value="'+ key +'">'+ value +'</option>');

            });
        }
    });
});

$("#join_code").on('change',function(){
    var code=$("#join_code").val();
    console.log(code);
    $.ajax({
        "async": false,
        "crossDomain": true,
        "url": "/checkcode",
        "method": "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        "data":{
            "code":code
        },
        success:function (response) {
            console.log(response);
            if(response!=1){
                $("#error_code").show()
            }
            else{
                $("#error_code").hide()
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert('error');
        }
    });
});

$('#easy_num').on('change',function(){
    var num=$(this).val();
    var course = $('#choose_course').val();
    var section = $('#choose_section').val();

    $.ajax({
        "url": "/checkeasynum",
        "method": "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        "data":{
            "course": course,
            "section": section,
            "num": num
        },
        success:function (response) {
            if(response!=1){
                $("#error_easy").show()
            }
            else{
                $("#error_easy").hide()
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert('error');

        }
    });
});

$('#medium_num').on('change',function(){
    var num=$(this).val();
    var course = $('#choose_course').val();
    var section = $('#choose_section').val();

    $.ajax({
        "url": "/checkmednum",
        "method": "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        "data":{
            "course": course,
            "section": section,
            "num": num
        },
        success:function (response) {
            if(response!=1){
                $("#error_medium").show()
            }
            else{
                $("#error_medium").hide()
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert('error');

        }
    });
});

$('#hard_num').on('change',function(){
    var num=$(this).val();
    var course = $('#choose_course').val();
    var section = $('#choose_section').val();

    $.ajax({
        "url": "/checkhardnum",
        "method": "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        "data":{
            "course": course,
            "section": section,
            "num": num
        },
        success:function (response) {
            if(response!=1){
                $("#error_hard").show()
            }
            else{
                $("#error_hard").hide()
            }
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert('error');

        }
    });
});
