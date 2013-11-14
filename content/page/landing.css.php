<?php
/**
 * Developer: Rahul Kadyan
 * Date: 15/11/13
 * Time: 2:32 AM
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
?>
<link rel="stylesheet" type="text/css" href="/content/css/sprite/landing.css"/>
<style type="text/css">
    html, body{
        width: 100%;
        min-height: 100%;
    }
    body{
        background: url(/content/images/texture2.png);
    }
    img{
        max-width: 100%;
    }
    .hidden{
        display: none;
    }
    /* Landing animation
    */
    #logo-head {
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -110px 0 0 -405px;
    }
    .logo-head{
        animation-duration: 2s;
        animation-name: logoHeadAnimation;
        -webkit-animation-duration: 2s;
        -webkit-animation-name: logoHeadAnimation;
        -moz-animation-duration: 2s;
        -moz-animation-name: logoHeadAnimation;
    }
    #logo-text{
        position: absolute;
        left: 50%;
        top: 50%;
        margin: 0 0 0 -409px;
    }
    .logo-text{
        animation-duration: 2s;
        animation-name: logoTextAnimation;
        -webkit-animation-duration: 2s;
        -webkit-animation-name: logoTextAnimation;
        -moz-animation-duration: 2s;
        -moz-animation-name: logoTextAnimation;
    }
    #logo-tag{
        position: absolute;
        right: 50%;
        top: 50%;
        margin: 60px -401px 0 0;
    }
    .logo-tag{
        animation-duration: 2s;
        animation-name: logoTagAnimation;
        -webkit-animation-duration: 2s;
        -webkit-animation-name: logoTagAnimation;
        -moz-animation-duration: 2s;
        -moz-animation-name: logoTagAnimation;
    }
    @keyframes "logoTagAnimation" {
        from {
            right: 450px;
        }
        to {
            right: 50%;
        }

    }

    @-moz-keyframes logoTagAnimation {
        from {
            right: 450px;
        }
        to {
            right: 50%;
        }

    }

    @-webkit-keyframes "logoTagAnimation" {
        from {
            right: -450px;
        }
        to {
            right: 50%;
        }

    }

    @-ms-keyframes "logoTagAnimation" {
        from {
            right: 450px;
        }
        to {
            right: 50%;
        }

    }

    @-o-keyframes "logoTagAnimation" {
        from {
            right: 450px;
        }
        to {
            right: 50%;
        }

    }
    @keyframes "logoTextAnimation" {
        from {
            left: -850px;
        }
        to {
            left: 50%;
        }

    }

    @-moz-keyframes logoTextAnimation {
        from {
            left: -850px;
        }
        to {
            left: 50%;
        }

    }

    @-webkit-keyframes "logoTextAnimation" {
        from {
            left: -850px;
        }
        to {
            left: 50%;
        }

    }

    @-ms-keyframes "logoTextAnimation" {
        from {
            left: -850px;
        }
        to {
            left: 50%;
        }

    }

    @-o-keyframes "logoTextAnimation" {
        from {
            left: -850px;
        }
        to {
            left: 50%;
        }

    }
    @keyframes "logoHeadAnimation" {
        from {
            top: -150px;
        }
        to {
            top: 50%;
        }

    }

    @-moz-keyframes logoHeadAnimation {
        from {
            top: -150px;
        }
        to {
            top: 50%;
        }

    }

    @-webkit-keyframes "logoHeadAnimation" {
        from {
            top: -150px;
        }
        to {
            top: 50%;
        }

    }

    @-ms-keyframes "logoHeadAnimation" {
        from {
            top: -150px;
        }
        to {
            top: 50%;
        }

    }

    @-o-keyframes "logoHeadAnimation" {
        from {
            top: -150px;
        }
        to {
            top: 50%;
        }

    }

</style>