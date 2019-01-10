<?php
	/**
	 * Download live results.
	 */
	require("dbConfig.php");
	$db = new mysqli("localhost",$username, $password, $database);
	$result=$db->query("select created, ".
		"tipoutente, ".
		"modo, ".
		"modoaltro, ".
		"mododesiderata, ".
		"mododesiderataaltro, ".
		"preavviso, ".
		"sitoweb, ".
		"libero ".
		"from web_associazioni_sondaggio") or die(mysqli_error($db));

	printf("created\ttipoutente\tmodo,\tmodoaltro\tmododesiderata\tmododesiderataaltro\tpreavviso\tsitoweb\tlibero\n");
	while ($row = $result->fetch_assoc()) {
		printf ("%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\n", $row['created'], $row['tipoutente'], $row['modo'], $row['modoaltro'],$row['mododesiderata'],
			$row['mododesiderataaltro'], $row['preavviso'], $row['sitoweb'], $row['libero']);
	}

//	for($i = 0; $i < $result; $i++) {
 //   		$field_info = mysql_fetch_field($result, $i);
  //  		echo "$field_info->name;";
	// }

	$db->close();
?>