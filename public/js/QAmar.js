/**
 * Created by RshNk on 8/11/2016.
 */
//Quiz page
/*---------progress bar loader---------*/
$('.container').ready(function(){
    $('.prog-answer').text($(':radio:checked').length);
    $('.prog-total').text($('.question-box').length);
    var per=($(':radio:checked').length/$('.question-box').length*100).toFixed(2);
    $('.progress-bar').attr({
        "aria-valuemin":"0",
        "aria-valuemax":$('.prog-total').text(),
        "style":'width:'+per+'%'
    });
    $('.progress-bar').text(per+'%');

    /*----set difficulty picture in question and solution page----*/
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
});
$('.container').on('click',function(){
   if($('.prog-answer').text()!= $(':radio:checked').length)
   {
       $('.prog-answer').text($(':radio:checked').length);
       var per=($(':radio:checked').length/$('.question-box').length*100).toFixed(2);
       $('.progress-bar').attr({
           "aria-valuemin":"0",
           "aria-valuemax":$('.prog-total').text(),
           "style":'width:'+per+'%'
       });
       $('.progress-bar').text(per+'%');
   }
});
/*-----------answer clear button in Question page-------------*/
function refresh(Qname){
    $(':radio[name='+Qname+']').prop('checked', false);
}

