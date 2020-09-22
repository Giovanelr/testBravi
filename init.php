<?php
require 'IsValid.php';

$stringBrackets = $_GET['stringBrackets'];

$isValid = new IsValid();
$message = "Brackets aren't balanced";

try{
	if($isValid->isBracketsBalanced($stringBrackets)){
		$message = "Brackets are balanced";
	}
}catch(Exception $e){
	echo "<pre>";
	print_r($e);
	echo "</pre>";
}

echo $message;