<?php 
include /*$_SERVER['DOCUMENT_ROOT'].*/"managegrid.php" ;
$themename = "default";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//IT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="it-IT" xml:lang="it-IT" xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#salva").click(function(event){
        var griglia = $("#griglia").clone(); //prendo la griglia dall'html e ne faccio una copia in memoria
		griglia.find(".widget[action!=static]").empty(); //svuoto tutti i div con class plugin e senza attributo static
        alert("la seguente griglia verrà salvata: \n" + griglia.html()); //dico che la griglia verrà salvata
        // $.post("./lib/managegrid.php", {"dati": griglia}, function(risposta){alert(risposta)}); //Per ora mi fermo qui XD
    });

});
</script>

<style type="text/css">
@import url(<?php echo "themes/".$themename."/css/style.css" ?>);
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
function __autoload($class_name) {
    require_once "./widgets/" . $class_name . '.php';
};

$griglia = caricagriglia();

function stampawidgets($griglia){
    $xml = simplexml_load_string($griglia); #Carico il file xml
    $widgets = $xml->xpath("//div[@class='widget']"); #Prendo tutti i div con class widget
    foreach ($widgets as $widget){ #Per ogni widget
        $attributi = $widget->attributes(); #carico gli attributi
        $nomeclasse = strval($attributi["action"]); #Prendo l'attributo action e lo faccio come stringa
        if (($nomeclasse != "static")&&($nomeclasse)) { #Controllo che action esista e non sia static
            $w = new $nomeclasse(); #Istanzio un nuovo oggetto dal nome della classe
            $ritorno = $w->render(); #Lancio la funzione Render dell'oggetto appena creato
            $widget->addchild($ritorno); #Aggiungo il ritorno all'html
        };
    };
    return $xml->asXML(); #Stampo l'xml appena creato
}
echo stampawidgets($griglia);
?>
</div>
</div>
<div id="footer">
<a id="salva">Salva la griglia!</a>
&mu;Mosaic - 2009
</div>
</body>
</html>
