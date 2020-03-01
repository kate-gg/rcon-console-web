<?php
@require_once 'config.php';
$ready = (!empty($_C['RCON_HOST']) && !empty($_C['RCON_PASSWORD']))?true:false;
$_C['RCON_PORT'] = (!empty($_C['RCON_PORT']))?$_C['RCON_PORT']:25575;
$output="§bRcon console very minimal 1.1 by H3ntaiPro\n
§7// Link github here";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>RCON-CONSOLE ❤</title>
    <style>.terminal{
        background-color:#1B1B1B;
        color:#fff;
        height: 400px;
        border-radius: 5px;
        font-family: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    }
    .input{
        background-color:transparent;
        border:0;
        border-bottom: 1px solid #fff;
        color: #fff;
        width:100%;
        border-radius: 0;
    }
    .send{
        background-color:transparent;
        padding: 0;
        border:0;
        height:30px;
    }
    *:focus {
        outline: none;
    }
    .m.m-0{color:#000}.m.m-1{color:#00a}.m.m-2{color:#0a0}.m.m-3{color:#0aa}.m.m-4{color:#a00}.m.m-5{color:#a0a}.m.m-6{color:#fa0}.m.m-7{color:#aaa}.m.m-8{color:#555}.m.m-9{color:#55f}.m.m-a{color:#5f5}.m.m-b{color:#5ff}.m.m-c{color:#f55}.m.m-d{color:#f5f}.m.m-e{color:#ff5}.m.m-f{color:#fff}.m,.mc-r{color:#fff;font-weight:400;font-style:normal;text-decoration:none}.mc-l{font-weight:700}.mc-m{text-decoration:line-through}.mc-n{text-decoration:underline}.mc-o{font-style:italic}
    </style>
  </head>
  <body>
    <div class="container mt-5 mb-3" style="max-width:700px">
        <h1>Rcon Console ❤</h1>
        <?php
            if($ready){ ?>
            <div class="terminal d-flex flex-column w-100">
                <div class="p-2 mb-auto w-100 overflow-auto" id="output">
                    <span>! <?= mccolor2htmlcolor($output)?></span><br>
                </div>
                <div class="p-2 w-100 d-flex">
                    <span class="mr-2">></span>
                    <div class="w-100">
                        <input class="input" id="input">
                        <small>Use <span class="badge badge-light font-weight-light">Enter</span> to send command</small>
                    </div>
                    <button class="send" onclick="cmd($('#input').val())">
                        <svg enable-background="new 0 0 280.823 280.823" height="20" viewBox="0 0 280.823 280.823" width="20" class="ml-2" ><path fill="#fff" d="m250.734 40.137-90.265-.02v20.059h90.265c5.534 0 10.029 4.515 10.029 10.049v80.216c0 5.534-4.496 10.029-10.029 10.029h-212.34l45.877-45.877-14.182-14.182-70.089 70.088 70.206 70.206 14.182-14.182-45.994-45.994h212.341c16.592 0 30.088-13.497 30.088-30.088v-80.216c0-16.592-13.497-30.088-30.089-30.088z"/></svg>
                    </button>
                </div>
            </div>
            <?php } else { ?>
            <h4>System not ready yet!</h4>
            <?php }
        ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $('#input').keyup(function (e) {
            if (e.keyCode === 13) {
                cmd($("#input").val());
            }
        });
        function cmd(cmdx){
            if(cmdx!=''){
                $('#input').val('');
                $.post('system.php', {cmd:cmdx}, function(data) {
                    if(data!=''){
                        $( "#output" ).append('<span>! '+data+'</span><br>');
                    }
                }).always(function () {
                    $('#output').scrollTop($('#output')[0].scrollHeight);
                    $('#controler').show();
                });
            }
            return false;
        }

    </script>
  </body>
</html>