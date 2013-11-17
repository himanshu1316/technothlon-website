<?php
/**
 * Developer: Rahul Kadyan
 * Date: 15/11/13
 * Time: 4:11 AM
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
<div id="main-navigation" class="animation-container large">
    <div id="nav-home" class="nav node" style="float: left"><img src="./content/images/technothlon.png"></div>
    <div id="nav-home" class="nav node">Home</div>
    <div id="nav-home" class="nav node">Home</div>
    <div id="nav-home" class="nav node">Home</div>
    <div id="nav-home" class="nav node">Home</div>
    <div id="nav-home" class="nav node">Home</div>
</div>
<script>
    $(document).ready(function () {

        var dist = ($('.parallax-2').height() - 32) | 0;
        if (-32 == dist) dist = 128;
        $(window).resize(function (e) {
            dist = screen.availHeight - 128;
        });
        document.addEventListener("touchmove", ScrollNav, false);
        document.addEventListener("scroll", ScrollNav, false);
        function ScrollNav() {
            var st = $(window).scrollTop(),
                $nav = $('#main-navigation');
            var ds = dist - st;
            if (ds >= 0 && ds <= 96) {
                $nav.css('height', (ds + 32) + 'px');
            } else if (ds < 0) {
                $nav.css('height', '32px');
            } else {
                $nav.css('height', '128px');
            }
        }
    });
</script>