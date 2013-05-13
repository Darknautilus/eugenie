<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  $async = true;
else
  $async = false;

// Variable d'erreurs
$errors= array();

// Cr�ation de la classe bse de donnee
$bdd = new BDD();

/*
 * Insertion du commentaire dans la base de donn�es en indiquant que celui-ci est non-valide
 * 
 */
if(isset($_POST['commentaire'])){
	// on verifie que le commentaire ne soit pas sup�rieur � 250 et inf�rieur � 0
	if(strlen($_POST['commentaire']) >250 || strlen(trim($_POST['commentaire']))==0)
		$errors[]="Commentaire sup�rieur � 250 caract�res ou avec 0 caract�res .";
	else{
		// insertion dans la base
		$participation = $bdd->insert("livreOr", array("commentaire" => $_POST['commentaire'], "valide"=>0));
		if(!$participation) {
			$errors[] = "Erreur insertion : LivreOr";
		}
	}
}


/*
 * 
 * On r�cup�re tous les commentaires valid�s pour les mettre dans un tableau
 * 
 */
$commentaires = $bdd->select("SELECT commentaire FROM livreor WHERE valide=1;");

	echo $twig->render("index_livredor.html", array("async" => $async, "errors" => $errors, "commentaires"=>$commentaires));
