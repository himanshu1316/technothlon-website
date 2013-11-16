// FitText
(function( $ ){

    $.fn.fitText = function( kompressor, options ) {
        var compressor = kompressor || 1,
            settings = $.extend({
                'minFontSize' : Number.NEGATIVE_INFINITY,
                'maxFontSize' : Number.POSITIVE_INFINITY
            }, options);
        return this.each(function(){
            var $this = $(this);
            var resizer = function () {
                $this.css('font-size', Math.max(Math.min($this.width() / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
            };
            resizer();
            $(window).on('resize.fittext orientationchange.fittext', resizer);

        });

    };

})( jQuery );
// Parallax Scroll
(function($){
    $.fn.parallax = function(options){
        var $$ = $(this);
        offset = $$.offset();
        var defaults = {
            "start": 0,
            "stop": offset.top + $$.height(),
            "coeff": 0.95
        };
        var opts = $.extend(defaults, options);
        return this.each(function(){
            $(window).bind('scroll', function() {
                windowTop = $(window).scrollTop();
                if((windowTop >= opts.start) && (windowTop <= opts.stop)) {
                    newCoord = windowTop * opts.coeff;
                    $$.css({
                        "background-position": "0 "+ newCoord + "px"
                    });
                }
            });
        });
    };
})(jQuery);