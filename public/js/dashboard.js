/**
 * Created by RshNk on 29/09/2016.
 */
$(document).ready(function () {
    //handle multiple nav
   $('.nav-pills>li').click(function () {
       $('li.active').removeAttr('class');
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
                    data: [65, 59, 80, 78],
                    spanGaps: false,
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