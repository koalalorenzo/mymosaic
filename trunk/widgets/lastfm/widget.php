<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class lastfm extends Widget {

public $html;
public $jsfunctions;
    function __construct($arguments) {
       $this->argomenti = $arguments;

$this->html = <<<CODICE
        <h3 class="ui-widget-header"><img src="widgets/lastfm/icon.png" /> Ascolti recenti su Last.fm</h3>
        <div id="lastfm"><center><object type="application/x-shockwave-flash" data="http://cdn.last.fm/widgets/chart/friends_6.swf" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" id="lfmEmbed_743811431" width="184" height="199"> <param name="movie" value="http://cdn.last.fm/widgets/chart/friends_6.swf" /> <param name="flashvars" value="type=recenttracks&amp;user=NavBack&amp;theme=blue&amp;lang=it&amp;widget_id=chart_c78c22c16d5d261a1d97c6428eb4d866" /> <param name="allowScriptAccess" value="always" /> <param name="allowNetworking" value="all" /> <param name="allowFullScreen" value="true" /> <param name="quality" value="high" /> <param name="bgcolor" value="6598cd" /> <param name="wmode" value="transparent" /> <param name="menu" value="true" /></object></center><br /></div>
CODICE;

    }

    public function render(){
        

        return $this->html;
    }
	
    public $css = array("widgets/lastfm/lastfm.css"); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET
	public $jsfn = array();

    public function requirements(){
        $this->jsfn = array($this->jsfunctions);
        return array('js' => $this->js, "css" => $this->css, "jsfn" => $this->jsfn,);
    }
}
?>
