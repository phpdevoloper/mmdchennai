$(document).ready(function () {

    function _getCookie(name) {
        var arg = name + "=";
        var alen = arg.length;
        var clen = document.cookie.length;
        var i = 0;
        while (i < clen) {
            var j = i + alen;
            if (document.cookie.substring(i, j) == arg) {
                return _getCookieVal(j);
            }
            i = document.cookie.indexOf(" ", i) + 1;
            if (i == 0) break;
        }
        return null;
    }

    function _setCookie(name, value, expires, path, domain, secure) {
        var vurl = true;
        if (path != "" && path != undefined) {
            vurl = validUrl(path);
        }
        if (jQuery.type(name) == "string" && vurl) {
            document.cookie =
                name +
                "=" +
                escape(value) +
                (expires ? "; expires=" + expires.toGMTString() : "") +
                (path ? "; path=" + path : "") +
                (domain ? "; domain=" + domain : "") +
                (secure ? "; secure" : "");
        }
    }

    function _getCookieVal(offset) {
        var endstr = document.cookie.indexOf(";", offset);
        if (endstr == -1) {
            endstr = document.cookie.length;
        }
        return unescape(document.cookie.substring(offset, endstr));
    }

    if (_getCookie("fontSize") != null) {
        var fontSize = _getCookie("fontSize");
        jQuery("body").css("font-size", fontSize + "px");
    }
    else {
        var fs = jQuery("body").css("font-size");
        var fontSize = fs;
        jQuery("body").css("font-size", fs);
    }

    $('.fontSizeEvent').on('fontSelected', function () {
        let fontSizeStatus = _getCookie("fontSizeStatus");

        if (fontSizeStatus == null) {
            fontSizeStatus = 'normal';

        }

        let label = $('.fontSizeEvent a[data-event-type="' + fontSizeStatus + '"]').attr('data-label');
        let dataSelected = $('.fontSizeEvent a[data-event-type="' + fontSizeStatus + '"]').attr('data-selected-text');


        $('.fontSizeEvent a[data-event-type="' + fontSizeStatus + '"')
            .attr('aria-label', label + ' - ' + dataSelected)
            .attr('title', label + ' - ' + dataSelected)
            .addClass('link-selected');

        $('.fontSizeEvent a[data-event-type="' + fontSizeStatus + '"').parent().siblings().each(function () {
            let label = $(this).find('a').attr('data-label');
            $(this).find('a').attr('aria-label', label).attr('title', label).removeClass('link-selected');
        })
    })

    $('.fontSizeEvent').trigger('fontSelected');

    $('.fontSizeEvent a').on('click', function (event) {
        event.stopPropagation();
        event.preventDefault();
        let fontEvent = $(this).attr('data-event-type');

        if (fontEvent == "increase") {
            if (parseInt(fontSize) < 18) {
                fontSize = parseInt(fontSize) + 2;
                _setCookie("fontSizeStatus", "increase");
            }
        } else if (fontEvent == "decrease") {
            if (parseInt(fontSize) > 10) {
                fontSize = parseInt(fontSize) - 2;
            }
            _setCookie("fontSizeStatus", "decrease");
        } else {
            fontSize = 15;
            _setCookie("fontSizeStatus", "normal");
        }

        $(this).addClass('link-selected').parent().siblings().find('a').removeClass('link-selected')
        _setCookie("fontSize", fontSize);
        console.log(fontSize);
        $("body").css("font-size", fontSize + "px");
        $('.fontSizeEvent').trigger('fontSelected');
    });
}); 