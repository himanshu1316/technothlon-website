<?php
/**
 * Developer: Rahul Kadyan
 * Date: 16/11/13
 * Time: 2:28 AM
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
if (!defined('xDEC')) exit; ?>
<style type="text/css">
    html, body{
        width: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
        font-size: 14px;
        line-height: 160%;
        color: #3F1014;
    }
    h1{
        color: #203669;
    }
    a, a:active, a:hover, a:visited{
        display: inline-block;
        text-decoration: none;
        color: inherit;
    }
    a, a:active{
        border-bottom: 1px dotted;
    }
    a:hover{
        border-bottom: 1px solid;
    }
    body{
        background: url(./content/images/texture2.png);
    }
    img{
        max-width: 100%;
    }
    article, div.article {
        max-width: 80%;
        display: block;
        margin: 2rem auto;
        font-family: helvetica, sans-serif;
        font-size: 1.2rem;
    }
    .no-overflow{
        overflow: hidden;
    }
    .container {
        width: 100%;
        margin: 0;
        padding: 0;
        top: 0;
    }
    .extra-large {
        font-size: 4rem;
        font-family: helvetica, sans-serif;
    }
    .thin{
        font-weight: 100;
    }
    .thin-shadow-up{
        box-shadow: 0 -1px 1px rgba(0, 0, 0, 0.2);
    }
    .thin-shadow-down{
        box-shadow: 0 1px 1px rgba(255, 255, 255, 0.2);
    }
    .relate{
        position: relative;
        top: 0;
        left: 0;
    }
    .match-parent{
        width: 100%;
        height: 100%;
    }
    .center{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
    }

    @media (min-width: 799px) {
        .two-col{
            column-count: 2;
            column-gap: 2rem;
            -webkit-column-count: 2;
            -webkit-column-gap: 2rem;
            -moz-column-count: 2;
            -moz-column-gap: 2rem;
            -ms-column-count: 2;
            -ms-column-gap: 2rem;
            -o-column-count: 2;
            -o-column-gap: 2rem;
        }
    }

    .t-justify{
        text-align: justify;
    }
</style>