<?php
if (!defined('xDEC')) exit;
abstract class Pages implements Page
{
    function __head__($var)
    {
        // TODO: include js libraries and extensions
        ?><!DOCTYPE HTML><html lang="en"><head><?php
    }

    function __title__($var)
    {
        ?><title><?php
        echo SITE_NAME . $var . '</title>';
    }

    function __body__($var)
    {
        ?></head><body><?php
        // TODO: include html for extensions
    }

    function end_body()
    {
        ?></body></html><?php
    }

    abstract function startOutput($var);
}