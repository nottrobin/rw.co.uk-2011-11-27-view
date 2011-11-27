window.ASLoader = {
    googleAnalytics: function(propertyId) {
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', propertyId]);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol
                ? 'https://ssl'
                : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    },
    googleFonts: function(fontsArray) {
        window.WebFontConfig = {
            google: { families: fontsArray }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    }
}

