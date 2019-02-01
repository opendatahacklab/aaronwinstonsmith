<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Aaron Winston Smith - web e associazioni culturali - risultati </title>
		 <meta charset="UTF-8" /> 
		 <link rel="stylesheet" type="text/css" href="../aws.css" />
		<style>
			*.checked{
				border : dotted 1px ;
			}
		</style>
	</head>
	<body>
		<h1>Risultati del Sondaggio Web e Associazioni Culturali </h1> 
		<p>In questa pagina vengono riportati i risultati del sondaggio <a href="index.html">Web e Associazioni Culturali</a>. Nel seguito troverete
		elencati i singoli questionari sottomessi, aggiornati in tempo reale. &Egrave anche disponibile un <a href="risultati.tsv" type="text/tab-separated-values">file tsv</a> con i risultati,
		 anch'esso aggiornato in tempo reale, ed un file <a href="README.txt">README</a> che spiega come interpretare il file tsv. Ricordiamo che i risultati del sondaggio sono rilasciati
		con licenza <a href="https://creativecommons.org/licenses/by/3.0/it/deed.it">Creative Commons Attribuzione 3.0 Italia (CC BY 3.0 IT)</a>.  Si consiglia di usare la URL
		di questa pagina per indicare la fonte, nel caso in cui decidiate di riutilizzare questi dati.
		</p>

<?php
	/**
	 * print the result of a single survey submission
	 *
	 * @param $n row number
	 * @param $result a row in the results csv
	 */
	function printSingle($n, $result){
?>
		<h2>Questionario <?=$n;?> del <?=$result[0]?></h2> 
		<form action="record-to-file.php" method="post">
			<h3>In che rapporto sei con le associazioni e gli spazi sociali?</h3>
			<ul>
				<li <?php if ($result[1]==='no') echo 'class="checked" ';?>>non li frequento</li>
				<li <?php if ($result[1]==='saltuario') echo 'class="checked" ';?> >li frequento saltuariamente</li>
				<li <?php if ($result[1]==='assiduo') echo 'class="checked"';?> >frequento spazi del genere regolarmente, ma allo stesso modo frequento locali e pub a vocazione commerciale</li>
				<li <?php if ($result[1]==='esclusivo') echo 'class="checked"';?> >frequento quasi esclusivamente spazi sociali e associazioni, ma non prendo mai o quasi mai parte all'organizzazione</li>
				<li <?php if ($result[1]==='organizzatore') echo 'class="checked"';?> >frequento quasi esclusivamente spazi sociali e associazioni e prendo (spesso o a volte) parte all'organizzazione delle attivit&agrave;</li>
			</ul>

			<h3>In che modo vieni informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</h3>
			<ul>
				<li <?php if ($result[2]==='sito') echo 'class="checked"';?> >attraverso il sito web dello spazio</li>
				<li <?php if ($result[2]==='facebook') echo 'class="checked"';?> >attraverso la pagina facebook dello spazio sociale</li>
				<li <?php if ($result[2]==='web') echo 'class="checked"';?> >attraverso siti generici di eventi</li>
				<li <?php if ($result[2]==='messenger') echo 'class="checked"';?> >con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</li>
				<li <?php if ($result[2]==='mail') echo 'class="checked"';?> >via e-mail</li>
				<li <?php if ($result[2]==='sms') echo 'class="checked"';?> >con degli SMS</li>
				<li <?php if ($result[2]==='brochure') echo 'class="checked"';?> >con una brochure cartacea</li>
				<li <?php if ($result[2]==='calendario') echo 'class="checked"';?> >attraverso un calendario esposto in sede</li>
				<li <?php if ($result[2]==='passaparola') echo 'class="checked"';?> >con il passaparola</li>
				<li <?php if ($result[2]==='altro') echo 'class="checked"';?> >Altro: <?=$result[3];?></li>
			</ul>
			<h3>Come preferiresti essere informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</h3>
			<ul>
				<li <?php if ($result[4]==='y') echo 'class="checked"';?> >attraverso il sito web dello spazio</li>
				<li <?php if ($result[5]==='y') echo 'class="checked"';?> >attraverso la pagina facebook dello spazio sociale</li>
				<li <?php if ($result[6]==='y') echo 'class="checked"';?> >attraverso siti generici di eventi</li>
				<li <?php if ($result[7]==='y') echo 'class="checked"';?> >con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</li>
				<li <?php if ($result[8]==='y') echo 'class="checked"';?> >via e-mail</li>
				<li <?php if ($result[9]==='y') echo 'class="checked"';?> >con degli SMS</li>
				<li <?php if ($result[10]==='y') echo 'class="checked"';?> >con una brochure cartacea</li>
				<li <?php if ($result[11]==='y') echo 'class="checked"';?> >attraverso un calendario esposto in sede</li>
				<li <?php if (!(empty($result[12]))) echo 'class="checked"';?> >Altro: <?=$result[12];?></li>
			</ul>

			<h3>Con quanto preavviso ti piacerebbe essere informato di eventi e attvit&agrave;?</h3>
			<ul>
				<li <?php if ($result[13]==='giornaliero') echo 'class="checked"';?> >anche il giorno stesso va bene</li>
				<li <?php if ($result[13]==='settimanale') echo 'class="checked"';?> >almeno una settimana prima</li>
				<li <?php if ($result[13]==='mensile') echo 'class="checked"';?> >almeno un mese prima</li>
			</ul>

			<h3>Quanto &egrave; importante che una organizzazione abbia un 
				proprio sito con un proprio nome di dominio (ad esempio www.miapiccolaassociazione.it)?</h3>
			<ul>
				<li <?php if ($result[14]==='molto') echo 'class="checked"';?> >&egrave; fondamentale</li>
				<li <?php if ($result[14]==='abbastanza') echo 'class="checked"';?> >&egrave; opportuno ma pu&ograve; andare bene anche una pagina su una piattaforma esterna (ad esempio una pagina facebook)</li>
				<li <?php if ($result[14]==='no') echo 'class="checked"';?> >non &egrave; necessario, &egrave; sufficiente una pagina su una piattaforma esterna (ad esempio una pagina facebook)</li>
				<li <?php if ($result[14]==='nointernet') echo 'class="checked"';?> >non &egrave; necessario essere presenti su internet</li>
			</ul>

			<p>Se vuoi lascia pure un tuo pensiero: <?=$result[15];?></p>
<?php
	}

	$handle = fopen('risultati.tsv', 'r') or die('Unable to open file');
	$i=1;
	//skip header
	fgetcsv($handle, 4096, "\t");
	//parse lines
	while (!feof($handle)) {
		$data = fgetcsv($handle, 4096, "\t");
	        printSingle($i,$data);
        	$i++;
    	}
	fclose($handle);
    ?>