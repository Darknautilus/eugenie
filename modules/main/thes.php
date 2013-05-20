<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
  $async = true;
else
  $async = false;

echo $twig->render("main_thes.html", array("async" => $async));