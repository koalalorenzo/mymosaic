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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//IT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="it-IT" xml:lang="it-IT" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pagina del Profilo - μMosaic</title>
<link type="text/css" href="lib/js/jqueryuithemes/start/jquery-ui-1.7.custom.css" rel="Stylesheet" />
<link type="text/css" href="lib/js/jquery.easywidgets.css" rel="Stylesheet" />
<link rel="icon" href="themes/default/img/mmos.png" type="image/gif"/>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script type="text/javascript" src="lib/js/jquery-ui-1.7.custom.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.easywidgets.min.js"></script>
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
    $(function(){
     $.fn.EasyWidgets({
         selectors : {
              // Container of a Widget (into another element that use as place)
              // The container can be "div" or "li", for example. In the first case
              // use another "div" as place, and a "ul" in the case of "li".
              container : 'div',

              // Class identifier for a Widget
              widget : '.ui-widget',

              // Class identifier for a Widget place (parents of Widgets)
              places : '.wcol',

              // Class identifier for a Widget header (handle)
              header : '.ui-widget-header',

              // Class for the Widget header menu
              widgetMenu : '.widget-menu',

              // Class identifier for Widget editboxes
              editbox : '.widget-editbox',

              // Class identifier for Widget content
              content : '.widget-content',

              // Class identifier for editbox close link or button, for example
              closeEdit : '.widget-close-editbox',

              // Class identifier for a Widget edit link
              editLink : '.widget-editlink',

              // Class identifier for a Widget close link
              closeLink : '.widget-closelink',

              // Class identifier for Widgets placehoders
              placeHolder : 'widget-placeholder',

              // Class identifier for a Widget collapse link
              collapseLink : '.widget-collapselink'
            }
     });
    });
     $("#savedialog").dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                'Salva la griglia': function() {
                    $(this).dialog('close');
                    $.post("./lib/managegrid.php", {"dati": griglia}, function(risposta){alert(risposta)});
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
     });
    $("#salva").click(function(){
        var griglia = $("#griglia").clone(); //prendo la griglia dall'html e ne faccio una copia in memoria
		griglia.find(".widget[action!=static]").empty(); //svuoto tutti i div con class plugin e senza attributo static
        $("#savedialog").dialog("open");
        //alert("la seguente griglia verrà salvata: \n" + griglia.html()); //dico che la griglia verrà salvata
        //$.post("./lib/managegrid.php", {"dati": griglia}, function(risposta){alert(risposta)}); //Per ora mi fermo qui XD
    });

    $("#showgridpreview").click(function(){
        alert(griglia);
    });
	
	<?php 
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
    Ciao, NavBack | LogOut | Impostazioni | <a id="salva">Salva modifiche</a>
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
<div id="savedialog" title="Salva griglia">
	<p>Sei sicuro di voler salvare i cambiamenti alla griglia?</p>
    <a id="showgridpreview">Visualizza griglia</a>
</div>
</body>
</html>
