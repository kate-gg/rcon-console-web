<?php
@require_once 'config.php';
@require_once 'rcon.php';
$ready = (!empty($_C['RCON_HOST']) && !empty($_C['RCON_PASSWORD']))?true:false;
$_C['RCON_PORT'] = (!empty($_C['RCON_PORT']))?$_C['RCON_PORT']:25575;
$rcon = @new Rcon($_C['RCON_HOST'], $_C['RCON_PORT'], $_C['RCON_PASSWORD']);
if (@$rcon->connect())
{
    @$rcon->sendCommand($_POST['cmd']);
    $respond = @$rcon->getResponse();
    
} else {
    $respond = '§e--> §cConnection failed §6(Maybe it\'s offline?) §e<--';
}
die(mccolor2htmlcolor($respond));
?>