<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class twitter extends Widget {

public $html;
public $jsfunctions;
    function __construct($arguments) {
       $this->argomenti = $arguments;

$this->html = <<<CODICE
        <h3 class="ui-widget-header">Ultimi twit di vigliag</h3>
        <div id="twitter"></div>
CODICE;
$this->jsfunctions = <<<JS
		$("#twitter").getTwitter({
		userName: "vigliag",
		numTweets: 5,
		loaderText: "Caricamento",
		slideIn: false,
		showHeading: false,
		headingText: "Ultimi Twit",
		showProfileLink: false
	});
JS;

    }

    public function render(){
        

        return $this->html;
    }
	
	public $js = array("widgets/twitter/jquery.twitter.js"); #ARRAY INDICANTE I PERCORSI DI TUTTI I FILE JS RICHIESTI DAL WIDGET
    public $css = array("widgets/twitter/jquery.twitter.css"); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET
	public $jsfn = array();

    public function requirements(){
        $this->jsfn = array($this->jsfunctions);
        return array('js' => $this->js, "css" => $this->css, "jsfn" => $this->jsfn,);
    }
}
?>
