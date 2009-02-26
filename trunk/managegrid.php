<?php
include "lib/libcore.php"; /*($_SERVER['DOCUMENT_ROOT']."lib/libcore.php"); Non ne vedo l'utilità :P */
###################################
# MyMosaic Managegrid             #
###################################

function salvagriglia($dati,$filegriglia="griglia.txt"){
    if (write_file($filegriglia,$dati)){
        echo "Modifiche alla griglia salvate correttamente";
        return TRUE;
    } else {
        return FALSE;
    }
};

function caricagriglia($filegriglia="griglia.txt"){
    $griglia = get_file($filegriglia);
    return $griglia;
};

if ($_POST["dati"]){
    salvagriglia (html_entity_decode($_POST["dati"]));
};
?>
