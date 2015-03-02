//·À¸´ÖÆ
function notRight(){
 document.onselectstart=new Function("event.returnValue=false;");
}
//·µ»Ø¶¥²¿
function backtop(){
    var backtop = $("<a class='backTop'></a>")
    $("body").append(backtop);
      
    var fn = function(){
    $('html,body').animate({
        scrollTop: '0px'
        }, 200);
        return false;
    }
    $('.backTop').bind('click',fn);
      
    $(window).scroll(function () {
        var scrollt = $(window).scrollTop();
        if ( scrollt > 100 ){
            $(".backTop").fadeIn("slow");
        } else {
            $(".backTop").fadeOut("slow");
        }
    });
}
