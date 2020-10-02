<?php
$nombre = "Ana";
print("<p>Hola, $nombre</p>");
if (isset($argv[1])){
	print("<p> Adios, $argv[1]<p>");
}
print("\n Fin");
?>