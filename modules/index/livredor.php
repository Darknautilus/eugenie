<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  $async = true;
else
  $async = false;

// Variable d'erreurs
$errors= array();

// Création de la classe bse de donnee
$bdd = new BDD();

/*
 * Insertion du commentaire dans la base de données en indiquant que celui-ci est non-valide
 * 
 */
if(isset($_POST['commentaire'])){
	// on verifie que le commentaire ne soit pas supérieur à 250 et inférieur à 0
	if(strlen($_POST['commentaire']) >250 || strlen(trim($_POST['commentaire']))==0)
		$errors[]="Commentaire supérieur à 250 caractères ou avec 0 caractères .";
	else{

		// insertion dans la base
		$participation = $bdd->insert("LivreOr", array("commentaire" => $_POST['commentaire'], "valide"=>0));
		if(!$participation) {
			$errors[] = "Erreur insertion : LivreOr";
		}
	}
}


/*
 * 
 * On récupère tous les commentaires validés pour les mettre dans un tableau
 * 
 */
$commentaires = $bdd->select("SELECT commentaire FROM livreor WHERE valide=1;");

	echo $twig->render("index_livredor.html", array("async" => $async, "errors" => $errors, "commentaires"=>$commentaires));
