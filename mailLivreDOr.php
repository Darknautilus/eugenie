<?php

$bdd = new BDD();

$commentaires = $bdd->select("SELECT commmentaire, valide FROM Livreor WHERE valide=0;");

if(count($commentaires)!=0){
	
}