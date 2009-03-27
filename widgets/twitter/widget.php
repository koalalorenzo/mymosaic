<?php
/**
 * Widget for reading the lastest from twitter
 *
 * @author Administrator
 */
class twitter extends Widget {

public $js = array("widgets/twitter/jquery.twitter.js"); #ARRAY INDICANTE I PERCORSI DI TUTTI I FILE JS RICHIESTI DAL WIDGET
public $css = array("widgets/twitter/jquery.twitter.css"); #ARRAY INDICANTE TUTTI I FILE CSS RICHIESTI DAL WIDGET
public $rqarg = array('username'=>'username dell\'utente','numtweet'=>"numero di tweet da visualizzare");

function __construct($arguments) {
$this->argomenti = $arguments;
}

public function render(){
    try{
    $username=$this->loadarg("username");
    $html ="
        <h3 class=\"ui-widget-header\"><img src=\"widgets/twitter/icon.png\" /> Ultimi tweet di {$username}</h3>
        <div id=\"twitter\"></div>
        ";
    return $html;
    }
    catch(Exception $exc){
        return "Errore nei file di configurazione per il Wiget Twitter";
    }
}
public function jsfunctions(){
    try{
    $username=$this->loadarg("username");
    $jsfunctions ="
		$('#twitter').getTwitter({
		userName: '{$username}',
		numTweets: 5,
		loaderText: 'Caricamento',
		slideIn: false,
		showHeading: false,

		showProfileLink: false
        });
        ";
    return $jsfunctions;
    } catch(Exception $exc){
        return "";
    }
    }
public function requirements(){
        $jsfn = array($this->jsfunctions());
        return array('js' => $this->js, "css" => $this->css, "jsfn" => $jsfn,);
        }
}
?>
