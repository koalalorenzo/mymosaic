#Pagina per metterci d'accordo su caratteristiche e funzionalità dei widget

# Vigliag #
## Funzioni ##

Per come la vedo io i widget dovrebbero dividersi in 2 categorie:
Widget legati al contenuto
Widget non-legati al contenuto ma al servizio

Prendiamo ad esempio 2 Widget: Uno che mostra gli ultimi twit ed un'altro che mostra un determinato articolo del nostro blog.

Il primo (Twitter) sarà legato solamente al servizio, non ha nessuna necessità particolare, se non il nostro nome utente su twitter. Molti di questi non hanno praticamente bisogno di nessun codice lato server. Il widget di twitter si può benissimo fare completamente in Ajax.

Il secondo (Articolo del blog), invece, ha bisogno di una vera e propria sorgente di dati, chiamiamola app o plugin. Il widget andrà a chiamarsi delle funzioni in un file esterno (si voglia chiamarlo plugin o applicazione), riceverà i dati e produrrà il codice html del widget di conseguenza.

## Lato tecnico ##

I widget dovrebbero essere tutti rappresentati da file "Widget.php". Posizionati, ad esempio, in /widgets/. Poiché un widget deve poter essere istanziato più volte, i file di configurazione devono necessariamente essere **esterni**. Questo ci evita di fare più copie dello stesso file Php.

Ora, il widget deve poter ricevere dati da 3 sorgenti:
  * Il codice html <div /> da cui parte la richiesta
  * File di configurazione (forse però si può evitare mettendo tutte le informazioni nell'html)
  * Un plugin (o applicazione, propongo di chiamarla in questo modo).

# Voglio la vostra opinione e come pensate si possa realizzare #