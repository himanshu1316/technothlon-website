<?php
/**
 * Developer: Rahul Kadyan
 * Date: 15/11/13
 * Time: 2:33 AM
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
<script>
    $(document).ready(function (){
        var $logo_head = $('#logo-head').addClass('logo-head');
        var $logo_text = $('#logo-text').addClass('logo-text');
        var $logo_tag = $('#logo-tag').addClass('logo-tag');
        window.setTimeout(function(){
            $logo_head.fadeOut({
                duration: 500
            });
            $logo_text.fadeOut({
                duration: 500
            });
            $logo_tag.fadeOut({
                duration: 500,
                complete: pageLoad
            });
        }, 4000);
    });
    function pageLoad(){
        var $pc = $('#pageContent');
        var content = $pc.html();
        $pc.remove();
        $('#view-port').html(content).find('.animation-container').addClass('slide-up');
        $('.extra-large').fitText(1.2, { minFontSize: '36px', maxFontSize: '172px' });
    }
</script>