<?php

if(isset($_POST["filled"]) && isset($_POST["idComm"])) {
	
	var_dump("test");
	
	if(isset($_POST["modify"])) {
		// Cas d'une modification
		if($priorite == false) {
			echo json_encode(array("result" => false, "modify" => "modified"));
		}
	}
	else {
		// Cas d'une suppression
			/*$bdd = new BDD();
			$error = "";
			$bdd->delete("livreor", array("idComm"=>$_POST["idComm"]));
			$bdd->close();
			*/
			echo json_encode(array("result" => true, "modify" => "deleted"));
		
	}
}