<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  $async = true;
else
  $async = false;

// Variable d'erreurs
$errors= array();
$success = false;

// Création de la classe bse de donnee
$bdd = new BDD();

/*
 * Insertion du commentaire dans la base de données en indiquant que celui-ci est non-valide
 * 
 */
$commentaire = "";
if(isset($_POST['commentaire']))
{
  $commentaire = $_POST['commentaire'];
	// on verifie que le commentaire ne soit pas supérieur à 250 et inférieur à 0
	if(strlen($_POST['commentaire']) > 250 || strlen(trim($_POST['commentaire'])) == 0)
	{
		$errors[]="Mauvaise longueur du commentaire";
	}
	else if(!controlAntispam($_POST["antispam"]))
	{
	  $errors[] = "Erreur dans le controle anti-spam, vérifiez votre calcul s'il vous plaît.";
	}
	else
	{
		// insertion dans la base
		$participation = $bdd->insert("LivreOr", array("commentaire" => $_POST['commentaire'], "valide" => "0"));
		if(!$participation)
		{
			$errors[] = "Erreur insertion : LivreOr";
		}
		else
		{
		  $success = true;
		  $commentaire = "";
		}
	}
}

$signe = setAntispam();
$antiSpam = $_SESSION["antiSpamNb1"]." ".$signe." ".$_SESSION["antiSpamNb2"];


/*
 * 
 * On récupère tous les commentaires validés pour les mettre dans un tableau
 * 
 */
$commentaires = $bdd->select("SELECT commentaire FROM LivreOr WHERE valide = 1;");

echo $twig->render("index_livredor.html", array("async" => $async, "success" => $success, "errors" => $errors, "commentaire" => $commentaire, "commentaires"=>$commentaires, "antiSpam" => $antiSpam));
