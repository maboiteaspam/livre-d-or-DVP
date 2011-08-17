<?php
/**
 * Nous allons définir ici nos fonctions de lecture, écriture, mise à jour et suppressions
 * sur notre base de données
 * Ces quatres opérations sont communément appelées CRUD (Create Read Update Delete)
 */


/**
 * fonction de protections des paramètres
 * pour les requêtes SQL.
 *
 * @param $value
 * @return string
 */
function quote_smart($value){
    if(get_magic_quotes_gpc()){
        $value = stripslashes($value);
    }
    return mysql_real_escape_string($value);
}

/**
 * @return int
 */
function compter_les_messages(){
    $retour     = 0;                                // Contiendra le nombre de message de notre livre, par défaut à 0

    $sql        = "SELECT COUNT(*) FROM livre";     // pour connaître le nombre de messages présents dans le livre d'or.
    $query      = mysql_query($sql);                // exécution de la requête sur la base de données
    if( $query !== false ){                         // si la requête est exécutée correctement
        $resultats_sql  = mysql_fetch_array($query);// lecture des résultats
        $retour         = $resultats_sql[0];
    }
    return $retour;
}

/**
 * @return array
 */
function lire_les_messages(){
    $retour = array();                                          // contiendra les messages et leurs informations,
                                                                // par défaut c'est un tableau vide

    $sql    = "SELECT * FROM livre ORDER BY `date` DESC";       // voici la requete permettant de lire les messages...
                                                                // triès par date de création décroissant
    $query  = mysql_query($sql);                                // exécution de la requête sur la base de données
    if( $query !== false ){                                     // si la requête est exécutée correctement
        while($ligne_de_resultats = mysql_fetch_array($sql)){   // lecture des résultats
            $retour[] = $ligne_de_resultats;
        }
    }
    return $retour;
}

/**
 * Cete fonction nous sert uniquement à
 * reformater la valeur date pour chaque lignes
 *
 * Nous le mettons dans une fonction spécifique et séparée
 * car le traitement de date n'est utilisé que sur la home,
 * nous pourrions fort bien ré utiliser
 * notre précédente fonction à d'autres fins.
 *
 * A noter qu'il y à miriade de méthode disponible pour réaliser
 * cette tâche. Pour le moment nous nous contenterons de celle-ci
 * avec ces défauts et ces avantages.
 *
 * @return array
 */
function lire_les_messages_home(){
    $retour = lire_les_messages(); // Lecture des messages

    foreach( $retour as $index=>$message ){
        list($a,$m,$j) = explode("-", $message["date"]);    // gestion de la date : voir le tutoriel
        $date = "$j-$m-$a";                                 // "gestion date" pour comprendre...
        $retour[ $index ]["date"] = $date;                  // on ré assigne à nos éléments la date formatée
    }
    return $retour;
}

/**
 * @param $message
 * @param $expediteur
 * @param $date
 * @return bool
 */
function inserer_message( $message, $expediteur, $date ){
    $retour     = false;                                // Retourne l'état d'execution de la requete
    $message    = quote_smart($message);                // Protections des entrées utilisateurs
    $expediteur = quote_smart($expediteur);             // Protections des entrées utilisateurs
    $date       = quote_smart($date);                   // Protections des entrées utilisateurs
    $sql = "INSERT INTO `livre`
            (`codelivre`, `message`, `expediteur`, `date`)
            VALUES
            ('', '".$message."','".$expediteur."', '".$date."')
            ";                                          // Requete SQL d'insertion
    $query = mysql_query($sql);                         // exécution del a requête sur la base de données

    $retour = $query;                                   // On assigne le résultat d'execution à notre variable de retour

    return $retour;
}