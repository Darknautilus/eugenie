<?php

if(isLogged())
{
  // Initialisation class bdd
  $bdd = new BDD();
  // On cherche le nombre de commentaires
  $commentaires = $bdd->select("SELECT idComm, commentaire, valide FROM LivreOr WHERE valide=0;");
  echo $twig->render("administrateur_validation_commentaires.html", array("commentaires"=>$commentaires));
}
else
{
  header("Location:".queries("administrateur", "connexion", array()));
}