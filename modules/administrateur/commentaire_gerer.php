<?php

if(isset($_POST["filled"]) && isLogged()) {
  
	$bdd = new BDD();
	$idCom = $_POST["idCom"];
	if($_POST["action"] == "approve") {
		// Cas d'une approvation
		$resUpdate = $bdd->update("LivreOr", array("valide" => 1), array("idComm" => $idCom));
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
		  echo json_encode(array("idCom" => $idCom, "result" => $resUpdate, "action" => $_POST["action"]));
		else
		  header("Location:".queries("administrateur","menu",array()));
	}
	else if($_POST["action"] == "delete") {
		// Cas d'une suppression
	  $resDelete = $bdd->delete("LivreOr", array("idComm" => $idCom));
	  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
	    echo json_encode(array("idCom" => $idCom, "result" => $resDelete, "action" => $_POST["action"]));
	  else
	    header("Location:".queries("administrateur","menu",array()));
	}
}
else {
  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  {
    header("Location:".queries("","",array()));
  }
}