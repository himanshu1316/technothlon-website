<?php
/**
 * Developer: Rahul Kadyan
 * Date: 15/11/13
 * Time: 4:19 AM
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
 */ if(!defined('xDEC')) exit; ?>
<style type="text/css">
    .nav{

    }
    .node{
        display: inline-block;
        margin: 0 8px;
        font-size: 16px;
        font-family: helvetica, sans-serif;
        color: #fff;
        height: 100%;
    }
    .node *{
        max-height: 100%;
    }
    #main-navigation{
        overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        text-align: center;
        background: #003442;
    }
    div#main-navigation.large{
        height: 128px;
    }
    div#main-navigation.small{
        height: 32px;
    }
</style>