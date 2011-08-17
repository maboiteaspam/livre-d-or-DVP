<?php
/***********************************
 * Point d'entrée de l'applicaiton livre d'or
 *
 * Toutes les requetes passerons par ce fichier par la construction de liens adéquat
 *  AKA frontcontroller
 *
 */


/**
 * Nos premiers besoins :
 *  - régler le niveaux d'erreurs de php
 *  - charger le fichier de configuration
 *  - ouvrir la connexion à la base de données
 *  - afficher la réponse correspondant à la demande du client
 */

/**
 * Le niveau d'erreur est définit adéquatement
 */
error_reporting(E_ALL | E_STRICT);
/**
 * Les erreurs sont affichées !
 */
ini_set('display_errors', 1);

/**
 * Chargement de la configuration
 * Par une utilisation simplissime d'include nous obtenons
 * un tableau contenant notre configuration
 *
 * cf
 *      point n°5 : http://www.php.net/manual/fr/function.include.php
 *      http://www.php.net/manual/fr/function.return.php
 */
$configuration = include("configuration.php");

/**
 * connexion à la base de données,
 * en utilisant notre configuration,
 *
 * on empeche par ailleurs toute execution du script si
 * celle ci n'est pas accessible
 */
mysql_connect($configuration["host"], $configuration["login"], $configuration["password"])
            or die("Impossible de se connecter");
mysql_select_db($configuration["database"])
            or die("Impossible de se connecter");


/**
 * Notre fameux froncontroller commence ici son travail
 *
 * Notre travail est simple, récupérer la demande dans la variable vue
 * Vérifier la consistance de la demande par rapport à ce que l'on veut bien afficher,
 * Générer le contenu et l'afficher
 *
 * Dans un temps deux nous pourrons déplacer certaines informations dans la configuration.
 * Dans un temps deux nous pourrons utilsier un template
 */

/**
 * Lecture de la variable d'url vue
 * cf operateur ternaire
 * http://www.php.net/manual/fr/language.operators.comparison.php
 */
$vue = isset( $_GET["vue"] ) ? $_GET["vue"] : "";
$vue = strtolower($vue);

/**
 * Définissons les vues autorisées
 */
$vue_autorisees = array(
    "livre",
    "ecriture",
);

if( in_array($vue, $vue_autorisees) === false ){
    $vue = "livre";
}

include( $vue . ".php");


/**
 * N'oublions pas de clore notre connexion SQL, même si cela est inutile
 */
mysql_close();


?>