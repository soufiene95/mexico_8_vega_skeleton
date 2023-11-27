<?php 

    /**
     *----------------------------------------------------
     *                      Bienvenue sur Véga
     *
     *L'index.php, le controleur fontal.
     *
     * Ses rôles:
     *      1-amorcer l'application (Charger les fichiers de configuration)
     *      2-créer une nouvelle instance du noyau de l'application
     *      3-récupérer les données de la requete du client
     *      4-demander au noyau de soumetter la requête du client pour traitement
     *      5-récupérer de la part du noyau, la réponse correspondante à la requête
     *      6-envoyer cette réponse au serveur
     *          *afin que le server l'envoi dans le navigateur du client
     *          *afin qu'elle soit affichée sur son écran
     * ---------------------------------------------------
     */ 


     //1-amorcer l'application (Charger les fichiers de configuration)
    require __DIR__ ."/../config/bootstrap.php";