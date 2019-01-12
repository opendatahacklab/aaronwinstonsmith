<?php
	/**
	 * Download live results.
	 */
	require("dbConfig.php");
	$db = new mysqli("127.0.0.1",$username, $password, $database);
	echo("ERRORE ".mysqli_error($db));
	$result=$db->query("select created, ".
		"tipoutente, ".
		"modo, ".
		"modoaltro, ".
		"mododesiderata, ".
		"mododesiderataaltro, ".
		"preavviso, ".
		"sitoweb, ".
		"libero ".
		"from web_associazioni_sondaggio");
	if ($result===FALSE) 
		echo("ERRORE ".mysqli_error($db));

	echo 0;
	printf("created\ttipoutente\tmodo,\tmodoaltro\tmododesiderata\tmododesiderataaltro\tpreavviso\tsitoweb\tlibero\n");
	echo 1;
	while ($row = $result->fetch_assoc()) {
		echo 2;
		//printf ("%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\n", $row['created'], $row['tipoutente'], $row['modo'], $row['modoaltro'],$row['mododesiderata'],
		//	$row['mododesiderataaltro'], $row['preavviso'], $row['sitoweb'], $row['libero']);
	}
	echo 3;
	$db->close();
?>