
<?php

// Include json template
require_once('jsontemplate.php');

// Templates and page data
$templatePath = 'jsontemplates';
$wrapperFile = 'wrapper.json.html';
$pagesData = array(
    'index'        => array(
        'file'  => 'index.json.html',
        'title' => 'Home',
    ),
    'academic'     => array(
        'file'  => 'academic.json.html',
        'title' => 'Academic',
    ),
    'controller'   => array(
        'file'  => 'controller.json.html',
        'title' => 'Controller',
    ),
    'me'           => array(
        'file'  => 'me.json.html',
        'title' => 'Me',
    ),
    'portfolio'    => array(
        'file'  => 'portfolio.json.html',
        'title' => 'Portfolio',
    ),
    'professional' => array(
        'file'  => 'professional.json.html',
        'title' => 'Professional',
    ),
    'technical' => array(
        'file'  => 'index.json.html',
        'title' => 'Technical',
    ),
    '404' => array(
        'file'       => 'error.json.html',
        'status'     => '404',
        'title'      => 'Page not found',
        'heading'    => 'Page not found',
        'paragraphs' => array(
            'Huh?',
            'We can\'t find that page'
        )
    )
);

// Get this page data
$page = empty($_GET['page']) ? 'index' : $_GET['page'];
if(!array_key_exists($page, $pagesData)) { $page = '404'; }
$pageData = $pagesData[$page];

// Create json templates
$contentTemplate = JsonTemplateModule::FromFile($templatePath . '/' . $pageData['file']);
$wrapperTemplate = JsonTemplateModule::FromFile($templatePath . '/' . $wrapperFile);

$pageData['content'] = $contentTemplate->expand($pageData);

// Expand out the wrapper
echo $wrapperTemplate->expand($pageData);

