<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class twitter {
    public $js = array(); #ARRAY INDICANTE I PERCORSI DI TUTTI I FILE JS RICHIESTI DAL WIDGET
    public $css = array(); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET

    function render($args){
$html = <<< CODICE
        <b class="title">Twitter</b>
        <p>Questo è generato da php, preso dall'attributo del div <br/> numero = {$args["numero"]} =) </p>
CODICE;

        return $html;
    }
}
?>
