<?php


// Initialisation class bdd
$bdd = new BDD();

// On cherche le nombre de commentaires
$commentaires = $bdd->select("SELECT idComm, commentaire, valide FROM livreor WHERE valide=0;");


echo $twig->render("administrateur_validation_commentaires.html", array("commentaires"=>$commentaires));