<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class flickr extends Widget {

public $html;
public $jsfunctions;
    function __construct($arguments) {
       $this->argomenti = $arguments;

$this->html = <<<CODICE
<h3 class="ui-widget-header"><img src="widgets/flickr/icon.png" /> Immagini da flickr</h3>
<center>
<style>
table img{border:none;}
</style>
<table id="flickrImg"><tr>
<td>
<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=3&display=latest&size=s&layout=h&source=user&user=8239773@N05"></script>
</td>
</tr>
</table>
<a href="http://www.flickr.com" style="color:#3993ff;text-decoration:none;font-family:Arial;font-size:11px;">www.<strong>flick<span style="color:#ff1c92">r</span></strong>.com</a></center>

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
