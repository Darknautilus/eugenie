<?php
/*
 * 
 * 	Script qui permet d'envoyer un mail dans le cas où de nouveaux commentaires ont été ajouté
 * dans la base et que ceux-ci ne sont pas encore validés par l'administrateur.
 * 
 * 
 * ATTENTION MANQUE:
 * 	- L'URL VERS LA PAGE DE CONNEXION
 * 	- L'ADRESSE MAIL DE JEAN-LOUIS
 * 
 */

//inclusion de la connexion a la base et la classe base de données
include 'global_config.php';
include 'modeles/bdd.class.php';

// Initialisation class bdd
$bdd = new BDD();

// On cherche le nombre de commentaires
$commentaires = $bdd->select("SELECT commmentaire, valide FROM Livreor WHERE valide=0;");

if(count($commentaires)!=0){
	$subject="Commentaires non-validés";
	// Headers
	$headers = 'From: Salon d\'Eugenie <serveur.messagerie@salondeugenie.com>'."\n";
	$headers .= 'Content-Type: text/html;'."\n";
	$headers .= "MIME-Version:1.0\n";
	$headers .= "\n";
	
	$msg='<p>
			Des commentaires ont été ajoutés dans le livre d\'or, vous devez les valider avant qu\'ils ne soient diffusé sur le site.
			<br/>
			Pour cela connectez vous sur le site et validez les à cette adresse :
			<br/><br/>
			<a href="#######" class="centrer">Salon d\'eugenie - Connexion</a>
			<br/><br/>
			Ceci est un mail automatique, merci de ne pas y répondre
		  </p>';
	
	
	mail('####', $subject, $msg, $headers);
}