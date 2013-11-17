<?php
/**
 * Developer: Rahul Kadyan
 * Date: 15/11/13
 * Time: 6:32 AM
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
if (!defined('xDEC')) exit;
?>
<style type="text/css">
    @keyframes "slideUp"{
        from {
            margin-top: 2000px;
        }
    }

    @-moz-keyframes slideUp {
        from {
            margin-top: 2000px;
        }
    }

    @-webkit-keyframes "slideUp"{
        from {
            margin-top: 2000px;
        }
    }

    @-ms-keyframes "slideUp"{
        from {
            margin-top: 2000px;
        }
    }

    @-o-keyframes "slideUp"{
        from {
            margin-top: 120%;
        }
    }

    .animation-container {
    }

    .slide-up {
        -webkit-animation-name: slideUp;
        -moz-animation-name: slideUp;
        -ms-animation-name: slideUp;
        -o-animation-name: slideUp;
        animation-name: slideUp;

        -webkit-animation-duration: 1.6s;
        -moz-animation-duration: 1.6s;
        -ms-animation-duration: 1.6s;
        -o-animation-duration: 1.6s;
        animation-duration: 1.6s;

        -webkit-animation-timing-function: cubic-bezier(0.15, 0.55, 0, 1);
        -moz-animation-timing-function: cubic-bezier(0.15, 0.55, 0, 1);
        -ms-animation-timing-function: cubic-bezier(0.15, 0.55, 0, 1);
        -o-animation-timing-function: cubic-bezier(0.15, 0.55, 0, 1);
        animation-timing-function: cubic-bezier(0.15, 0.55, 0, 1);
    }

</style>