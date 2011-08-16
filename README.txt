Quelques constats de la version 1 proposé par DVP :
1# le tutorial ne présente aucun fichier d'index
2# Les fichiers sont tous encodés en iso-8859-1
    http://j-willette.developpez.com/tutoriels/web/encoder-son-site-en-utf8/
3# le fichier de connexion utilise les supresseurs d'erreurs (@)
    cf http://php.developpez.com/faq/langage/index.php?page=erreurs#erreur-arobase
    http://php.developpez.com/faq/langage/index.php?page=erreurs#divers_cachererreurs
    http://php.developpez.com/faq/langage/index.php?page=erreurs#erreurs_gestionsimple
4# le fichier de connexion mélange configuration et exécution (note personnelle)
5# le fichier livre.php utilise une syntaxe HTML dépassée (note personnelle, le forum est destinée au professionnel,
        au delà de l'attractivité du HTML pour les néophytes et son désir de rester accessible à ceux ci,
        le script devrait promouvoir la professionnalisation de ces métiers, at least, des bonnes pratiques)
6# le fichier livre.php n'utilise aucune feuille de style
7# le fichier livre.php mélange l'accès aux données avec le rendu du contenu
8# le fichier ecriture.php utilise un javascript comme seul validateur de l'entrée utilisateur  (note personnelle,
    très peu d'informations sur ce sujet trouvé dans le site DVP)
9# le fichier écriture.php ne propose aucune protection contre les injections SQL
    http://php.developpez.com/faq/sgbd/?page=mysql#mysql-escape
    https://www.owasp.org/index.php/Top_10_2010-Injection
10# l'application n'est pas DRY (cf http://bruno-orsier.developpez.com/principes/dry/)
11# l'application ne présente aucune pratique de séparation des roles (Sans arriver à un modèle pur mvc,
    il est possible de faire mieux, tout en restant simple et concret)
    http://julien-pauli.developpez.com/tutoriels/php/mvc-controleur/

Partant de ces constats, je me tentes à corriger tout ou partie de ces défauts.
J'essaierais par la même occasion de rester aussi didactique que l'auteur original, en apportant
des précisions et des explications sur mes choix.

A cette fin je proposerais plusieurs itérations du travail accompli, chaque itération aura trait à un ou plusieurs
changements.


ITTERATION 1, aka V2
- correction du point #1, #2, #3, #4
- début de correction du point #10, #11

Un fichier index.php, pourquoi faire ?
    Pour proposer un point d'entrée de l'application.
    Pour proposer un point d'entrée par défaut à l'application, qui veut que par convention
    lors de l'appel à une url non qualififée, généralement, le fichier nommé index.php soit celui utilisée
    Pour aller plus loin nous commecnrons à assécher l'application de ces redondances en utilisant ce fichier comme
    frontcontroller.

Un fichier de configuration, pourquoi faire ?
    Pour rendre l'application plus lisible à un intervenant externe.
    Pour dissocier clairement l'execution de la configuration (note personnelle, c'est vague, et très subjectif),
    c'est une bonne pratique.

Des fichiers encodés en iso-8859-1, pourquoi est ce mal ?
    Ce n'est pas mal ! Mais c'est un choix qui peut mener à bien des problèmes sur les applications internet.
    Ce codage gère très peu de caractère, et ce choix est un frein à l'internationalisation de vos projets.
    Par ailleurs, utilisé un codage utf-8 ne requiert rien de plus qu'une configuraton adéquat de votre éditeur.
    Il n'y à pas de frein particulier à cette bonne pratique.

La suppression d'erreur, pourquoi est ce mal ?
    C'est lent, c'est un fait, c'est ainsi qu'est construit php.
    C'est un cache misère, toute erreure générée par votre application est corrigeable, et doit être corrigée.
    C'est un cache misère, il empeche l'enregistrement des erreurs, et donc leurs corrections.

A quoi ça sert DRY ?
    C'est un principe qui promet la simplification des mises à jour d'une application.
    Cependant, pour sentir sa puissance, il faut avoir forger quelques applications FAT, ou avoir eu à les manipuler.


ITTERATION 2, aka V3
- correction du point #7, #8, #9
- suite de correction du point #10, #11



ITTERATION 3, aka V4
- correction du point #5, #6
- suite de correction du point #10, #11





