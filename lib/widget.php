<?php
/**
 * Abstract class for Widgets
 *
 * @author Administrator
 */
abstract class Widget {
	public $js = array(); #ARRAY INDICANTE I PERCORSI DI TUTTI I FILE JS RICHIESTI DAL WIDGET
    public $css = array(); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET
    public $jsfn = array();
    public $html;
    public $jsfunctions;

    function __construct($arguments) {
       $this->argomenti = $arguments;
    }

    function loadarg($argument){
            if (isset($this->argomenti[$argument])){
                return $this->argomenti[$argument];
            } else {throw new Exception("Argomento non trovato");}
    }


    public function render(){
        return $this->html;
    }

    public function requirements(){
        $this->jsfn = array($this->jsfunctions());
        return array('js' => $this->js, "css" => $this->css, "jsfn" => $this->jsfn,);
        }
}
?>