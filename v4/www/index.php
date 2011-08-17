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
 *  - définir le répertoire base de notre application
 *  - régler le niveaux d'erreurs de php
 *  - charger le fichier de configuration
 *  - ouvrir la connexion à la base de données
 *  - afficher la réponse correspondant à la demande du client
 *  - déclarer notre model pour le rendre accessible dans l'application
 *  - déclarer nos controleurs pour les rendre accessible dans l'application
 */

/**
 * Notre répertoire base de l'application est désormais définis !
 */
$repertoire_base = realpath( dirname(__FILE__)."/.." )."/";

/**
 * Notre modèle est désormais déclaré et accessible !
 */
include($repertoire_base."model.php");

/**
 * Nos controler sont déclarés et accessible !
 */
include($repertoire_base."controler.php");

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
$configuration = include($repertoire_base."configuration.php");
/**
 * Nous attachons notre répertoire base à notre
 * configuration qui sera accessible à nos controler
 */
$configuration["repertoire_base"] = $repertoire_base;

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
 */

/**
 * Notre petit système de template pend place ici
 * Pour ce faire nous créons un fichier template.php
 * Qui se chargera d'inclure le fichier que nous lui indiquerons
 *
 * Par ailleurs nous allons ajouter à un système
 * de controler en effectuant des appels de fonctions
 *
 * Nos controler pourront prendre une de ces formes ci :
 *      [METHODE_HTTP]_[VUE_AFFICHEE]
 *
 * Ansi pour afficher la page d'accueil en GET, nous auront
 *  get_livre()
 *
 * Pour afficher notre formulaire d'écriture en GET, puis en POST
 *  get_ecriture()
 *  post_ecriture()
 *
 * Par ailleurs, l'utilisation de controler rends obsolete l'utilisation
 * du tableau de vue autorisées, en effet ce sont désormais les controler
 * définis qui sont les vues autorisées
 *
 */

// Lecture de la méthode HTTP
$methode_http = strtolower($_SERVER["REQUEST_METHOD"]);

/**
 * Lecture de la variable d'url vue
 * cf operateur ternaire
 * http://www.php.net/manual/fr/language.operators.comparison.php
 */
$vue = isset( $_GET["vue"] ) ? $_GET["vue"] : "livre";
$vue = strtolower($vue);

$controler = "get_index"; // Valeur par défaut, qui ne devrais pas apparaitre à l'utilisateur
if( function_exists($methode_http."_".$vue) ){    // déterminons l'existance de la fonction
    $controler = $methode_http."_".$vue;
}

/**
 * Nous allons maintenant appeler la fonction controler
 * que nous avons déterminé
 * pour cela nous utilisarons la fonction PHP call_user_func_array( $function_name, $function_parameters )
 */

call_user_func_array( $controler, array($configuration) );

/**
 * N'oublions pas de clore notre connexion SQL, même si cela est inutile
 */
mysql_close();


?>