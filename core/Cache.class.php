<?php
if(!defined('xDEC')) exit;
class Cache {
    function inCache($url) {
        return false;
    }
    function get($url) {
        return '';
    }
    function _echo() {

    }
}

class FileCache {

}