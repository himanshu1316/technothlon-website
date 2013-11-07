<?php
if(!defined('xDEC')) exit;
class Cookie {
    public function setCookie($key, $value, $time = 604800, $path = '/', $httpOnly = true){
        setcookie($key, $value, time()+$time, $path, URL_STATIC, $httpOnly);
    }

    public function setSecureCookie($key, $value, $time = 604800, $path = '/', $httpOnly = true){
        setcookie($key, saltSHA1SecretCreate($value), time()+$time, $path, URL_STATIC, $httpOnly);
    }

    public function removeCookie($key){
        setcookie($key, null, time()-604800, null, null, true);
    }
}