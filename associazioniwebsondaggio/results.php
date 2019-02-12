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
		<p class="credits">
			Powered by <a target="_blank" href="https://kibibit.net">Kibibit</a>
		</p>
		<p>In questa pagina vengono riportati i risultati del sondaggio <a href="index.html">Web e Associazioni Culturali</a>. Nel seguito troverete
		elencati i singoli questionari sottomessi, aggiornati in tempo reale. &Egrave anche disponibile un <a href="risultati.tsv" type="text/tab-separated-values">file tsv</a> con i risultati,
		 anch'esso aggiornato in tempo reale, ed un file <a href="README.txt">README</a> che spiega come interpretare il file tsv. Ricordiamo che i risultati del sondaggio sono rilasciati
		con licenza <a href="https://creativecommons.org/licenses/by/3.0/it/deed.it">Creative Commons Attribuzione 3.0 Italia (CC BY 3.0 IT)</a>.  Si consiglia di usare la URL
		di questa pagina per indicare la fonte, nel caso in cui decidiate di riutilizzare questi dati.
		</p>

<?php

	/**
	 * Process a mododesiderata field, return the string represnting that the option was checked.
         */
	function processDesiderata($key, $value, $userType, & $counts){
		if ($value==='y'){
			$counts['mododesiderata'][$key][$userType]++;
			$counts['mododesiderata'][$key]['tot']++;
			return 'class="checked"';
		} else
			return '';
	}  

	/**
	 * print the result of a single survey submission
	 *
	 * @param $n row number
	 * @param $result a row in the results csv
	 * @counts is an associative bidimensional array with field and value as keys, which contains the number of occurrences of a value for each field
	 */
	function printSingle($n, $result, & $counts){
		$counts['tipoutente'][$result[1]]++;
		$counts['modo'][$result[2]][$result[1]]++;
		$counts['modo'][$result[2]]['tot']++;
		$counts['preavviso'][$result[13]][$result[1]]++;
		$counts['preavviso'][$result[13]]['tot']++;
?>
		<h2>Questionario <?=$n;?> del <?=$result[0]?></h2> 
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
			<li <?=processDesiderata('sito', $result[4], $result[1], $counts);?> >attraverso il sito web dello spazio</li>
			<li <?=processDesiderata('facebook', $result[5], $result[1], $counts);?> >attraverso la pagina facebook dello spazio sociale</li>
			<li <?=processDesiderata('web', $result[6], $result[1], $counts);?> >attraverso siti generici di eventi</li>
			<li <?=processDesiderata('messenger', $result[7], $result[1], $counts);?> >con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</li>
			<li <?=processDesiderata('mail', $result[8], $result[1], $counts);?> >via e-mail</li>
			<li <?=processDesiderata('sms', $result[9], $result[1], $counts);?> >con degli SMS</li>
			<li <?=processDesiderata('brochure', $result[10], $result[1], $counts);?> >con una brochure cartacea</li>
			<li <?=processDesiderata('calendario', $result[11], $result[1], $counts);?> >attraverso un calendario esposto in sede</li>
			<li <?php if (!(empty($result[12]))){ 	$counts['mododesiderata']['altro'][$userType]++; $counts['mododesiderata']['altro']['tot']++; echo 'class="checked"';} ?> >Altro: <?=$result[12];?></li>
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

$counts=array();
$counts['tipoutente']['no']=0;
$counts['tipoutente']['saltuario']=0;
$counts['tipoutente']['assiduo']=0;
$counts['tipoutente']['esclusivo']=0;
$counts['tipoutente']['organizzatore']=0;
$counts['tipoutente']['']=0;

function initPerType(& $counts,$key1, $key2){
	$counts[$key1][$key2]['no']=0;
	$counts[$key1][$key2]['saltuario']=0;
	$counts[$key1][$key2]['assiduo']=0;
	$counts[$key1][$key2]['esclusivo']=0;
	$counts[$key1][$key2]['organizzatore']=0;
	$counts[$key1][$key2]['']=0;
	$counts[$key1][$key2]['tot']=0;
}

function initModo(& $counts,$key){
	initPerType($counts,$key,'sito');
	initPerType($counts,$key,'facebook');
	initPerType($counts,$key,'web');
	initPerType($counts,$key,'messenger');
	initPerType($counts,$key,'mail');
	initPerType($counts,$key,'sms');
	initPerType($counts,$key,'brochure');
	initPerType($counts,$key,'calendario');
	initPerType($counts,$key,'passaparola');
	initPerType($counts,$key,'altro');
	initPerType($counts,$key,'');
}

function printCountRow(& $counts, $title, $key1, $key2){
		echo "\t<tr>\n";
		echo "\t\t<td>$title</td>\n";
		echo "\t\t<td>".$counts[$key1][$key2]['no']."</td>\n";
		echo "\t\t<td>".$counts[$key1][$key2]['saltuario']."</td>\n";
		echo "\t\t<td>".$counts[$key1][$key2]['assiduo']."</td>\n";
		echo "\t\t<td>".$counts[$key1][$key2]['esclusivo']."</td>\n";
		echo "\t\t<td>".$counts[$key1][$key2]['organizzatore']."</td>\n";
		echo "\t\t<td>".$counts[$key1][$key2]['tot']."</td>\n";
		echo "\t</tr>\n";
}

initModo($counts,'modo');
initModo($counts,'mododesiderata');
initPerType($counts,'preavviso','giornaliero');
initPerType($counts,'preavviso','settimanale');
initPerType($counts,'preavviso','mensile');
initPerType($counts,'preavviso','');

	$handle = fopen('risultati.tsv', 'r') or die('Unable to open file');
	$i=1;
	//skip header
	fgetcsv($handle, 4096, "\t");
	//parse lines
	while (!feof($handle)) {
		$data = fgetcsv($handle, 4096, "\t");
	        printSingle($i,$data,$counts);
        	$i++;
    	}
	fclose($handle);
?>


<h2>Risultati Aggregati</h2>

<table>
	<caption>In che rapporto sei con le associazioni e gli spazi sociali?</caption>
	<tr>
		<td>non li frequento</td>
		<td><?php echo $counts['tipoutente']['no']; ?></td>
	</tr>
	<tr>
		<td>li frequento saltuariamente</td>
		<td><?php echo $counts['tipoutente']['saltuario']; ?></td>
	</tr>
	<tr>
		<td>frequento spazi del genere regolarmente, ma allo stesso modo frequento locali e pub a vocazione commerciale</td>
		<td><?php echo $counts['tipoutente']['assiduo']; ?></td>
	</tr>
	<tr>
		<td>frequento quasi esclusivamente spazi sociali e associazioni, ma non prendo mai o quasi mai parte all'organizzazione</td>
		<td><?php echo $counts['tipoutente']['esclusivo']; ?></td>
	</tr>
	<tr>
		<td>frequento quasi esclusivamente spazi sociali e associazioni e prendo (spesso o a volte) parte all'organizzazione delle attivit&agrave;</td>
		<td><?php echo $counts['tipoutente']['organizzatore']; ?></td>
	</tr>
</table>

<table>
	<caption>In che modo vieni informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</caption>
<?php 
	printCountRow($counts, 'attraverso il sito web dello spazio','modo','sito');
	printCountRow($counts, 'attraverso la pagina facebook dello spazio sociale','modo','facebook');
	printCountRow($counts, 'attraverso siti generici di eventi','modo','web');
	printCountRow($counts, 'con un messaggio su internet (WhatsApp, Facebook Messenger, ...)','modo','messenger');
	printCountRow($counts, 'via e-mail','modo','mail');
	printCountRow($counts, 'con degli SMS','modo','sms');
	printCountRow($counts, 'con una brochure cartacea','modo','brochure');
	printCountRow($counts, 'attraverso un calendario esposto in sede','modo','calendario');
	printCountRow($counts, 'con una brochure cartacea','modo','brochure');
	printCountRow($counts, 'con il passaparola','modo','passaparola');
	printCountRow($counts, 'altro','modo','altro');
?> 
</table>

<table>
	<caption>Come preferiresti essere informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</caption>
<?php 
	printCountRow($counts, 'attraverso il sito web dello spazio','mododesiderata','sito');
	printCountRow($counts, 'attraverso la pagina facebook dello spazio sociale','mododesiderata','facebook');
	printCountRow($counts, 'attraverso siti generici di eventi','mododesiderata','web');
	printCountRow($counts, 'con un messaggio su internet (WhatsApp, Facebook Messenger, ...)','mododesiderata','messenger');
	printCountRow($counts, 'via e-mail','mododesiderata','mail');
	printCountRow($counts, 'con degli SMS','mododesiderata','sms');
	printCountRow($counts, 'con una brochure cartacea','mododesiderata','brochure');
	printCountRow($counts, 'attraverso un calendario esposto in sede','mododesiderata','calendario');
	printCountRow($counts, 'con una brochure cartacea','mododesiderata','brochure');
	printCountRow($counts, 'altro','mododesiderata','altro');
?> 
</table>

<table>
	<caption>Con quanto preavviso ti piacerebbe essere informato di eventi e attvit&agrave;?</caption>
<?php 
	printCountRow($counts, 'anche il giorno stesso va bene','preavviso','giornaliero');
	printCountRow($counts, 'almeno una settimana prima','preavviso','settimanale');
	printCountRow($counts, 'almeno un mese prima','preavviso','mensile');
?>
</table>

</body>
</html>
