<?php

$connection = mysqli_connect("localhost",'root','','aioservice');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}


?>