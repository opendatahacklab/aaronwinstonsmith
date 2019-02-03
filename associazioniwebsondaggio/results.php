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

$counts=array();
$counts['tipoutente']['no']=0;
$counts['tipoutente']['saltuario']=0;
$counts['tipoutente']['assiduo']=0;
$counts['tipoutente']['esclusivo']=0;
$counts['tipoutente']['organizzatore']=0;
$counts['tipoutente']['']=0;

$counts['modo']['sito']['no']=0;
$counts['modo']['sito']['saltuario']=0;
$counts['modo']['sito']['assiduo']=0;
$counts['modo']['sito']['esclusivo']=0;
$counts['modo']['sito']['organizzatore']=0;
$counts['modo']['sito']['']=0;
$counts['modo']['sito']['tot']=0;
$counts['modo']['facebook']['no']=0;
$counts['modo']['facebook']['saltuario']=0;
$counts['modo']['facebook']['assiduo']=0;
$counts['modo']['facebook']['esclusivo']=0;
$counts['modo']['facebook']['organizzatore']=0;
$counts['modo']['facebook']['']=0;
$counts['modo']['facebook']['tot']=0;
$counts['modo']['web']['no']=0;
$counts['modo']['web']['saltuario']=0;
$counts['modo']['web']['assiduo']=0;
$counts['modo']['web']['esclusivo']=0;
$counts['modo']['web']['organizzatore']=0;
$counts['modo']['web']['']=0;
$counts['modo']['web']['tot']=0;
$counts['modo']['messenger']['no']=0;
$counts['modo']['messenger']['saltuario']=0;
$counts['modo']['messenger']['assiduo']=0;
$counts['modo']['messenger']['esclusivo']=0;
$counts['modo']['messenger']['organizzatore']=0;
$counts['modo']['messenger']['']=0;
$counts['modo']['messenger']['tot']=0;
$counts['modo']['mail']['no']=0;
$counts['modo']['mail']['saltuario']=0;
$counts['modo']['mail']['assiduo']=0;
$counts['modo']['mail']['esclusivo']=0;
$counts['modo']['mail']['organizzatore']=0;
$counts['modo']['mail']['']=0;
$counts['modo']['mail']['tot']=0;
$counts['modo']['sms']['no']=0;
$counts['modo']['sms']['saltuario']=0;
$counts['modo']['sms']['assiduo']=0;
$counts['modo']['sms']['esclusivo']=0;
$counts['modo']['sms']['organizzatore']=0;
$counts['modo']['sms']['']=0;
$counts['modo']['sms']['tot']=0;
$counts['modo']['brochure']['no']=0;
$counts['modo']['brochure']['saltuario']=0;
$counts['modo']['brochure']['assiduo']=0;
$counts['modo']['brochure']['esclusivo']=0;
$counts['modo']['brochure']['organizzatore']=0;
$counts['modo']['brochure']['']=0;
$counts['modo']['brochure']['tot']=0;
$counts['modo']['calendario']['no']=0;
$counts['modo']['calendario']['saltuario']=0;
$counts['modo']['calendario']['assiduo']=0;
$counts['modo']['calendario']['esclusivo']=0;
$counts['modo']['calendario']['organizzatore']=0;
$counts['modo']['calendario']['']=0;
$counts['modo']['calendario']['tot']=0;
$counts['modo']['passaparola']['no']=0;
$counts['modo']['passaparola']['saltuario']=0;
$counts['modo']['passaparola']['assiduo']=0;
$counts['modo']['passaparola']['esclusivo']=0;
$counts['modo']['passaparola']['organizzatore']=0;
$counts['modo']['passaparola']['']=0;
$counts['modo']['passaparola']['tot']=0;
$counts['modo']['altro']['no']=0;
$counts['modo']['altro']['saltuario']=0;
$counts['modo']['altro']['assiduo']=0;
$counts['modo']['altro']['esclusivo']=0;
$counts['modo']['altro']['organizzatore']=0;
$counts['modo']['altro']['']=0;
$counts['modo']['altro']['tot']=0;
$counts['modo']['']['no']=0;
$counts['modo']['']['saltuario']=0;
$counts['modo']['']['assiduo']=0;
$counts['modo']['']['esclusivo']=0;
$counts['modo']['']['organizzatore']=0;
$counts['modo']['']['']=0;
$counts['modo']['']['tot']=0;


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
	<tr>
		<td>attraverso il sito web dello spazio</td>
		<td><?=$counts['modo']['sito']['no'];?></td>
		<td><?=$counts['modo']['sito']['saltuario'];?></td>
		<td><?=$counts['modo']['sito']['assiduo'];?></td>
		<td><?=$counts['modo']['sito']['esclusivo'];?></td>
		<td><?=$counts['modo']['sito']['organizzatore'];?></td>
		<td><?=$counts['modo']['sito']['tot'];?></td>
	</tr>
	<tr>
		<td>attraverso la pagina facebook dello spazio sociale</td>
		<td><?=$counts['modo']['facebook']['no'];?></td>
		<td><?=$counts['modo']['facebook']['saltuario'];?></td>
		<td><?=$counts['modo']['facebook']['assiduo'];?></td>
		<td><?=$counts['modo']['facebook']['esclusivo'];?></td>
		<td><?=$counts['modo']['facebook']['organizzatore'];?></td>
		<td><?=$counts['modo']['facebook']['tot'];?></td>
	</tr>
	<tr>
		<td>attraverso siti generici di eventi</td>
		<td><?=$counts['modo']['web']['no'];?></td>
		<td><?=$counts['modo']['web']['saltuario'];?></td>
		<td><?=$counts['modo']['web']['assiduo'];?></td>
		<td><?=$counts['modo']['web']['esclusivo'];?></td>
		<td><?=$counts['modo']['web']['organizzatore'];?></td>
		<td><?=$counts['modo']['web']['tot'];?></td>
	</tr>
	<tr>
		<td>con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</td>
		<td><?=$counts['modo']['messenger']['no'];?></td>
		<td><?=$counts['modo']['messenger']['saltuario'];?></td>
		<td><?=$counts['modo']['messenger']['assiduo'];?></td>
		<td><?=$counts['modo']['messenger']['esclusivo'];?></td>
		<td><?=$counts['modo']['messenger']['organizzatore'];?></td>
		<td><?=$counts['modo']['messenger']['tot'];?></td>
	</tr>
	<tr>
		<td>via e-mail</td>
		<td><?=$counts['modo']['mail']['no'];?></td>
		<td><?=$counts['modo']['mail']['saltuario'];?></td>
		<td><?=$counts['modo']['mail']['assiduo'];?></td>
		<td><?=$counts['modo']['mail']['esclusivo'];?></td>
		<td><?=$counts['modo']['mail']['organizzatore'];?></td>
		<td><?=$counts['modo']['mail']['tot'];?></td>
	</tr>
	<tr>
		<td>con degli SMS</td>
		<td><?=$counts['modo']['sms']['no'];?></td>
		<td><?=$counts['modo']['sms']['saltuario'];?></td>
		<td><?=$counts['modo']['sms']['assiduo'];?></td>
		<td><?=$counts['modo']['sms']['esclusivo'];?></td>
		<td><?=$counts['modo']['sms']['organizzatore'];?></td>
		<td><?=$counts['modo']['sms']['tot'];?></td>
	</tr>
	<tr>
		<td>con una brochure cartacea</td>
		<td><?=$counts['modo']['brochure']['no'];?></td>
		<td><?=$counts['modo']['brochure']['saltuario'];?></td>
		<td><?=$counts['modo']['brochure']['assiduo'];?></td>
		<td><?=$counts['modo']['brochure']['esclusivo'];?></td>
		<td><?=$counts['modo']['brochure']['organizzatore'];?></td>
		<td><?=$counts['modo']['brochure']['tot'];?></td>
	</tr>
	<tr>
		<td>attraverso un calendario esposto in sede</td>
		<td><?=$counts['modo']['calendario']['no'];?></td>
		<td><?=$counts['modo']['calendario']['saltuario'];?></td>
		<td><?=$counts['modo']['calendario']['assiduo'];?></td>
		<td><?=$counts['modo']['calendario']['esclusivo'];?></td>
		<td><?=$counts['modo']['calendario']['organizzatore'];?></td>
		<td><?=$counts['modo']['calendario']['tot'];?></td>
	</tr>
	<tr>
		<td>con il passaparola</td>
		<td><?=$counts['modo']['passaparola']['no'];?></td>
		<td><?=$counts['modo']['passaparola']['saltuario'];?></td>
		<td><?=$counts['modo']['passaparola']['assiduo'];?></td>
		<td><?=$counts['modo']['passaparola']['esclusivo'];?></td>
		<td><?=$counts['modo']['passaparola']['organizzatore'];?></td>
		<td><?=$counts['modo']['passaparola']['tot'];?></td>
	</tr>
	<tr>
		<td>altro</td>
		<td><?=$counts['modo']['altro']['no'];?></td>
		<td><?=$counts['modo']['altro']['saltuario'];?></td>
		<td><?=$counts['modo']['altro']['assiduo'];?></td>
		<td><?=$counts['modo']['altro']['esclusivo'];?></td>
		<td><?=$counts['modo']['altro']['organizzatore'];?></td>
		<td><?=$counts['modo']['altro']['tot'];?></td>
	</tr>
</table>
</body>
</html>
