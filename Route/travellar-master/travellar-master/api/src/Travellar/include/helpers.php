<?php

use Travellar\Service\ConfigurationService;

function trace($data, $formatted = true) {
    if($formatted) echo '<pre class="traced-data">';
    var_dump($data);
    if($formatted) echo '</pre>';
}

function silectLog($data) {
    ob_start();

    echo "\n- - - - - BEGIN ERROR - - - - -\n";

    trace($data, false);

    echo "- - - - - END ERROR - - - - -\n\n";

    $content = ob_get_clean();
    error_log($content);
}

function logAndDisplayErrorPage($data) {
    silectLog($data);
    require_once('view/static/fatal-error.html');
}

function displayError($data) {
    var_dump($data);
}

function globalErrorHandler($errno, $errstr, $errfile, $errline, $errcontext) {
    $data = array(
       'errno' => $errno,
        'errstr' => $errstr,
        'errfile' => $errfile,
        'errline' => $errline,
        'errcontext' => $errcontext
    );

    if(ConfigurationService::PRODUCTION)
        logAndDisplayErrorPage($data);
    else
        displayError($data);

    exit();
}

function globalExceptionHandler($e) {
    if(ConfigurationService::PRODUCTION)
        logAndDisplayErrorPage($e);
    else
        displayError($e);

    exit();
}

set_error_handler('globalErrorHandler');
set_exception_handler('globalExceptionHandler');