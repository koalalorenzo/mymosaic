<?php 
    #Settings
    $themename = "default";
    #Includo i file
    include "managegrid.php" ;
	require_once "lib/widget.php";

    #Carico la griglia
    function __autoload($class_name) {
        require_once "./widgets/" . $class_name . '/widget.php';
    };
    $griglia = caricagriglia();
    $grigliagenerata = stampawidgets($griglia);
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//IT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="it-IT" xml:lang="it-IT" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pagina del Profilo - myMosaic</title>
<link type="text/css" href="lib/js/jqueryuithemes/start/jquery-ui-1.7.custom.css" rel="Stylesheet" />
<link rel="icon" href="themes/default/img/mmos.png" type="image/gif"/>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<?php if($_SESSION["permission"] == "admin"){?>
<script type="text/javascript" src="lib/js/jquery-ui-1.7.custom.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.jeditable.min.js"></script>
<script type="text/javascript" src="lib/js/admin.js"></script>
<?php }; ?>
<!-- JS E CSS per i widget -->
<?php
foreach($js as $jss){
    echo "<script type='text/javascript' src='$jss'></script>\n";
}
foreach($css as $csss){
    echo "<link type='text/css' href='$csss' rel='Stylesheet' />\n";
}
?>
<!-- FINE JS E CSS per i widget -->
<link type="text/css" href="<?php echo "themes/".$themename."/css/style.css" ?>" rel="Stylesheet" />
<script type="text/javascript">
$(document).ready(function(){
    	$("#trash").droppable({
			accept: '.ui-widget',
			activeClass: 'ui-state-hover',
			hoverClass: 'ui-state-active',
            tolerance: 'pointer',
			drop: function(event, ui) {
                if(confirm("Sei sicuro di voler eliminare il widget?")){$(ui.draggable).remove();}
			}
        }
		);
        <?php
        //stampo i js per i singoli widget
        foreach($jsfn as $elem){
            echo "$elem \n";
        }
        ?>
});
</script>

<style type="text/css">
</style>
</head>
<body>
<div id="container">
<div id="serviceBar">
    <?php if(@$_SESSION["permission"]=="admin"){
        echo "Ciao, {$_SESSION["username"]} | <a href='logout.php'>LogOut</a> | Impostazioni | <a id='editmode'>Modifica profilo</a>";
    ?>
        <div id="editbar" style="display:none;">
        <div id="addmenu">
        <font size="3"><b>Aggiungi Widget</b></font><br />
            <img src="widgets/twitter/icon.png"> <b>Twitter</b><br />
            Visualizza gli ultimi tweet inviati.<br />
            <img src="widgets/lastfm/icon.png"> <b>Last.fm</b><br />
            Mostra gli ultimi ascolti su Last.fm.<br />
            <img src="widgets/googlecalendar/icon.png"> <b>Google Calendar</b><br />
            Mostra il contenuto di un calendario scelto.<br />
            <img src="widgets/flickr/icon.png"> <b>Flickr</b><br />
            Visualizza un elenco con le ultime foto pubblicate su Flickr.<br />
        </div>
        <div id="editwidget">
            <p>Form per la modifica del widget selezionato</p>
        </div>
        <div id="trash_config">
            <img id="trash" src="themes/default/img/trash.png" alt="" title="Drop a widget here to destroy it"/>
        </div>
        </div>
    <?php }else{?>
    <form name="login" action="login.php" method="POST">
        <input type="text" style="font-size:8pt;" name="username" value="demo" size="10" />
        <input style="font-size:8pt;" type="password" name="password" value="password" size="15" />
        <input style="font-size:8pt;font-family:Arial;" type="submit" value="LogIn" />
    </form>
    <?php };?>
</div>
<div id="header">
    <h1>Pagina del profilo</h1>
    <div class="headDescription">Per cancellare una vita ci vuole un attimo, per cancellare un attimo ci vuole una vita. <b>J. Morrison</b></div>
</div>

<div id="griglia">
    <?php
    echo $grigliagenerata;
    ?>
</div>
<div id="footer">
    &mu;Mosaic - 2009
</div>
</div>
<!-- Dialoghi ecc... -->
<div id="savedialog" style="display:none;" title="Salva griglia">
	<p>Sei sicuro di voler salvare i cambiamenti alla griglia?</p>
    <a id="showgridpreview">Visualizza griglia</a>
</div>
</body>
</html>
