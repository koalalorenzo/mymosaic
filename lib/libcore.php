<?php
###################################
# MyMosaic Core Lib               #
###################################

function get_file($posizione){
# Questa funzione restituisce il contenuto di un file.
    if (is_readable($posizione) == false) {
        echo("Impossibile leggere il file!"); # il file non può essere letto!
        return FALSE;
    };
    $file = fopen($posizione, 'r');
    $contenuto = fread($file, filesize($posizione));
    fclose($file);
    return $contenuto;
};

function write_file($posizione,$valore){
# Questa funzione permette di sovrascrivere del contenuto in un file.
    if (is_writable($posizione) == false) {
        echo('Permessi inadeguati per scrivere sul file'); # Nel caso in cui è impossibile scrivere sul file :) Va bene ?
        return FALSE;
    }
    $file=fopen($posizione,"w"); # Apre il file.
    fwrite($file, $valore); # Scrive il contenuto.
    fclose($file); # Chiude lo stream.
    return TRUE;
};
