<?php
	include_once(dirname(__FILE__).'/twig/lib/Twig/Autoloader.php');
	
	include_once(dirname(__FILE__)."/global_functions.php");
	
	// Coupe un texte à $longueur caractères, sur les espaces, et ajoute des points de suspension...
	function tronque($chaine, $longueur = 120)
	{

		if (empty ($chaine))
		{
			return "";
		}
		elseif (strlen ($chaine) < $longueur)
		{
			return $chaine;
		}
		elseif (preg_match ("/(.{1,".$longueur."})\s./ms", $chaine, $match))
		{
			return $match [1] . "...";
		}
		else
		{
			return substr ($chaine, 0, $longueur) . "...";
		}
	}

	// Fonctions de construction d'URL
	function root() {
		return "http://".$_SERVER['SERVER_NAME'];
	}
	function templates() {
		return root()."/templates";
	}
	function css() {
		return templates()."/style";
	}
	function images() {
		return css()."/images";
	}
	function bootstrap() {
	  return templates()."/bootstrap";
	}
	function fontAwesome() {
	  return templates()."/fontAwesome";
	}
	
	function queries($module, $action, $param) {
		$query = root()."/index.php?module=".$module."&action=".$action;
		foreach($param as $key => $value) {
			$query .= "&".$key."=".$value;
		}
		return $query;
	}
	
	function getFiles($dossier) {
	  $files = array();
	  if (is_dir($dossier)) {
	    if ($dh = opendir($dossier)) {
        while (($file = readdir($dh)) !== false) {
          if(!is_dir($dossier.$file))
            $files[] = $file;
        }
        closedir($dh);
	    }
	    else {
	      return "Erreur ouverture";
	    }
	  }
	  else {
	    return "Dossier inconnu";
	  }
	  return $files;
	}
	
	function isLogged() {
		return $GLOBALS["logged"];
	}
	
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/templates');
	$twig = new Twig_Environment($loader, array('cache' => false));
	$twig->addFilter("cut", new Twig_Filter_Function("tronque"));

	// Fonction de redirection d'URL : renvoit l'URL sauvegardée précédemment (avec &redirect=true)
	$twig->addFunction("redirectURL", new Twig_Function_Function("redirectURL"));
	
	// Fonctions de construction d'URL
	$twig->addFunction("root", new Twig_Function_Function("root"));
	$twig->addFunction("templates", new Twig_Function_Function("templates"));
	$twig->addFunction("css", new Twig_Function_Function("css"));
	$twig->addFunction("images", new Twig_Function_Function("images"));
	$twig->addFunction("queries", new Twig_Function_Function("queries"));
	$twig->addFunction("bootstrap", new Twig_Function_Function("bootstrap"));
	$twig->addFunction("fontAwesome", new Twig_Function_Function("fontAwesome"));
	$twig->addFunction("getFiles", new Twig_Function_Function("getFiles"));
	$twig->addFunction("isLogged", new Twig_Function_Function("isLogged"));