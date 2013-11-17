<?php
/**
 * Developer: Rahul Kadyan
 * Date: 15/11/13
 * Time: 12:52 AM
 * Product: PhpStorm
 * Copyright (C) 2013 Rahul Kadyan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 */
if(!defined('xDEC')) exit;
class about extends Pages
{
    function __head__($var)
    {
        parent::__head__($var);
        require_once('text.snippet.css.php');
        require_once('landing.css.php');
        //require_once('banner.css.php');
        require_once('navigation.snippet.css.php');
        require_once('about.css.php');
//        require_once('animation.snippet.css.php');
//        require_once('landing.js.php');
    }

    function __title__($var)
    {
        parent::__title__(' | Home');
    }

    function __body__($var)
    {
        parent::__body__($var);
        //if (file_exists(dir(__FILE__)) . '/about.inc.php')
        require_once('about.inc.php');
    }

    function end_body()
    {
        parent::end_body();
    }

    function startOutput($var)
    {
        $this->__head__('');
        $this->__title__('');
        $this->__body__('');
        $this->end_body();
    }
}

set(PAGE_OBJECT, new about());