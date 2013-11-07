<?php
/**
 * Developer: Rahul Kadyan
 * Date: 29/10/13
 * Time: 4:01 PM
 * Product: JetBrains PhpStorm
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
?>
<!doctype html>
<html>
<head>
    <title>Technothlon 2014</title>
    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-size: 16px;
            font-family: helvetica, sans-serif;
            overflow: hidden;
        }

        @media all and (max-width: 360px) {
            html, body {
                font-size: 10px;
            }
        }

        html {
            background: url("tv-noise.gif");
        }

        body {
            background: #fff;
            opacity: 0.6;
        }

        div.page {
            width: 100%;
        }

        div.countdown {
            width: 100%;
            position: fixed;
            bottom: 0;
            background: transparent;
        }

        div.cd-container {
            height: 100%;
            width: 24%;
            display: inline-block;
            text-align: center;
        }

        div.cd-container div {
            display: inline-block;
            font-weight: 200;
            font-size: 1.6rem;
        }

        div.cd-container div > div:last-child {
            font-size: 6rem;
            line-height: 6rem !important;
            font-weight: 800;
        }

        #logo {
            visibility: hidden;
            margin: 32px auto;
            display: block;
            max-width: 90%;
        }

        #nav {
            position: fixed;
            top: 8px;
            right: 8px;
        }

        a {
            display: inline-block;
            border-bottom: 1px dashed;
            text-decoration: none;
            color: #000;
        }

        a:hover {
            border-bottom: 1px solid;
        }
    </style>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function () {
            var time = (new Date('Sun Dec 1 2013 00:00:01 GMT+0530 (IST)')) - (new Date());
            console.log(time);
            var day , hour, min, sec;
            var sz = function () {
                var container = $('#logo');
                var bodyHeight = $('body').height();
                var margin = (bodyHeight - container.height()) / 2;
                var cdHeight = $('.countdown').height();
                if (margin + container.height() > bodyHeight - cdHeight) {
                    margin = (bodyHeight - cdHeight - container.height()) / 2 | 0;
                }
                container.css('margin-top', margin + 'px');
            };
            day = Math.floor(time / 86400000);
            time %= 86400000;
            hour = Math.floor(time / 3600000);
            time %= 3600000;
            min = Math.floor(time / 60000);
            time %= 60000;
            sec = Math.floor(time / 1000);
            var countdown_update = function () {
                $('#cd-days').html(day < 10 ? '0' + day : day);
                $('#cd-hours').html(hour < 10 ? '0' + hour : hour);
                $('#cd-minutes').html(min < 10 ? '0' + min : min);
                $('#cd-seconds').html(sec < 10 ? '0' + sec : sec);
            };
            window.setInterval(function () {
                countdown_update();
                sec--;
                if (0 > sec) {
                    sec = 59;
                    min--;
                }
                if (0 > min) {
                    min = 59;
                    hour--;
                }
                if (0 > hour) {
                    hour = 23;
                    day--;
                }
            }, 1000);
            $('#logo').load(function () {
                $(window).on('resize', sz);
                sz();
                $(this).css('visibility', 'visible');
            });
        });
    </script>
</head>
<body>
<div class="page">
    <img src="techno-logo.png" id="logo">

    <div class="countdown">
        <div class="cd-container">
            <div>Days<br>

                <div id="cd-days">00</div>
            </div>
        </div>
        <div class="cd-container">
            <div>Hours<br>

                <div id="cd-hours">00</div>
            </div>
        </div>
        <div class="cd-container">
            <div>Minutes<br>

                <div id="cd-minutes">00</div>
            </div>
        </div>
        <div class="cd-container">
            <div>Seconds<br>

                <div id="cd-seconds">00</div>
            </div>
        </div>
    </div>
    <div id="nav">
        <a target="_blank" href="https://en.wikipedia.org/wiki/Technothlon">What is technothlon?</a> |
        <a target="_blank" href="http://technothlon.techniche.org/home.php">Technothlon 2013</a>
    </div>
</div>
</body>
</html>