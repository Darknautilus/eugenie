<?php

if(isset($_POST["filled"]) && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	$bdd = new BDD();
	$idCom = $_POST["idCom"];
	if($_POST["action"] == "approve") {
		// Cas d'une approvation
		$resUpdate = $bdd->update("LivreOr", array("valide" => 1), array("idComm" => $idCom));
		echo json_encode(array("idCom" => $idCom, "result" => $resUpdate, "action" => $_POST["action"]));
	}
	else if($_POST["action"] == "delete") {
		// Cas d'une suppression
	  $resDelete = $bdd->delete("LivreOr", array("idComm" => $idCom));
	  echo json_encode(array("idCom" => $idCom, "result" => $resDelete, "action" => $_POST["action"]));
	}
}