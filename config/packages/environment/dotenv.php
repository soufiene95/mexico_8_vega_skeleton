<?php 

use Symfony\Component\Dotenv\Dotenv;

    $dotenv = new Dotenv();

// loads .env, .env.local
$dotenv->loadEnv(__DIR__.'/../../../.env');
//$data = $dotenv->loadEnv(dirname(__DIR__,3).'/.env'); autre façon de faire un chemin

