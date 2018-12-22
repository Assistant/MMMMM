<?php

$serverID = $_POST['serverID'];
$root = "/";

shell_exec ( "./mmmmm --stop $serverID");
header( "Location: $root" );
?>