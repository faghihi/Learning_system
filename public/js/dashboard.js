/**
 * Created by RshNk on 29/09/2016.
 */
$(document).ready(function () {
    //handle multiple nav

    $('.nav-pills>li').click(function () {
       $('li.active').removeAttr('class');
    });

    // $('[data-toggle="pill"]').on('click', function (e) {
    //     var now_tab = e.target // activated tab
    //
    //     // get the div's id
    //     var divid = $(now_tab).attr('href').substr(1);
    //     console.log(divid);
    //     $.getJSON('xxx.php').success(function(data){
    //         $("#"+divid).text(data.msg);
    //     });
    // })


    $('#co li').on('click' ,function(){
        var course = $('#co li').val();
        console.log(course);
        $.ajax({
            url: '/course/ajax/'+course,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#h4').html('<span>'+data['course_grade']+'</span>' +'&nbsp;-&nbsp;'+
                '<span>' +data['teacher']+'</span>');
                $('#info').empty()
                var stuLine = document.getElementById("student-line");
                var StuLine = new Chart(stuLine, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: "نمره",
                                fill: false,
                                lineTension: 0.1,
                                backgroundColor: randomColor(.4),
                                borderColor: randomColor(1),
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: randomColor(1),
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 5,
                                pointHoverRadius: 7,
                                pointHoverBackgroundColor: randomColor(1),
                                pointHoverBorderColor: randomColor(1),
                                pointHoverBorderWidth: 2,
                                pointRadius: 1,
                                pointHitRadius: 10,
                                data: data.data,
                                spanGaps: false
                            }
                        ]},
                    options: {
                        responsive: true,
                        title:{
                            display:true,
                            text:'نمودار پیشرفت وضعیت',
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
                $.each(data.score, function(key,value){
                    $('#info').append('<div class="col-md-5"><p>'+value['name']+'</p></div>'+
                    '<div class="col-md-3"><p><span class="stuPoint">'+value['st_point']+'</span>/<span class="totalPoint">'+
                    value['t_point']+'</span></p></div>'+'<div class="col-md-4"><div class="progress">'+
                    '<div class="progress-bar progress-bar-striped" style="width:'+value['percent']+'%'+'">'+value['percent']+'%'+'</div></div></div>');
                });
            }
        });
    });
    //create exercise
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

    //fill progress bar in situation part in first page
    var UrTest=parseInt($('.situation .UrTest:eq(0)').text());
    var GoalTest=parseInt($('.situation .GoalTest:eq(0)').text());
    var UrQue=parseInt($('.situation .UrQue:eq(0)').text());
    var GoalQue=parseInt($('.situation .GoalQue:eq(0)').text());
    var perTest=(UrTest/GoalTest*50).toFixed(2);
    var perQue=(UrQue/GoalQue*50).toFixed(2);
    $('#progTestPart').attr({
            "aria-valuemin":"0",
            "aria-valuemax":'50',
            "style":'width:'+perTest+'%'
        });
    $('#progTestPart span').text(perTest*2+'%');
    difficultyMode($('#progTestPart'),perTest*2);
    $('#progQuesPart').attr({
            "aria-valuemin":"0",
            "aria-valuemax":'50',
            "style":'width:'+perQue+'%'
        });
    $('#progQuesPart span').text(perQue*2+'%');
    difficultyMode($('#progQuesPart'),perQue*2);
    //image for situation box
    SituationImage(parseInt(perTest)+parseInt(perQue));
    //fill progress bar in dash table
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
        difficultyMode($(this).find('.progress-bar'),per);
    });
});
function difficultyMode(thisObj,per){
    if(per>66)
    {
        $(thisObj).addClass("progress-bar-info");
    }
    else if(per > 33)
    {
        $(thisObj).addClass("progress-bar-warning");
    }
    else
    {
        $(thisObj).addClass("progress-bar-danger");
    }
}
function SituationImage(per){
    if(per>66)
    {
        $('.situation img').attr('src',"images/emoticon/64perfect.png");
        $('.situation>span').text('ایول به خودم.');
    }
    else if(per > 33)
    {
        $('.situation img').attr('src',"images/emoticon/64noproblem.png");
        $('.situation>span').text('هنوز مونده راضی بشم.');
    }
    else
    {
        $('.situation img').attr('src',"images/emoticon/64beginner.png");
        $('.situation>span').text('باید تلاشمو بیشتر کنم.');
    }
}

var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var randomColor = function(opa) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() +','+ opa + ')';
};


$('[data-search]').on('keyup', function() {
    var searchVal = $(this).val();
    var filterItems = $('[data-filter-item]');

    if ( searchVal != '' ) {
        filterItems.addClass('hidden');
        $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
    } else {
        filterItems.removeClass('hidden');
    }
});