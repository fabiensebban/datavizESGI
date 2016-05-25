<?php
	// Connexion à la BDD
	include("../bdd/connexion_bdd.php");
	
	$i = 1;
	$response = [];

	while($i <= 7)
	{
		$query = "
					SELECT COUNT(*) FROM transactions 
					WHERE month(date) = 0" . $i. "
				";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		$result_request = array();

		array_push($response, (int)$row[0]);
		
		mysqli_free_result($result);

		$i++;
	}

	// Déconnexion de la BDD
	include("../bdd/deconnexion_bdd.php");
	
	echo json_encode($response);
?>