<?php
/*
 * 
 * 	Script qui permet d'envoyer un mail dans le cas o� de nouveaux commentaires ont �t� ajout�
 * dans la base et que ceux-ci ne sont pas encore valid�s par l'administrateur.
 * 
 * 
 * ATTENTION MANQUE:
 * 	- L'URL VERS LA PAGE DE CONNEXION
 * 	- L'ADRESSE MAIL DE JEAN-LOUIS
 * 
 */

//inclusion de la connexion a la base et la classe base de donn�es
include 'global_config.php';
include 'modeles/bdd.class.php';

// Initialisation class bdd
$bdd = new BDD();

// On cherche le nombre de commentaires
$commentaires = $bdd->select("SELECT commmentaire, valide FROM Livreor WHERE valide=0;");

if(count($commentaires)!=0){
	$subject="Commentaires non-valid�s";
	// Headers
	$headers = 'From: Salon d\'Eugenie <serveur.messagerie@salondeugenie.com>'."\n";
	$headers .= 'Content-Type: text/html;'."\n";
	$headers .= "MIME-Version:1.0\n";
	$headers .= "\n";
	
	$msg='<p>
			Des commentaires ont �t� ajout�s dans le livre d\'or, vous devez les valider avant qu\'ils ne soient diffus� sur le site.
			<br/>
			Pour cela connectez vous sur le site et validez les � cette adresse :
			<br/><br/>
			<a href="'.queries("administrateur", "menu", array()).'" class="centrer">Salon d\'eugenie - Connexion</a>
			<br/><br/>
			Ceci est un mail automatique, merci de ne pas y r�pondre
		  </p>';
	
	
	mail('####', $subject, $msg, $headers);
}