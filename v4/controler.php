<?php

function get_index( $configuration ){
    echo "Une erreur est survenue, nous ne pouvons répondre à votre demande.";
}

/**
 * Fonction d'affichage de la page
 * de liste des messages du livre d'or
 *
 * @param $configuration
 * @return void
 */
function get_livre( $configuration ){

    $title          = "COMMENT CREER SON LIVRE D'OR";
    $reply_to       = "ludo@informaticien.com";
    $copyright      = "GIAMBIASI ludovic";
    $vue_a_afficher = "livre";

    include( $configuration["repertoire_base"] . "vues/template.php");
}

/**
 * fonction d'affichage du formulaire
 * de nouveaux messages
 *
 * @param $configuration
 * @return void
 */
function get_ecriture( $configuration ){

    $title          = "COMMENT CREER SON LIVRE D'OR";
    $reply_to       = "ludo@informaticien.com";
    $copyright      = "GIAMBIASI ludovic";
    $vue_a_afficher = "ecriture";
    
    include( $configuration["repertoire_base"] . "vues/template.php");

}

/**
 * Fonction de validation de chaque nouveau message
 * Nous définissons ici la logique de validation du formulaire
 * Nous affichons ensuite le résultat de l'enregistrement dans la vue ecriture_validation.php
 *
 * @param $configuration
 * @return void
 */
function post_ecriture( $configuration ){

    $title          = "COMMENT CREER SON LIVRE D'OR";
    $reply_to       = "ludo@informaticien.com";
    $copyright      = "GIAMBIASI ludovic";
    $vue_a_afficher = "ecriture_validation";



    $message_utilisateur        = "";
    $formulaire_est_en_erreur   = false;
    $formulaire_est_valide      = isset($_GET["test"])?$_GET["test"]:"KO";     // lecture de la variable d'url nommée : test
    if($formulaire_est_valide==="ok") {  // on regarde si la variable test = "ok"...
                                        // si l'on n'a pas envoyé le formulaire cette variable n'est pas égale à ok
                                        // dès que l'on a envoyé le formulaire, cette variable = ok donc
                                        // On enregistre le message dans la bd et on affiche
                                        // l'information comme quoi le message a bien été enregistré...

        $mess = isset($_POST["mess"])?$_POST["mess"]:"";    // Lecture de la variable de formulaire (POST) nommée : mess
        $expe = isset($_POST["expe"])?$_POST["expe"]:"";    // Lecture de la variable de formulaire (POST) nommée : expe

        $mess = trim($mess);        // on supprime les espaces blancs
        $mess = strip_tags($mess);  // on supprime les balises HTML
        if( $mess === "" ){
            $formulaire_est_en_erreur = true;
        }

        $expe = trim($expe);        // on supprime les espaces blancs
        $expe = strip_tags($expe);  // on supprime les balises HTML
        if( $expe === "" ){
            $formulaire_est_en_erreur = true;
        }

        if( $formulaire_est_en_erreur === false ){  // si aucune erreurs n'est détectée
                                                    // on procède à l'écriture dans la base de données
            $Date  = date("Y/m/d"); // on récupère la date à laquelle le message est posté
            $insertion_reussie = inserer_message( $mess, $expe, $Date );
            if( $insertion_reussie === false ){
                $message_utilisateur = "Un problème grave est survenu, nous ne pouvons enregistrer votre message.";
            }else{
                $message_utilisateur = "Votre message a &eacute;t&eacute; correctement enregistr&eacute;";
            }
        }else{
            $message_utilisateur = "Des erreurs sont survenues lors de la validation de votre message....";
        }
    }
    
    include( $configuration["repertoire_base"] . "vues/template.php");
}