<?php
/**
 * Abstract class for Widgets
 *
 * @author Administrator
 */
abstract class Widget {
	public $js = array(); #ARRAY INDICANTE I PERCORSI DI TUTTI I FILE JS RICHIESTI DAL WIDGET
    public $css = array(); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET

    function __construct($arguments) {
       $this->argomenti = $arguments;
    }
    public function requirements(){
        return array('js' => $this->js, "css" => $this->css);
    }
}
?>