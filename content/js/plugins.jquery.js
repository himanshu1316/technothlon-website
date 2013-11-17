// FitText
(function ($) {

    $.fn.fitText = function (kompressor, options) {
        var compressor = kompressor || 1,
            settings = $.extend({
                'minFontSize': Number.NEGATIVE_INFINITY,
                'maxFontSize': Number.POSITIVE_INFINITY
            }, options);
        return this.each(function () {
            var $this = $(this);
            var resizer = function () {
                $this.css('font-size', Math.max(Math.min($this.width() / (compressor * 10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
            };
            resizer();
            $(window).on('resize.fittext orientationchange.fittext', resizer);

        });

    };

})(jQuery);
// Parallax Scroll
(function ($) {
    $.fn.parallax = function (options) {
        var $$ = $(this);
        offset = $$.offset();
        var defaults = {
            "start": 0,
            "stop": offset.top + $$.height(),
            "coeff": 0.95
        };
        var opts = $.extend(defaults, options);
        return this.each(function () {
            $(window).bind('scroll', function () {
                windowTop = $(window).scrollTop();
                if ((windowTop >= opts.start) && (windowTop <= opts.stop)) {
                    newCoord = windowTop * opts.coeff;
                    $$.css({
                        "background-position": "0 " + newCoord + "px"
                    });
                }
            });
        });
    };
})(jQuery);
// Scroll To
(function ($) {
    var h = $.scrollTo = function (a, b, c) {
        $(window).scrollTo(a, b, c)
    };
    h.defaults = {axis: 'xy', duration: parseFloat($.fn.jquery) >= 1.3 ? 0 : 1, limit: true};
    h.window = function (a) {
        return $(window)._scrollable()
    };
    $.fn._scrollable = function () {
        return this.map(function () {
            var a = this, isWin = !a.nodeName || $.inArray(a.nodeName.toLowerCase(), ['iframe', '#document', 'html', 'body']) != -1;
            if (!isWin)return a;
            var b = (a.contentWindow || a).document || a.ownerDocument || a;
            return/webkit/i.test(navigator.userAgent) || b.compatMode == 'BackCompat' ? b.body : b.documentElement
        })
    };
    $.fn.scrollTo = function (e, f, g) {
        if (typeof f == 'object') {
            g = f;
            f = 0
        }
        if (typeof g == 'function')g = {onAfter: g};
        if (e == 'max')e = 9e9;
        g = $.extend({}, h.defaults, g);
        f = f || g.duration;
        g.queue = g.queue && g.axis.length > 1;
        if (g.queue)f /= 2;
        g.offset = both(g.offset);
        g.over = both(g.over);
        return this._scrollable().each(function () {
            if (e == null)return;
            var d = this, $elem = $(d), targ = e, toff, attr = {}, win = $elem.is('html,body');
            switch (typeof targ) {
                case'number':
                case'string':
                    if (/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)) {
                        targ = both(targ);
                        break
                    }
                    targ = $(targ, this);
                    if (!targ.length)return;
                case'object':
                    if (targ.is || targ.style)toff = (targ = $(targ)).offset()
            }
            $.each(g.axis.split(''), function (i, a) {
                var b = a == 'x' ? 'Left' : 'Top', pos = b.toLowerCase(), key = 'scroll' + b, old = d[key], max = h.max(d, a);
                if (toff) {
                    attr[key] = toff[pos] + (win ? 0 : old - $elem.offset()[pos]);
                    if (g.margin) {
                        attr[key] -= parseInt(targ.css('margin' + b)) || 0;
                        attr[key] -= parseInt(targ.css('border' + b + 'Width')) || 0
                    }
                    attr[key] += g.offset[pos] || 0;
                    if (g.over[pos])attr[key] += targ[a == 'x' ? 'width' : 'height']() * g.over[pos]
                } else {
                    var c = targ[pos];
                    attr[key] = c.slice && c.slice(-1) == '%' ? parseFloat(c) / 100 * max : c
                }
                if (g.limit && /^\d+$/.test(attr[key]))attr[key] = attr[key] <= 0 ? 0 : Math.min(attr[key], max);
                if (!i && g.queue) {
                    if (old != attr[key])animate(g.onAfterFirst);
                    delete attr[key]
                }
            });
            animate(g.onAfter);
            function animate(a) {
                $elem.animate(attr, f, g.easing, a && function () {
                    a.call(this, targ, g)
                })
            }
        }).end()
    };
    h.max = function (a, b) {
        var c = b == 'x' ? 'Width' : 'Height', scroll = 'scroll' + c;
        if (!$(a).is('html,body'))return a[scroll] - $(a)[c.toLowerCase()]();
        var d = 'client' + c, html = a.ownerDocument.documentElement, body = a.ownerDocument.body;
        return Math.max(html[scroll], body[scroll]) - Math.min(html[d], body[d])
    };
    function both(a) {
        return typeof a == 'object' ? a : {top: a, left: a}
    }
})(jQuery);
// Smooth Scroll
(function(t){function e(t){return t.replace(/(:|\.)/g,"\\$1")}var l="1.4.13",o={},s={exclude:[],excludeWithin:[],offset:0,direction:"top",scrollElement:null,scrollTarget:null,beforeScroll:function(){},afterScroll:function(){},easing:"swing",speed:400,autoCoefficent:2,preventDefault:!0},n=function(e){var l=[],o=!1,s=e.dir&&"left"==e.dir?"scrollLeft":"scrollTop";return this.each(function(){if(this!=document&&this!=window){var e=t(this);e[s]()>0?l.push(this):(e[s](1),o=e[s]()>0,o&&l.push(this),e[s](0))}}),l.length||this.each(function(){"BODY"===this.nodeName&&(l=[this])}),"first"===e.el&&l.length>1&&(l=[l[0]]),l};t.fn.extend({scrollable:function(t){var e=n.call(this,{dir:t});return this.pushStack(e)},firstScrollable:function(t){var e=n.call(this,{el:"first",dir:t});return this.pushStack(e)},smoothScroll:function(l,o){if(l=l||{},"options"===l)return o?this.each(function(){var e=t(this),l=t.extend(e.data("ssOpts")||{},o);t(this).data("ssOpts",l)}):this.first().data("ssOpts");var s=t.extend({},t.fn.smoothScroll.defaults,l),n=t.smoothScroll.filterPath(location.pathname);return this.unbind("click.smoothscroll").bind("click.smoothscroll",function(l){var o=this,r=t(this),i=t.extend({},s,r.data("ssOpts")||{}),c=s.exclude,a=i.excludeWithin,f=0,h=0,u=!0,d={},p=location.hostname===o.hostname||!o.hostname,m=i.scrollTarget||(t.smoothScroll.filterPath(o.pathname)||n)===n,S=e(o.hash);if(i.scrollTarget||p&&m&&S){for(;u&&c.length>f;)r.is(e(c[f++]))&&(u=!1);for(;u&&a.length>h;)r.closest(a[h++]).length&&(u=!1)}else u=!1;u&&(i.preventDefault&&l.preventDefault(),t.extend(d,i,{scrollTarget:i.scrollTarget||S,link:o}),t.smoothScroll(d))}),this}}),t.smoothScroll=function(e,l){if("options"===e&&"object"==typeof l)return t.extend(o,l);var s,n,r,i,c=0,a="offset",f="scrollTop",h={},u={};"number"==typeof e?(s=t.extend({link:null},t.fn.smoothScroll.defaults,o),r=e):(s=t.extend({link:null},t.fn.smoothScroll.defaults,e||{},o),s.scrollElement&&(a="position","static"==s.scrollElement.css("position")&&s.scrollElement.css("position","relative"))),f="left"==s.direction?"scrollLeft":f,s.scrollElement?(n=s.scrollElement,/^(?:HTML|BODY)$/.test(n[0].nodeName)||(c=n[f]())):n=t("html, body").firstScrollable(s.direction),s.beforeScroll.call(n,s),r="number"==typeof e?e:l||t(s.scrollTarget)[a]()&&t(s.scrollTarget)[a]()[s.direction]||0,h[f]=r+c+s.offset,i=s.speed,"auto"===i&&(i=h[f]||n.scrollTop(),i/=s.autoCoefficent),u={duration:i,easing:s.easing,complete:function(){s.afterScroll.call(s.link,s)}},s.step&&(u.step=s.step),n.length?n.stop().animate(h,u):s.afterScroll.call(s.link,s)},t.smoothScroll.version=l,t.smoothScroll.filterPath=function(t){return t.replace(/^\//,"").replace(/(?:index|default).[a-zA-Z]{3,4}$/,"").replace(/\/$/,"")},t.fn.smoothScroll.defaults=s})(jQuery);
// Mouse Wheel
(function(e){if(typeof define==="function"&&define.amd){define(["jquery"],e)}else if(typeof exports==="object"){module.exports=e}else{e(jQuery)}})(function(e){function u(t){var n=t||window.event,o=r.call(arguments,1),u=0,f=0,l=0,c=0;t=e.event.fix(n);t.type="mousewheel";if("detail"in n){l=n.detail*-1}if("wheelDelta"in n){l=n.wheelDelta}if("wheelDeltaY"in n){l=n.wheelDeltaY}if("wheelDeltaX"in n){f=n.wheelDeltaX*-1}if("axis"in n&&n.axis===n.HORIZONTAL_AXIS){f=l*-1;l=0}u=l===0?f:l;if("deltaY"in n){l=n.deltaY*-1;u=l}if("deltaX"in n){f=n.deltaX;if(l===0){u=f*-1}}if(l===0&&f===0){return}c=Math.max(Math.abs(l),Math.abs(f));if(!s||c<s){s=c}u=Math[u>=1?"floor":"ceil"](u/s);f=Math[f>=1?"floor":"ceil"](f/s);l=Math[l>=1?"floor":"ceil"](l/s);t.deltaX=f;t.deltaY=l;t.deltaFactor=s;o.unshift(t,u,f,l);if(i){clearTimeout(i)}i=setTimeout(a,200);return(e.event.dispatch||e.event.handle).apply(this,o)}function a(){s=null}var t=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],n="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],r=Array.prototype.slice,i,s;if(e.event.fixHooks){for(var o=t.length;o;){e.event.fixHooks[t[--o]]=e.event.mouseHooks}}e.event.special.mousewheel={version:"3.1.6",setup:function(){if(this.addEventListener){for(var e=n.length;e;){this.addEventListener(n[--e],u,false)}}else{this.onmousewheel=u}},teardown:function(){if(this.removeEventListener){for(var e=n.length;e;){this.removeEventListener(n[--e],u,false)}}else{this.onmousewheel=null}}};e.fn.extend({mousewheel:function(e){return e?this.bind("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}})});
// Smooth Scroll To
$(document).ready(function () {
    var $root = $('html, body');
    $('a').click(function () {
        var href = $.attr(this, 'href');
        if(!/^#.*$/.exec(href)) return true;
        $root.animate({
            scrollTop: $(href).offset().top - 75
        }, 500, function () {
//            window.location.hash = href;
        });
        return false;
    });
});
