<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class twitter {
    function __construct($arguments) {
       $this->argomenti = $arguments;
    }

    function requirements(){
        $js = array(); #ARRAY INDICANTE I PERCORSI DI TUTTI I FILE JS RICHIESTI DAL WIDGET
        $css = array(); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET
        return array($js,$css);
    }

    function render(){
$html = <<< CODICE
        <h3 class="ui-widget-header">Twitter</h3>
        <p>Questo è generato da php, preso dall'attributo del div <br/> numero:{$this->argomenti["numero"]} =D </p>
CODICE;

        return $html;
    }
}
?>
