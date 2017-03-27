var footerHeight = 0,
    footerTop = 0;

function positionFooter(footer) {
    footerHeight = footer.height();
    footerTop = ($(window).scrollTop() + $(window).height() - footerHeight) + "px";

    if (($(document.body).height() + footerHeight) < $(window).height()) {
        footer.css({
            position: "absolute"
        }).animate({
            top: footerTop
        })
    } else {
        footer.css({
            position: "static"
        })
    }
}

positionFooter($('footer'));
