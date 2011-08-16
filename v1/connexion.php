<?
// ------------------- Lignes à modifier
$host = "sql.votre_domaine.com"; // domaine (ex. : sql.developpez.com)
$user = "votre_login"; // login (souvent le login est votre domaine : developpez.com)
$pass = "votre_mot_de_passe_ici"; // votre mot de passe
$bdd = "votre_nom_base"; // le nom de votre base
// ------------------- Fin des lignes à modifier
@mysql_connect($host,$user,$pass)
   or die("Impossible de se connecter");
@mysql_select_db("$bdd")
   or die("Impossible de se connecter"); 
?>

