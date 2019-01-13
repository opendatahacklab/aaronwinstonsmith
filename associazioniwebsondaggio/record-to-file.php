<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Aaron Winston Smith - web e associazioni culturali - grazie</title>
		 <meta charset="UTF-8"> 
		 <link rel="stylesheet" type="text/css" href="../aws.css">
	<body>
		<header>
		<h1>Grazie!</h1> 
		<p><img src="../turingbig.png" alt="Alan Turing Aged 16" style="width:10em" /></p>
		</header>
<?php
	$new=!(file_exists("risultati.tsv"));
	$f=fopen("risultati.tsv","a");
	if (!$f){
		echo "Impossibile aprire il file";
		die();
	}
	if ($new)
		fwrite($f, "created\ttipoutente\tmodo\tmodoaltro\tmododesideratasito\tmododesideratafacebook\tmododesiderataweb\tmododesideratamessenger\tmododesideratamail\tmododesideratasms\tmododesideratabrochure\tmododesideratacalendario\tmododesiderataaltrotext\tpreavviso\tsitoweb\tlibero\n");

	fprintf($f, "%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\n",date('Y-m-d H:s'),$_POST['tipoutente'], $_POST['modo'], $_POST['modoaltro'], 
		$_POST['mododesideratasito'], $_POST['mododesideratafacebook'], $_POST['mododesiderataweb'], $_POST['mododesideratamessenger'], $_POST['mododesideratamail'], 
		$_POST['mododesideratasms'], $_POST['mododesideratabrochure'], $_POST['mododesideratacalendario'], $_POST['mododesiderataaltrotext'], 
		$_POST['preavviso'], $_POST['sitoweb'], $_POST['libero']);
	fclose($f);	
?>
		<p>Ovviamente qualcosa bolle in pentola. Se vuoi scrivimi pure alla mail <a href="mailto:aaronwinstonsmith@autistici.org">aaronwinstonsmith@autistici.org</a>
		oppure cerca <a href="https://www.facebook.com/aaronwinston.smith">Aaron Winston Smith</a> su Facebook.</p> 
	</body>
</html>