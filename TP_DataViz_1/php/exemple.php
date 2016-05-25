<?php
	// Connexion à la BDD
	include("../bdd/connexion_bdd.php");
	
	$query = "
				SELECT m.nom, COUNT(*) 
				FROM voitures v, marques m 
				WHERE v.marque = m.id
				GROUP BY m.nom
			";
	$result = mysqli_query($conn, $query);
	$result_request = array();
	
	while ($row = mysqli_fetch_array($result)) {
		$result_request[] = array($row[0], intval($row[1]));
	}

	mysqli_free_result($result);
	
	// Déconnexion de la BDD
	include("../bdd/deconnexion_bdd.php");
	
	echo json_encode($result_request);
?>