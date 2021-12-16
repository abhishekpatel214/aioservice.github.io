<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
   ->withServiceAccount('aioservice-4f4ad-firebase-adminsdk-yjou6-aae53664f4.json')
   ->withDatabaseUri('https://aioservice-4f4ad-default-rtdb.firebaseio.com/');

   $database = $factory->createDatabase();
?>