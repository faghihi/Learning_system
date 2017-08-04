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
        availableTags: sampleTags,
    });
    $('#testDataStuEdit').tagit({
        availableTags: sampleTags,
        singleField: true ,
        singleFieldNode: $('#testDataStu')
    });
    //set in input value in test-data part in dashboard
    for(var x in sampleTags)
    {
        $('#testDataStuEdit').tagit('createTag',sampleTags[x]);
    }
    /*--- class report chart ----*/
    var classBar = document.getElementById("class-bar");
    var ClassBar = new Chart(classBar, {
        type: 'bar',
        data: {
            labels: sampleTags,
            datasets: [{
                label: 'نمره',
                data: [70, 30, 55, 100, 55, 66, 78, 20, 99],
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
    /*--- test report chart ----*/
    var testBar = document.getElementById("test-bar");
    var TestBar = new Chart(testBar, {
        type: 'bar',
        data: {
            labels: sampleTags,
            datasets: [{
                label: 'نمره',
                data: [70, 30, 55, 100, 55, 66, 78, 20, 99],
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
    /*--- test point report chart ----*/
    var testPie = document.getElementById("test-pie");
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
                    data: [4, 3, 2],
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
    /*--- test point report chart ----*/
    var stuLine = document.getElementById("student-line");
    var StuLine = new Chart(stuLine, {
        type: 'line',
        data: {
            labels: ["تمرین 1", "تمرین 2", "تمرین 3", "تمرین 4"],
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
                    data: [65, 59, 80, 78],
                    spanGaps: false,
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
            $(this).siblings('.answer-pic').attr('src',"images/Correct-stamp.png");
        }
        else
        {
            //alert('notCOrrect');
            $(this).siblings('.answer-pic').attr('src',"images/Wrong-stamp.png");
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