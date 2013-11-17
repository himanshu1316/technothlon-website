<?php
/**
 * Created by PhpStorm.
 * User: himanshu
 * Date: 17/11/13
 * Time: 2:50 PM
 */
if(!defined('xDEC')) exit; ?>
<style type="text/css">
    .pallet{
        display: block;
    }
    .pallet-node{
        display: inline-block;
        width: 2rem;
        height: 400px;
    }
    .pallet-node:hover{
        width: auto;
    }
    .pallet-node > div{
        display: none;
    }
    .pallet-node > div.name{
        display: inline-block;
        font-size: 1.6rem;
        white-space: nowrap;
        word-break: keep-all;;
        transform: rotate(90deg) ;
    }
    .pallet-node:hover div{
        display: block;
        duration: 40;
    }
    .pallet-node:hover > div.name{
        transform: rotate(0deg);
    }
</style>