
jQuery(document).ready(function ($) {
    
    //Set the carousel options
    $('#quote-carousel').carousel({
        pause: true,
        interval: 4000,
    });
    // fancybox
    $(".fancybox").fancybox();
    //isotope
    if ($('.isotopeWrapper').length) {
        var $container = $('.isotopeWrapper');
        var $resize = $('.isotopeWrapper').attr('id');
        // initialize isotope
        $container.isotope({
            itemSelector: '.isotopeItem',
            resizable: false, // disable normal resizing
            masonry: {
                columnWidth: $container.width() / $resize
            }
        });
        $("a[href='#top']").click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });
        $('.navbar-inverse').on('click', 'li a', function () {
            $('.navbar-inverse .in').addClass('collapse').removeClass('in').css('height', '1px');
        });
        $('#filter a').click(function () {
            $('#filter a').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 1000,
                    easing: 'easeOutQuart',
                    queue: false
                }
            });
            return false;
        });
        $(window).smartresize(function () {
            $container.isotope({
                // update columnWidth to a percentage of container width
                masonry: {
                    columnWidth: $container.width() / $resize
                }
            });
        });
    }
});
String.prototype.toPersianDigit = function (a) {
    return this.replace(/\d+/g, function (digit) {
        var enDigitArr = [], peDigitArr = [];
        ENGprice=$('.new-price').text();
        for (var i = 0; i < digit.length; i++) {
            enDigitArr.push(digit.charCodeAt(i));
        }
        for (var j = 0; j < enDigitArr.length; j++) {
            peDigitArr.push(String.fromCharCode(enDigitArr[j] + ((!!a && a == true) ? 1584 : 1728)));
        }
        return peDigitArr.join('');
    });
};

function TraceNodes(Node) {

    if (Node.nodeType == 3)  //TextNode
        Node.nodeValue = Node.nodeValue.toPersianDigit();
    else
        for (var i = 0; i < Node.childNodes.length; i++)
            TraceNodes(Node.childNodes[i]);
}

TraceNodes(document);