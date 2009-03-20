<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class googlecalendar extends Widget {

public $html;
public $jsfunctions;
    function __construct($arguments) {
       $this->argomenti = $arguments;

$this->html = <<<CODICE
        <h3 class="ui-widget-header"><img src="widgets/googlecalendar/icon.png" /> Google Calendar</h3>
        <iframe src="http://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=navback%40gmail.com&amp;color=%23A32929&amp;ctz=Europe%2FRome" style=" border-width:0 " width="100%" height="300" frameborder="0" scrolling="no"></iframe>
CODICE;

    }

    public function render(){
        

        return $this->html;
    }
	
	public $jsfn = array();

    public function requirements(){
        $this->jsfn = array($this->jsfunctions);
        return array('js' => $this->js, "css" => $this->css, "jsfn" => $this->jsfn,);
    }
}
?>
