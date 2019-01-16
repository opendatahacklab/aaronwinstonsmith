Il sondaggio "Web e Associazioni Culturali" ha lo scopo di investigare come le organizzazioni pubblicizzano i propri eventi
presso i propri aderenti e di raccogliere il grado di soddisfazione ed eventuali desiderata degli utenti. Il sondaggio è disponibile 
alla pagina web alla URL http://www.opendatahacklab.org/aws/associazioniwebsondaggio/ . 

I risultati del sondaggio (in tempo reale) sono disponibili alla URL http://www.opendatahacklab.org/aws/associazioniwebsondaggio/risultati.tsv
con licenza Creative Commons Attribuzione 3.0 Itaila (https://creativecommons.org/licenses/by/3.0/it/). Questo permette ogni possibile
riutilizzo dei risultati del sondaggio con l'unico obbligo di citare la fonte originale. Nel caso specifico, consigliamo di utilizzare la seguente
URL per citare la fonte www.opendatahacklab.org/aws/ .

I risultati sono disponibili in formato TSV , ossia sono forniti con un file di testo all'interno del quale ogni riga rappresenta la risposte
di un singolo utente al sondaggio. I vari campi all'interno di una riga sono separati con il carattere di tabulazione. Il file può essere visualizzato
attraverso programmi per trattare fogli di calcolo (excel, gnumeric, ...).

Segue la definizione dei campi all'interno del file.
 
 
"created" è il campo che contiene la data nella quale l'utente ha sottomesso il sondaggio.

"tipoutente" contiene la risposta alla domanda "In che rapporto sei con le associazioni e gli spazi sociali?"
Riportiamo i valori che il campo può assumere associati alla risposta che compare nel sondaggio:

	no - non li frequento
	saltuario - li frequento saltuariamente
	assiduo - frequento spazi del genere regolarmente, ma allo stesso modo frequento locali e pub a vocazione commerciale
	esclusivo - frequento quasi esclusivamente spazi sociali e associazioni, ma non prendo mai o quasi mai parte all'organizzazione
	organizzatore - frequento quasi esclusivamente spazi sociali e associazioni e prendo (spesso o a volte) parte all'organizzazione delle attività .

"modo" contiene la risposta alla domanda "In che modo vieni informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?".
Non è stata permessa la risposta multipla perchè mi interessava qui conoscere la modalità prevalente con la quale l'utente viene a conoscenza di queste 
informazioni. Riportiamo anche qui i valori che può assumere il campo

	sito - attraverso il sito web dello spazio
	facebook - attraverso la pagina facebook dello spazio sociale
	web - attraverso siti generici di eventi
	messenger - con un messaggio su internet (WhatsApp, Facebook Messenger, ...)
	mail - via e-mail
	sms - con degli SMS
	brochure - con una brochure cartacea
	calendario - attraverso un calendario esposto in sede
	passaparola - con il passaparola
	altro - Altro
	
Il campo "modoaltro" contiene la risposta in testo libero che l'utente ha inserito nel caso in cui abbia selezionalto "Altro" come risposta
alla domanda preceente.

Per la domanda "Come preferiresti essere informato di eventi e attività che potrebbero interessarti negli spazi che frequenti?" è
prevista la possibilità per l'utente di specificare più di una risposta. Per ognuna delle possibili risposte è stato previsto un campo
nella tabella dei risultati. Tale campo è valorizzato con "y" se l'utente ha selezionato la risposta, altrimenti si troverà vuoto.
Segue l'elenco dei campi associati alle possibili risposte ed il testo delle risposte stesse.

	mododesideratasito - attraverso il sito web dello spazio
	mododesideratafacebook - attraverso la pagina facebook dello spazio sociale
	mododesiderataweb - attraverso siti generici di eventi
	mododesideratamessenger - con un messaggio su internet (WhatsApp, Facebook Messenger, ...)
	mododesideratamail - via e-mail
	mododesideratasms - con degli SMS
	mododesideratabrochure - con una brochure cartacea
	mododesideratacalendario - attraverso un calendario esposto in sede

"mododesiderataaltrotext" contiene l'eventuale testo libero che hanno inserito gli utenti nel caso in cui avessero selezionato 
"Altro" nella domanda precedente.

Il campo "preavviso" riguarda la risposta alla domanda "Con quanto preavviso ti piacerebbe essere informato di eventi e attvità".
Si riportano i valori che può assumere ed il testo ad essi associato

	giornaliero - anche il giorno stesso va bene
	settimanale - almeno una settimana prima
	mensile - almeno un mese prima .

"sitoweb" si riferisce alla domanda "Quanto è importante che una organizzazione abbia un proprio sito con un proprio nome di dominio (ad esempio www.miapiccolaassociazione.it)?".
Seguono i valori che può assumere ed il testo associato
	molto - è fondamentale
	abbastanza - è opportuno ma può andare bene anche una pagina su una piattaforma esterna (ad esempio una pagina facebook)
	no - non è necessario, è sufficiente; una pagina su una piattaforma esterna (ad esempio una pagina facebook)
	nointernet - non è necessario essere presenti su internet

Infine,il campo "libero" contiene il testo inserito dall'utente in risposta a "Se vuoi lascia pure un tuo pensiero."
