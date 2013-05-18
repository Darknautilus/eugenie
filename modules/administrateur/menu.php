<?php

if(isLogged())
{
  echo $twig->render("administrateur_menu.html", array());
}
else
{
  header("Location:".queries("administrateur", "connexion", array()));
}