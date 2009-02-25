<?php

$nomefile = "griglia.txt";

function salvagriglia(){
    $dati = $_POST["dati"];
    $fp = fopen("griglia.txt", "w"); //mettendo $nomefile non funziona, perché?
    fwrite($fp, $dati);
    fclose($fp);
    echo "Modifiche alla griglia salvate correttamente";
};

function caricagriglia(){
    $griglia = file_get_contents($nomefile); //neanche questo va, sistemare please
    return $griglia;
};

if ($_POST["dati"]){
    salvagriglia();
}
?>
