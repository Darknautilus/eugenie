<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  $async = true;
else
  $async = false;

echo $twig->render("main_galerie.html", array("async" => $async));