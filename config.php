<?php
$_C['RCON_HOST']='127.0.0.1';
$_C['RCON_PORT']='';
$_C['RCON_PASSWORD']='1234';

function mccolor2htmlcolor($respond){
    $c =substr_count( $respond, "\n" );
$string = utf8_decode(htmlspecialchars($respond, ENT_QUOTES, "UTF-8"));
$string = preg_replace('/\xA7([0-9a-f])/i', '<span class="m m-$1">', $string, -1, $count) . str_repeat("</span>", $count);
 return preg_replace('/\xA7([k-or])/i', '<span class="mc-$1">', preg_replace('/\n/', '<br>', $string,$c-1 ), -1, $count) . str_repeat("</span>", $count);
}