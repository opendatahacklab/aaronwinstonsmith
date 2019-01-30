<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Aaron Winston Smith - web e associazioni culturali - risultati </title>
		 <meta charset="UTF-8" /> 
		 <link rel="stylesheet" type="text/css" href="../aws.css" />
	</head>
	<body>
		<h1>Risultati del Sondaggio Web e Associazioni Culturali </h1> 
		<p>Cari Amici, qui &egrave; Winston dal ciberspazio. Oggi vi trascino nel vortice del commercio, perch&egrave; non di solo pane vive l'uomo ma qualche dolcino ogni tanto scalda il cuore.
		Se vorrete regalarmi un piccolo frammento di informazione compilandolo ve ne sar&ograve; grato.</p>

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
			<fieldset>
				<legend>In che rapporto sei con le associazioni e gli spazi sociali?</legend>
				<div><label><input type="radio" name="tipoutente<?=$n;?>" value="no" <?php if ($result[1]==='no') echo 'checked';?> disabled />non li frequento</label></div>
				<div><label><input type="radio" name="tipoutente<?=$n;?>" value="saltuario" <?php if ($result[1]==='saltuario') echo 'checked';?> disabled />li frequento saltuariamente</label></div>
				<div><label><input type="radio" name="tipoutente<?=$n;?>" value="assiduo" <?php if ($result[1]==='assiduo') echo 'checked';?> disabled />frequento spazi del genere regolarmente, ma allo stesso modo frequento locali e pub a vocazione commerciale</label></div>
				<div><label><input type="radio" name="tipoutente<?=$n;?>" value="esclusivo" <?php if ($result[1]==='esclusivo') echo 'checked';?> disabled />frequento quasi esclusivamente spazi sociali e associazioni, ma non prendo mai o quasi mai parte all'organizzazione</label></div>
				<div><label><input type="radio" name="tipoutente<?=$n;?>" value="organizzatore" <?php if ($result[1]==='organizzatore') echo 'checked';?> disabled />frequento quasi esclusivamente spazi sociali e associazioni e prendo (spesso o a volte) parte all'organizzazione delle attivit&agrave;</label></div>
			</fieldset>

			<fieldset onclick="handleChange('modoaltrocontroller','modoaltrotext')">
				<legend>In che modo vieni informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</legend>
				<div><label><input type="radio" name="modo<?=$n;?>" value="sito" <?php if ($result[2]==='sito') echo 'checked';?> disabled />attraverso il sito web dello spazio</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="facebook" <?php if ($result[2]==='facebook') echo 'checked';?> disabled />attraverso la pagina facebook dello spazio sociale</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="web" <?php if ($result[2]==='web') echo 'checked';?> disabled />attraverso siti generici di eventi</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="messenger" <?php if ($result[2]==='messenger') echo 'checked';?> disabled />con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="mail" <?php if ($result[2]==='mail') echo 'checked';?> disabled />via e-mail</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="sms" <?php if ($result[2]==='sms') echo 'checked';?> disabled />con degli SMS</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="brochure" <?php if ($result[2]==='brochure') echo 'checked';?> disabled />con una brochure cartacea</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="calendario" <?php if ($result[2]==='calendario') echo 'checked';?> disabled />attraverso un calendario esposto in sede</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" value="passaparola" <?php if ($result[2]==='passaparola') echo 'checked';?> disabled />con il passaparola</label></div>
				<div><label><input type="radio" name="modo<?=$n;?>" id="modoaltrocontroller" value="altro" <?php if ($result[2]==='altro') echo 'checked';?> disabled />Altro</label></div>
				<div class="centeredinputcontainer"><textarea name="modoaltro<?=$n;?>" id="modoaltrotext"  disabled rows="3" cols="15"><?=$result[3];?></textarea></div>
			</fieldset>

			<fieldset>
				<legend>Come preferiresti essere informato di eventi e attivit&agrave; che potrebbero interessarti negli spazi che frequenti?</legend>
				<div><label><input type="checkbox" name="mododesideratasito<?=$n;?>" <?php if ($result[4]==='y') echo 'checked';?> disabled />attraverso il sito web dello spazio</label></div>
				<div><label><input type="checkbox" name="mododesideratafacebook<?=$n;?>" <?php if ($result[5]==='y') echo 'checked';?> disabled />attraverso la pagina facebook dello spazio sociale</label></div>
				<div><label><input type="checkbox" name="mododesiderataweb<?=$n;?>" <?php if ($result[6]==='y') echo 'checked';?> disabled />attraverso siti generici di eventi</label></div>
				<div><label><input type="checkbox" name="mododesideratamessenger<?=$n;?>" <?php if ($result[7]==='y') echo 'checked';?> disabled />con un messaggio su internet (WhatsApp, Facebook Messenger, ...)</label></div>
				<div><label><input type="checkbox" name="mododesideratamail<?=$n;?>" <?php if ($result[8]==='y') echo 'checked';?> disabled />via e-mail</label></div>
				<div><label><input type="checkbox" name="mododesideratasms<?=$n;?>" <?php if ($result[9]==='y') echo 'checked';?> disabled />con degli SMS</label></div>
				<div><label><input type="checkbox" name="mododesideratabrochure<?=$n;?>" <?php if ($result[10]==='y') echo 'checked';?> disabled />con una brochure cartacea</label></div>
				<div><label><input type="checkbox" name="mododesideratacalendario<?=$n;?>" <?php if ($result[11]==='y') echo 'checked';?> disabled />attraverso un calendario esposto in sede</label></div>
				<div><label><input type="checkbox" name="mododesiderataaltro<?=$n;?>" id="mododesiderataaltrocontroller" disabled onclick="handleChange('mododesiderataaltrocontroller','mododesiderataaltrotext')" />Altro</label></div>
				<div class="centeredinputcontainer"><textarea name="mododesiderataaltrotext<?=$n;?>" id="mododesiderataaltrotext"  disabled rows="3" cols="15"><?=$result[12];?></textarea></div>				
			</fieldset>

			<fieldset>
				<legend>Con quanto preavviso ti piacerebbe essere informato di eventi e attvit&agrave;?</legend>
				<div><label><input type="radio" name="preavviso" value="giornaliero"/>anche il giorno stesso va bene</label></div>
				<div><label><input type="radio" name="preavviso" value="settimanale"/>almeno una settimana prima</label></div>
				<div><label><input type="radio" name="preavviso" value="mensile"/>almeno un mese prima</label></div>
			</fieldset>

			<fieldset>
				<legend>Quanto &egrave; importante che una organizzazione abbia un 
				proprio sito con un proprio nome di dominio (ad esempio www.miapiccolaassociazione.it)?</legend>
				<div><label><input type="radio" name="sitoweb" value="molto" />&egrave; fondamentale</label></div>
				<div><label><input type="radio" name="sitoweb" value="abbastanza" />&egrave; opportuno ma pu&ograve; andare bene anche una pagina su una piattaforma esterna (ad esempio una pagina facebook)</label></div>
				<div><label><input type="radio" name="sitoweb" value="no" />non &egrave; necessario, &egrave; sufficiente; una pagina su una piattaforma esterna (ad esempio una pagina facebook)</label></div>
				<div><label><input type="radio" name="sitoweb" value="nointernet" />non &egrave; necessario essere presenti su internet</label></div>
			</fieldset>

			<p>Se vuoi lascia pure un tuo pensiero.</p>
			<div class="centeredinputcontainer"><textarea name="libero" rows="3" cols="15"></textarea></div>
<?php
	}

	$handle = fopen('risultati.tsv', 'r') or die('Unable to open file');
	$i=0;
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