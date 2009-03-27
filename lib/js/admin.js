$(document).ready(function(){
    var griglia;
    function processagriglia(){
        griglia = $("#griglia").clone(); //prendo la griglia dall'html e ne faccio una copia in memoria
        griglia.find(".ui-widget[action!=static]").empty(); //svuoto tutti i div con class plugin e senza attributo static
        return griglia;
    };
    $("#editmode").click(function(){ //attivo i js per la modalita di modifica
        $(this).remove();
        $("#editbar").show("slow");
        $(".ui-widget[action=static] .ui-widget-content").editable(function(value){
            return(value);
        },
        {
            type: "textarea",
            submit: "Salva",
            cancel: "Annulla",
            tooltip   : 'Clicca per modificare'

        });
        $("#serviceBar").append("<a id='closeedit'>Chiudi interfaccia di modifica</a> <a id='salva'>Salva le modifiche</a>");
        $(".wcol").sortable({
            connectWith:'.wcol',
            revert: true,
            opacity: 0.7,
            receive: function(event, ui) {if (parseInt($(this).attr("w")) < (parseInt($(ui.item).attr("w")))){$(ui.sender).sortable('cancel');};}
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
            griglia = processagriglia().html();
            alert(griglia);
            $("#savedialog").dialog("open");
            //alert("la seguente griglia verrà salvata: \n" + griglia.html()); //dico che la griglia verrà salvata
            //$.post("./lib/managegrid.php", {"dati": griglia}, function(risposta){alert(risposta)}); //Per ora mi fermo qui XD
        });

        $("#closeedit").click(function(){
            location.reload();
        });

        $("#showgridpreview").click(function(griglia){
            alert(griglia);
        });
    });
});