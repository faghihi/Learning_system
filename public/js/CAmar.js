/**
 * Created by RshNk on 8/17/2016.
 */
//Correction page
/*-------correct or uncorrect answer picture set--------*/
$('.solution').ready(function() {
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
    activityBox();

});
/*--------activity box data---------*/
function activityBox(){
    var answer=$('.correct-answer').length;
    var cAnswer=$(".NC-tag:contains('C')").length;
    var stuPoint=0,totalPoint=0;
    $('.question-box img').each(function(){
        if ($(this).attr('title') == 'ساده')
        {
            totalPoint+=1;
            ($(this).siblings('.NC-tag').text()=='C'?stuPoint+=1:0);
        }
        else if($(this).attr('title') == 'متوسط')
        {
            totalPoint+=2;
            ($(this).siblings('.NC-tag').text()=='C'?stuPoint+=2:0);
        }
        else if($(this).attr('title') =='سخت')
        {
            totalPoint+=3;
            ($(this).siblings('.NC-tag').text()=='C'?stuPoint+=3:0);
        }
    });
    $('.activity p:eq(1) span:eq(0)').text(cAnswer);
    $('.activity p:eq(1) span:eq(1)').text(answer);
    $('.activity p:eq(2) span:eq(0)').text(stuPoint);
    $('.activity p:eq(2) span:eq(1)').text(totalPoint);
    //fill progress bar
    var per=(stuPoint/totalPoint*100).toFixed(2);
    $('.progress-bar').attr({
        "aria-valuemin":"0",
        "aria-valuemax":totalPoint,
        "style":'width:'+per+'%'
    });
    $('.progress-bar').text(per+'%');
    difficultyMode(per);
}
function difficultyMode(per){
    if(per>66)
    {
        $('.activity .progress-bar').addClass("progress-bar-info");
        $('.activity img:eq(0)').attr('src',"images/emoticon/64perfect.png");
        $('.activity p:eq(0) span:eq(0)').css('display','inherit');
    }
    else if(per > 33)
    {
        $('.activity .progress-bar').addClass("progress-bar-warning");
        $('.activity img:eq(0)').attr('src',"images/emoticon/64noproblem.png");
        $('.activity p:eq(0) span:eq(1)').css('display','inherit');
    }
    else
    {
        $('.activity .progress-bar').addClass("progress-bar-danger");
        $('.activity img:eq(0)').attr('src',"images/emoticon/64beginner.png");
        $('.activity p:eq(0) span:eq(2)').css('display','inherit');
    }
}
