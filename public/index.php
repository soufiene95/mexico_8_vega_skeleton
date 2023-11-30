<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

/**
 *---------------------------------------------------------------------------------
 *                      Bienvenue sur Véga
 *
 *L'index.php, le controleur frontal.
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
 * -------------------------------------------------------------------------------
 */

// use Psr\Log\LoggerInterface;

//1-amorcer l'application (Charger les fichiers de configuration)
require __DIR__ . "/../config/bootstrap.php"; // dump($container->get(LoggerInterface::class));
// var_dump($container); = dump($container); ou dd($container); nouvel fason d'écrire car package installé avec "composer require symfony/var-dumper"

// 2-créer une nouvelle instance du noyau de l'application
$kernel = new Kernel($container);

// 3-récupérer les données de la requete du client
$request = Request::createFromGlobals();


// 4-demander au noyau de soumetter la requête du client pour traitement
// 5-récupérer de la part du noyau, la réponse correspondante à la requête
$response = $kernel->handle($request);


// 6-envoyer cette réponse au serveur

// si la réponse du client n'est pas faite via le terminal,
if (php_sapi_name() != "cli")
{
     // envoyons-lui la réponse.
     $response->send();
}
