<!DOCTYPE html>

<html lang="en">
  <html>
    <title>robinwinslow - web developer</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/layout.css" />
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script>
      /* Config options */
      var WebFontConfig = { google: { families: ['Open Sans', 'IM Fell DW Pica'] } }; // Webfonts
      var _gaq = [ ['_setAccount', 'UA-2993676-1'], ['_trackPageview'] ]; // Google Analytics
    </script>
    <!-- load jQuery and Webfonts from Google -->
    <script src="//www.google.com/jsapi?autoload=%7b%22modules%22%3a%5b%7b%22name%22%3a%22jquery%22%2c%22version%22%3a%221.6.2%22%7d%2c%7b%22name%22%3a%22webfont%22%2c%22version%22%3a%221.0.22%22%7d%5d%7d&key=ABQIAAAAYNwz9AGnDUkvoVXdGY1E_BQo9Cph14ZnKdwZJhw6y-dSmkhWihQXC8_m3NiG5b3rggE8bkE9Kz8IIg"></script>
    <script>
      // Setup jQuery
      var jQ = jQuery.noConflict();
      // Load Google Analytics
      jQ.ajax({url: '//www.google-analytics.com/ga.js', dataType: 'script'});
      // Load Syntax Highlighter
      jQ('body').append('<link rel="stylesheet" href="//alexgorbatchev.com/pub/sh/current/styles/shCore.css" />');
      jQ('body').append('<link rel="stylesheet" href="//alexgorbatchev.com/pub/sh/current/styles/shThemeDefault.css" />');
      jQ.ajax({url: '//alexgorbatchev.com.s3.amazonaws.com/pub/sh/3.0.83/scripts/shCore.js', dataType: 'script', success: loadAutoloader});
      function loadAutoloader() {
        jQ.ajax({url: '//alexgorbatchev.com.s3.amazonaws.com/pub/sh/3.0.83/scripts/shAutoloader.js', dataType: 'script', success: loadSyntax});
      };
      function loadSyntax() {
        SyntaxHighlighter.autoloader('js //alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js');
        SyntaxHighlighter.all();
      }
    </script>
  </html>
  
  <body>
    <div class="main">
      <div class="top">
        <div class="squeeze">
          <nav>
            <ul class="horizontal-list sparse-list">
              <li class="<?= ($page == 'index')        ? 'current' : '' ?>"><a href="/">home</a></li>
              <li class="<?= ($page == 'me')           ? 'current' : '' ?>"><a href="/me">about me</a></li>
              <li class="<?= ($page == 'academic')     ? 'current' : '' ?>"><a href="/academic">qualifications</a></li>
              <li class="<?= ($page == 'professional') ? 'current' : '' ?>"><a href="/professional">experience</a></li>
              <li class="<?= ($page == 'technical')    ? 'current' : '' ?>"><a href="/technical">skills</a></li>
              <li class="<?= ($page == 'portfolio')    ? 'current' : '' ?>"><a href="/portfolio">portfolio</a></li>
            </ul>
          </nav>
          <header>
            <h1>robin winslow</h1>
          </header>
        </div>
      </div>
      
      <!--[if lt IE 9]>
      <div class="alert squeeze">
        <p>
          <strong>This page may look weird</strong> in your <a href="http://en.wikipedia.org/wiki/Web_browser">browser</a>. If you would like to view it properly, please consider upgrading to one of the following browsers:
        </p>
      </div>
      <p class="squeeze browsers">
          <a href="http://www.google.com/chrome"><img height="50" src="http://www.google.com/intl/en/images/logos/chrome_logo.gif" alt="Get Google Chrome"/></a>
          <a href='http://www.mozilla.org/firefox?WT.mc_id=aff_en07&WT.mc_ev=click'><img height="50" src='http://www.mozilla.org/contribute/buttons/110x32bubble_r.png' alt='Firefox Download Button' border='0' /></a>
          <a href="http://windows.microsoft.com/en-GB/internet-explorer/products/ie/home"><img src="http://www.microsoft.com/nz/presscentre/images/ie9pr.jpg" height="50" alt="Get Internet Explorer 9" /></a>
          <a href="http://www.apple.com/safari/"><img src="http://images.apple.com/quicktime/download/images/download-other-safari-20100730.jpg" height="50" alt="Get Safari" /></a>
          <a href="http://www.opera.com/"><img src="http://files.myopera.com/EspenAO/files/dl-10beta.jpg" height="50" alt="Get Opera"  /></a>
      </p>
      <![endif]-->

      <div class="squeeze push">
        <div class="centralContent">
          <article>
            <?php include('pages/' . $page . '.php'); ?>
          </article>
        </div>
        
        <div class="sideContent">
          <aside>
            <section id="download">
              <h1>Download CV</h1>
              <p><a href="http://dl.dropbox.com/u/15286263/RobinWinslowMorris.pdf">PDF format</a></p>
              <p><a href="http://dl.dropbox.com/u/15286263/RobinWinslowMorris.rtf">Rich Text Format</a></p>
            </section>
            <section id="contact">
              <h1>Contact me</h1>
              <p>
                <strong>Email</strong><br>
                <a href="mailto:robin@robinwinslow.co.uk">robin@robinwinslow.co.uk</a>
              </p>
              <p>
                <strong>Mobile</strong><br>
                <a href="tel:07795070704">07795070704</a>
              </p>
              <p>
                <a href="http://uk.linkedin.com/in/robinwinslow"><img src="/images/linkedinlogo-60.png" alt="LinkedIn profile"></a>
                <a href="http://twitter.com/nottRobin"><img src="/images/twitterlogo-60.png" alt="Twitter feed"></a>
                <a href="http://www.facebook.com/robinwinslowmorris"><img src="/images/facebooklogo-60.png" alt="Facebook page"></a>
              </p>
            </section>
          </aside>
        </div>
      </div>
    </div>
    
    <div class="bottom">
      <div class="squeeze">
        <footer>
          <p>&copy; Copyright Robin Winslow Morris 2010.</p>
        </footer>
      </div>
    </div>
  </body>
</html>


