<?php
if (!defined('xDEC')) exit;
abstract class Pages implements Page
{
    function __head__($var)
    {
        ?><!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/html"><head><meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <base href="<?php
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestUri = explode('?', $requestUri);
    $requestStr = $requestUri[0];
    if(strcmp(substr($requestStr,0,strlen(DIR)), DIR) == 0)
        echo DIR.'/';
    else echo '/';
    ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="robots" content="index, follow">
    <meta name="distribution" content="web">
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script src="./content/js/jquery.js"></script>
    <script>
        if (!window.jQuery) {
            var s = document.createElement('script');
            s.src = "./content/js/jquery.js";
            document.getElementsByTagName('head')[0].appendChild(s);
        }
    </script>
    <script src="./content/js/plugins.jquery.js"></script>
    <?php
    }

    function __title__($var)
    {
        ?><title><?php
        echo SITE_NAME . $var . '</title>';
    }

    function __body__($var)
    {
        ?></head><body><?php
    }

    function end_body()
    {
        ?></body></html><?php
    }

    abstract function startOutput($var);
}