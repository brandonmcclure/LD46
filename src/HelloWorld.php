<?php
if ($argc !== 2){
	echo "Usage: php HelloWorld.php <name>.\n";
	exit(1);
}

$name = $argv[1];
echo "Hello, $name\n";