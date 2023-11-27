<?php 

    /**
     * ------------------------------------------------------------
     *                  Amorceur de l'application
     * 
     * ses rôles:
     * 
     *      1- charger l'autoloader de composer
     *      2- charger les variables d'environement
     *      3- charger un conteneur de services
     *      4- charger le logueur
     *      5- charger le débogueur
     *---------------------------------------------------------------
     */

    // 1- charger l'autoloader de composer (psr-4)
    require __DIR__ ."/../vendor/autoload.php";

    // 2- charger les variables d'environement
    require __DIR__ ."/packages/environment/dotenv.php";

    // 3- charger un conteneur de services
    $container = require __DIR__ ."/packages/di/container.php";

    // 4- charger le logueur
    require __DIR__ ."/packages/logger/monolog.php";
