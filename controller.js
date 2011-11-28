/**
 * Main content controller for node.robinwinslow.co.uk
 * This is a node version of the PHP site robinwinslow.co.uk
 * The idea is that it uses the same json-templates
 * @author Robin Winslow Morris
 * @date 2011-11-23
 */

/* Private variables
 */
    
var // Modules
    fs           = require('fs'),
    jsonTemplate = require('./jsontemplate.js'),
    url          = require('url'),
    // File locations
    siteDir      = '/var/www/robinwinslow.co.uk',
    templateDir  = 'jsontemplates',
    wrapperFile  = 'wrapper.json.html',
    // Site data
    pagesData = {
        'index'       : { 'title': 'Home',         'file' :'index.json.html',        },
        'academic'    : { 'title': 'Academic',     'file' :'academic.json.html',     },
        'controller'  : { 'title': 'Controller',   'file' :'controller.json.html',   },
        'me'          : { 'title': 'Me',           'file' :'me.json.html',           },
        'portfolio'   : { 'title': 'Portfolio',    'file' :'portfolio.json.html',    },
        'professional': { 'title': 'Professional', 'file' :'professional.json.html', },
        'technical'   : { 'title': 'Technical',    'file' :'technical.json.html',    },
        '404'         : {
            'title'     : 'Page not found',
            'file'      :'error.json.html',
            'status'    :'404',
            'heading'   :'Page not found',
            'paragraphs': [ 'Huh?', 'We can\'t find that page' ]
        }
    };
// End of private variables

/* Private methods
 **/

/* Process the content of a view
 * - Usually called after retrieving the data from a file
 * @param string data A json-template string
 * @param object request The request object passed from node.http
 * @param object response The response object for node
 **/
function processContent(data, request, response) {
    // Create template object for main content
    var contentTemplate = jsonTemplate.fromString(data);
    // Now expand the content template with the data
    pageData.content = contentTemplate.expand(pageData);
    

    // Now read the wrapper file
    // So we can pass the content into the wrapper
    fs.readFile(
        siteDir + '/' + templateDir + '/' + wrapperFile,
        'ascii',
        function(err, data) {
            // If no error, process wrapper
            if(err) { console.warn(err); }
            else { processWrapper(data, request, response); }
        }
    )
}

/* Process the content of the wrapper
 * - Usually called by processContent, to wrap the contents.
 * @param string data A json-template string
 * @param object request The request object passed from node.http
 * @param object response The response object for node
 **/
function processWrapper(data, request, response) {
    var wrapperTemplate = jsonTemplate.fromString(data);

    // Output the wrapper template
    response.end(wrapperTemplate.expand(pageData));
}

module.exports = {
    /* Exported (global) properties
     **/

    // none yet
    
    /* Exported (global) methods
     **/

    // Effectively the "main" method
    // - Gets run directly by the server
    process: function(request, response) {
        // Work out what mime type we have
        var urlParts = url.parse(request.url, true);
        var path = urlParts.pathname;
        
        extensionMatch = path.match(/\.([^.]+)$/);

        // Not raw file type, serve as HTML
        response.writeHead(200, {'Content-Type': 'text/html'});

        // Serve 404 by default
        var page = '404';

        // Get the actual requested page from the URl string
        if(
            typeof(urlParts.query) == 'object'
            && typeof(urlParts.query.page) == 'string'
        ) {
            // If page param is empty, set it to "index". Otherwise, pass it through
            page =  urlParts.query.page == '' ? 'index' : urlParts.query.page;
        }

        pageData = pagesData[page];
        
        // Read the content template file
        fs.readFile(
            siteDir + '/' + templateDir + '/' + pageData.file,
            'ascii',
            function(err, data) {
                // Check for error, otherwise process content
                if(err) {console.warn('yomum', err); }
                else { processContent(data, request, response); }
            }
        );
    }
};

