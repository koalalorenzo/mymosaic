# Struttura delle cartelle #

## Idea di vigliag: ##

A radice tutto quello che fa qualcosa direttamente (Come le view in MVC)
In una cartella "file" le librerie di terze parti e i file di default (Il tema di default, jquery, e altre librerie che useremo, o comunque roba direttamente utile ma non facente parte del sistema)
In una cartella Plugins tutti i file .php delle classi dei plugin
cartella themes i temi.

Così, ad esempio:
  * l file css di default sarà in /files/defaulttheme/style.css
  * query in /files/js/
  * e librerie aggiuntive php in /files/php/
  * anagegrid.php a radice, in quanto è qualcosa che andiamo a richiamare direttamente
  * ibcore.php (che, personalmente, rinominerei in basefunctions) in /files/php/ anche (poiché è qualcosa che richiamiamo solo attraverso altri file php)

Che ne pensate? Scrivete sotto la vostra