<?php include_once "managegrid.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//IT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="it-IT" xml:lang="it-IT" xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $("#salva").click(function(event){
        var griglia = $("#griglia").html();
        alert("la seguente griglia verrà salvata: <br/>" + griglia);
        $.post("managegrid.php", {"dati": griglia}, function(risposta){alert(risposta)});

    });

});
</script>

<style type="text/css">
@import url("css/default.css");
</style>
</head>
<body>
<div id="serviceBar">
Ciao, NavBack | LogOut | Impostazioni
</div>
<div id="header">
Il profilo di NavBack
<div class="headDescription">Per cancellare una vita ci vuole un attimo, per cancellare un attimo ci vuole una vita. <b>J. Morrison</b></div>
</div>
<div id="container">
<div id="griglia">
<?php 
//    $griglia = caricagriglia(); NON FUNZIONANO, STO USANDO INCLUDE
//    echo $griglia;
//    echo $nomefile;
    include "grigliabk.txt";  //STO INCLUDENDO UN BACKUP, AL MOMENTO GRIGLIA.TXT SI DEGENERA OGNI VOLTA CHE VIENE SALVATA
?>
</div>
</div>
<div id="footer">
<a id="salva">Salva la griglia!</a>
&mu;Mosaic - 2009
</div>
</body>
</html>