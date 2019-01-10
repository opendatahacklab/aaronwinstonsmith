<html lang="it">
	<head>
		<title>Aaron Winston Smith - web e associazioni culturali - grazie</title>
		 <link rel="stylesheet" type="text/css" href="../aws.css">
	<body>
		<header>
		<h1>Grazie!</h1> 
		<p><img src="../turingbig.png" alt="Alan Turing Aged 16" style="width:10em" /></p>
		</header>
<?php
	require("dbConfig.php");
	$db = new mysqli("localhost",$username, $password, "agendalibera");
	$db->query("create table if not exists web_associazioni_sondaggio (".
		"created timestamp,".
		"tipoutente varchar(20),".
		"modo varchar(20),".
		"modoaltro text,".
		"mododesiderata varchar(20),".
		"mododesiderataaltro text,".
		"preavviso varchar(20),".
		"sitoweb varchar(20),".
		"libero text);");
	$db->close();
?>
		<p>Ovviamente qualcosa bolle in pentola. Se vuoi scrivimi pure alla mail <a href="mailto:aaronwinstonsmith@autistici.org">aaronwinstonsmith@autistici.org</a>
		oppure cerca <a href="https://www.facebook.com/aaronwinston.smith">Aaron Winston Smith</a> su Facebook.</p> 
	</body>
</html>