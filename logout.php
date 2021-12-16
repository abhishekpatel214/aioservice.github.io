<?php
include('db.php');

//$database->get
$reference = $database->getReference('customer');
echo $reference->getValue();
?>