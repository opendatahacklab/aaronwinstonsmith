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
	/**
	 * return a comma-separated list of values of checked values of a checkbox.
	 */
	function splitCheckbox($fieldName){
		if (!(isset($_POST[$fieldName])))
  			return '';
		$r='';
		$l=count($_POST[$fieldName]);
		for($i=0; $i<$l-1; $i++)
			$r.=$_POST($fieldName)[$i].',';
		if ($l>0)
			$r.=$_POST($fieldName)[$i];
		return $r;
	}
	$f=fopen("risultati.tsv","a");
	if (!$f){
		echo "Impossibile aprire il file";
		die();
	}
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