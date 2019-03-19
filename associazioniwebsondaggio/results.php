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

			*.sat{
				background-color : #333333;
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

	/*
	 * this is a map which associates to each value in the mode field the corresponding desiderata field in the csv (note that the mode field is a single field with the 
	 * value expressed as string whereas for each possible desiderata there is a specific field which can be valued with 'y' or empty).
	 */
	$modeToDesiderata=array();
	$modeToDesiderata['sito']=4;
	$modeToDesiderata['facebook']=5;
	$modeToDesiderata['web']=6;
	$modeToDesiderata['messenger']=7;
	$modeToDesiderata['mail']=8;
	$modeToDesiderata['sms']=9;
	$modeToDesiderata['brochure']=10;
	$modeToDesiderata['calendario']=11;
	$modeToDesiderata['altro']=12;
	$modeToDesiderata['passaparola']=-1;

	//count the "satisfied" users
	$countSat=0;

	$counts=array();
	$counts['tipoutente']['no']=0;
	$counts['tipoutente']['saltuario']=0;
	$counts['tipoutente']['assiduo']=0;
	$counts['tipoutente']['esclusivo']=0;
	$counts['tipoutente']['organizzatore']=0;
	$counts['tipoutente']['']=0;
	
	$modoaltro=array();
	$mododesiderataaltro=array();

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

	initModo($counts,'modo');
	initModo($counts,'mododesiderata');
	initPerType($counts,'preavviso','giornaliero');
	initPerType($counts,'preavviso','settimanale');
	initPerType($counts,'preavviso','mensile');
	initPerType($counts,'preavviso','');
	
	initPerType($counts,'sitoweb','molto');
	initPerType($counts,'sitoweb','abbastanza');
	initPerType($counts,'sitoweb','no');
	initPerType($counts,'sitoweb','nointernet');
	initPerType($counts,'sitoweb','');


	/**
	 * Process a mododesiderata field, return the string represnting that the option was checked.
         */
	function processDesiderata($key, $value, $userType, & $counts, $modo, & $countSat){
		if ($value==='y'){
			$counts['mododesiderata'][$key][$userType]++;
			$counts['mododesiderata'][$key]['tot']++;
			if ($modo==$key){
				$countSat++;
				return 'class="checked sat"';
			}
			else return 'class="checked"';
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
	function printSingle($n, $result, & $counts, & $modoaltro, & $mododesiderataaltro, & $countSat){
		global $modeToDesiderata;
		$counts['tipoutente'][$result[1]]++;
		$counts['modo'][$result[2]][$result[1]]++;
		$counts['modo'][$result[2]]['tot']++;
		$counts['preavviso'][$result[13]][$result[1]]++;
		$counts['preavviso'][$result[13]]['tot']++;
       		$counts['sitoweb'][$result[14]][$result[1]]++;
		$counts['sitoweb'][$result[14]]['tot']++;
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
			<li 
			<?php 
				if ($result[2]==='altro' && isset($result[3])){
					$x=trim($result[3]); 
					if ($x!=''){
						echo "class=\"checked\">Altro:$result[3]</li>\n";
						$modoaltro[count($modoaltro)]=$result[3];
					}
				} else
					echo ">Altro:</li>\n";
			?> 
		</ul>
		<h3>Come preferiresti essere informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</h3>
		<ul>
    			<li <?=processDesiderata('sito', $result[$modeToDesiderata['sito']], $result[1], $counts, $result[2], $countSat);?> >attraverso il sito web dello spazio</li>
			<li <?=processDesiderata('facebook', $result[$modeToDesiderata['facebook']], $result[1], $counts, $result[2], $countSat);?> >attraverso la pagina facebook dello spazio sociale</li>
			<li <?=processDesiderata('web', $result[$modeToDesiderata['web']], $result[1], $counts, $result[2], $countSat);?> >attraverso siti generici di eventi</li>
			<li <?=processDesiderata('messenger', $result[$modeToDesiderata['messenger']], $result[1], $counts, $result[2], $countSat);?> >con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</li>
			<li <?=processDesiderata('mail', $result[$modeToDesiderata['mail']], $result[1], $counts, $result[2], $countSat);?> >via e-mail</li>
			<li <?=processDesiderata('sms', $result[$modeToDesiderata['sms']], $result[1], $counts, $result[2], $countSat);?> >con degli SMS</li>
			<li <?=processDesiderata('brochure', $result[$modeToDesiderata['brochure']], $result[1], $counts, $result[2], $countSat);?> >con una brochure cartacea</li>
			<li <?=processDesiderata('calendario', $result[$modeToDesiderata['calendario']], $result[1], $counts, $result[2], $countSat);?> >attraverso un calendario esposto in sede</li>
			<li <?php if (!(empty($result[$modeToDesiderata['altro']]))){ 	
				$counts['mododesiderata']['altro'][$result[1]]++; 
				$counts['mododesiderata']['altro']['tot']++; echo 'class="checked"';
				$mododesiderataaltro[count($mododesiderataaltro)]=$result[12];
			} ?> >Altro: <?=$result[12];?></li>
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

function printArray($a){
	echo "\t<ul>\n";
	foreach($a as $v)
		echo "\t\t<li>$v</li>\n";
	echo "\t</ul>\n";	
}
	$handle = fopen('risultati.tsv', 'r') or die('Unable to open file');
	$i=1;
	//skip header
	fgetcsv($handle, 4096, "\t");
	//parse lines
	while (!feof($handle)) {
		$data = fgetcsv($handle, 4096, "\t");
	        printSingle($i,$data,$counts,$modoaltro,$mododesiderataaltro, $countSat); 
        	$i++;
    	}
	fclose($handle);
?>

<section>
<h2 id="aggregates">Risultati Aggregati</h2>

<p>In questa sezione vengono riportati i risultati aggregati delle risposte ai vari quesiti del questionario. </p>

<p>La prima domanda del questionario
serve a capire il posizionamento di chi compila il questionario rispetto agli spazi sociali e alle attivit&agrave; aggregative. I profili rappresentati
individuano variano da persone che non hanno alcun contatto con gli spazi sociali fino a chi ne &egrave; pienamente coinvolto.  In seguito
i vari gradi di coinvolgimento verranno indicati da 0 (nessun coinvolgimento) a 4 (pienamente coinvolto). Nell'ultima colonna viene riportato il numero
di utenti che hanno dato la risposta corrispondente.</p>

<table>
	<caption>In che rapporto sei con le associazioni e gli spazi sociali?</caption>
	<tr>
		<th>0</th>
		<td>non li frequento</td>
		<td><?php echo $counts['tipoutente']['no']; ?></td>
	</tr>
	<tr>
		<th>1</th>
		<td>li frequento saltuariamente</td>
		<td><?php echo $counts['tipoutente']['saltuario']; ?></td>
	</tr>
	<tr>
		<th>2</th>
		<td>frequento spazi del genere regolarmente, ma allo stesso modo frequento locali e pub a vocazione commerciale</td>
		<td><?php echo $counts['tipoutente']['assiduo']; ?></td>
	</tr>
	<tr>
		<th>3</th>
		<td>frequento quasi esclusivamente spazi sociali e associazioni, ma non prendo mai o quasi mai parte all'organizzazione</td>
		<td><?php echo $counts['tipoutente']['esclusivo']; ?></td>
	</tr>
	<tr>
		<th>4</th>
		<td>frequento quasi esclusivamente spazi sociali e associazioni e prendo (spesso o a volte) parte all'organizzazione delle attivit&agrave;</td>
		<td><?php echo $counts['tipoutente']['organizzatore']; ?></td>
	</tr>
</table>

<p>Nelle seguenti tabelle vengono riportati i dati sulle risposte ai restati quesiti, aggregati per tipologia di utente (da 0 per indicare nessun 
coinvolgimento nelle attivit&agrave; degli spazi sociali a 4 per indicare un alto coinvolgimento) e i valori totali.</p>
<table>
	<caption>In che modo vieni informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</caption>
	<tr>
		<th />
		<th>0</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>Tot</th>
	</tr>
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
<p>Seguono le risposte che gli utenti hanno indicato scegliendo l'opzione <em>Altro</em></p>
<?php printArray($modoaltro); ?>

<table>
	<caption>Come preferiresti essere informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</caption>
	<tr>
		<th />
		<th>0</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>Tot</th>
	</tr>
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

<p>Seguono le risposte che gli utenti hanno indicato scegliendo l'opzione <em>Altro</em></p>
<?php printArray($mododesiderataaltro); ?>

<table>
	<caption>Con quanto preavviso ti piacerebbe essere informato di eventi e attvit&agrave;?</caption>
	<tr>
		<th />
		<th>0</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>Tot</th>
	</tr>
<?php 
	printCountRow($counts, 'anche il giorno stesso va bene','preavviso','giornaliero');
	printCountRow($counts, 'almeno una settimana prima','preavviso','settimanale');
	printCountRow($counts, 'almeno un mese prima','preavviso','mensile');
?>
</table>

<table>
	<caption>Quanto &egrave; importante che una organizzazione abbia un 
				proprio sito con un proprio nome di dominio (ad esempio www.miapiccolaassociazione.it)?</caption>
	<tr>
		<th />
		<th>0</th>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>Tot</th>
	</tr>
<?php
	printCountRow($counts, '&egrave; fondamentale','sitoweb','molto');
	printCountRow($counts, '&egrave; opportuno ma pu&ograve; andare bene anche una pagina su una piattaforma esterna (ad esempio una pagina facebook)','sitoweb','abbastanza');
	printCountRow($counts, 'non &egrave; necessario, &egrave; sufficiente; una pagina su una piattaforma esterna (ad esempio una pagina facebook)','sitoweb','no');
	printCountRow($counts, 'non &egrave; necessario essere presenti su internet','sitoweb','nointernet');
?>
</table>

Soddisfatti <?=$countSat?>
</section>
</body>
</html>
