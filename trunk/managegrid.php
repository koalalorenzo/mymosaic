<?php
include "lib/libcore.php"; /*($_SERVER['DOCUMENT_ROOT']."lib/libcore.php"); Non ne vedo l'utilit� :P */
###################################
# MyMosaic Managegrid             #
###################################

function salvagriglia($dati,$filegriglia="griglia.html"){
    if (write_file($filegriglia,$dati)){
        echo "Modifiche alla griglia salvate correttamente";
        return TRUE;
    } else {
        return FALSE;
    }
};

function stampawidgets($griglia){ #PRIMA O POI BISOGNERA RISCRIVERLO, PER ORA FA DOPPIO LAVORO DI ESCAPE E UNESCAPE
    $xml = simplexml_load_string($griglia); #Carico il file xml
    $widgets = $xml->xpath("//div[@class='widget']"); #Prendo tutti i div con class widget
    foreach ($widgets as $widget){ #Per ogni widget
        $attributi = $widget->attributes(); #carico gli attributi
        $nomeclasse = strval($attributi["action"]); #Prendo l'attributo action e lo faccio come stringa
        if (($nomeclasse != "static")&&($nomeclasse)) { #Controllo che action esista e non sia static
            $w = new $nomeclasse(); #Istanzio un nuovo oggetto dal nome della classe
            $ritorno = $w->render($attributi); #Lancio la funzione Render dell'oggetto appena creato
            $widget->addchild("div",$ritorno); #Aggiungo il ritorno all'html
        };
    };
    return html_entity_decode($xml->asXML()); #Stampo l'xml appena creato
}

function caricagriglia($filegriglia="griglia.html"){
    $griglia = get_file($filegriglia);
    return $griglia;
};

if (@$_POST["dati"]){
    salvagriglia (html_entity_decode($_POST["dati"]));
};
?>
