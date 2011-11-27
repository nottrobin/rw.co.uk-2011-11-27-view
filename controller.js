/**
 * Main content controller for node.robinwinslow.co.uk
 * This is a node version of the PHP site robinwinslow.co.uk
 * The idea is that it uses the same json-templates
 * @author Robin Winslow Morris
 * @date 2011-11-23
 */

/* Include modules
 */
var fs           = require('fs'),
    jsonTemplate = require('./json-template.js'),
    url          = require('url');

/* Setup file locations
 */
var siteDir      = '/var/www/robinwinslow.co.uk',
    templateDir  = 'jsontemplates',
    wrapperFile  = 'wrapper.json.html';

/* Data for pages
 */
var pagesData = {
    'index': {
        'file' :'index.json.html',
        'title':'Home',
    },
    'academic': {
        'file' :'academic.json.html',
        'title':'Academic',
    },
    'controller': {
        'file' :'controller.json.html',
        'title':'Controller',
    },
    'me': {
        'file' :'me.json.html',
        'title':'Me',
    },
    'portfolio': {
        'file' :'portfolio.json.html',
        'title':'Portfolio',
    },
    'professional': {
        'file' :'professional.json.html',
        'title':'Professional',
    },
    'technical': {
        'file' :'index.json.html',
        'title':'Technical',
    },
    '404': {
        'file'      :'error.json.html',
        'status'    :'404',
        'title'     :'Page not found',
        'heading'   :'Page not found',
        'paragraphs': [
            'Huh?',
            'We can\'t find that page'
        ]
    }
};

var extensionTypeMapping = {
    'css' : 'text/css',
    'js'  : 'text/javascript',
    'jpg' : 'image/jpeg',
    'jpeg': 'image/jpeg',
    'gif' : 'image/gif',
    'png' : 'image/png'
};

// Process the content to serve
exports.process = function(request, response) {
    console.log('robinwinslow.process');

    // Work out what mime type we have
    var urlParts = url.parse(request.url, true);
    var path = urlParts.pathname;
    
    extensionMatch = path.match(/\.([^.]+)$/);

    // Get content type
    if(
        extensionMatch != null
        && typeof(extensionMatch) == 'object'
        && 'length' in extensionMatch
        && extensionMatch.length > 1
        && extensionMatch[1] in extensionTypeMapping
    ) {
        // Raw file type, serve it directly
        response.writeHead(200, {'Content-Type': extensionTypeMapping[extensionMatch[1]]});

        fs.readFile(
            siteDir + '/' + path,
            function(err, data) {
                // Check for error, otherwise process content
                if(err) { throw("err"); }
                else { response.write(data); }
            }
        );
    } else {
        // Not raw file type, serve as HTML
        response.writeHead(200, {'Content-Type': 'text/html'});

        // Default page
        var page = 'index';

        // Get the actual requested page from the URl string
        if(
            typeof(urlParts.query) == 'object'
            && typeof(urlParts.query.page) == 'string'
            && urlParts.query.page.length > 0
        ) {
            page = urlParts.query.page;
        }

        // If we can't find the requested page,
        // serve 404 instead
        if(typeof(pagesData[page]) != 'object') {
            page = '404'
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
}

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

function processWrapper(data, request, response) {
    var wrapperTemplate = jsonTemplate.fromString(data);

    // Output the wrapper template
    response.end(wrapperTemplate.expand(pageData));
}

