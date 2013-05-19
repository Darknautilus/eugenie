<?php

function majGlobals() {
  if(isset($_COOKIE["logged"])) {
    $GLOBALS["logged"] = $_COOKIE["logged"];
    $GLOBALS["membinfos"] = getCookie("membinfos");
  }
  else if(isset($_SESSION["logged"])) {
    $GLOBALS["logged"] = $_SESSION["logged"];
    $GLOBALS["membinfos"] = $_SESSION["membinfos"];
  }
  else {
    $GLOBALS["logged"] = false;
  }
}
majGlobals();

function creerCookie($name, $value) {
  if(is_array($value)) {
    $cookie = "";
    foreach ($value as $key => $field) {
      $cookie .= $key."=".$field.";;";
    }
  }
  else {
    $cookie = $value;
  }
  setcookie($name, urlencode($cookie), time()+3600*24*365);
}

function getCookie($name) {
  if(!isset($_COOKIE[$name])) {
    return false;
  }
  else if(!strpos(urldecode($_COOKIE[$name]), ";;")) {
    return urldecode($_COOKIE[$name]);
  }
  else {
    $values = array();
    $couples = explode(";;", urldecode($_COOKIE[$name]));
    foreach($couples as $couple) {
      $list = explode("=",$couple);
      if(!empty($list[0]))
        $values[$list[0]] = $list[1];
    }
    return $values;
  }  
}

function setAntispam() {
  $nb1 = rand(1, 10);
  $nb2 = rand(1, 10);
  $signes = array("+", "-", "x");
  $signe = rand(0,2);
  $_SESSION["antiSpamNb1"] = $nb1;
  $_SESSION["antiSpamNb2"] = $nb2;
  $_SESSION["antiSpamSigne"] = hash_password($signe);
  return $signes[$signe];
}
function controlAntispam($result) {
  // Signe +
  if(check_password(0, $_SESSION["antiSpamSigne"]))
  {
    return ($_SESSION["antiSpamNb1"] + $_SESSION["antiSpamNb2"]) == $result;
  }
  // Signe -
  else if(check_password(1, $_SESSION["antiSpamSigne"]))
  {
    return ($_SESSION["antiSpamNb1"] - $_SESSION["antiSpamNb2"]) == $result;
  }
  // Signe *
  else if(check_password(2, $_SESSION["antiSpamSigne"]))
  {
    return ($_SESSION["antiSpamNb1"] * $_SESSION["antiSpamNb2"]) == $result;
  }
  else
  {
    return false;
  }
}


function envoyerMail($adresseDest,$objet,$message)
{
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers .= 'From: Admin TocTOAC <moi@mail.fr>' . "\r\n";

  mail($adresseDest, "[Salon Eugénie]".$objet, $message, $headers);
}

