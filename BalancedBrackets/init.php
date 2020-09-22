<?php
require 'IsValid.php';

$stringBrackets = $_GET['stringBrackets'];

$isValid = new IsValid();
$message = "Brackets aren't balanced";

try{
	if($isValid->isBracketsBalanced($stringBrackets)){
		$message = "Brackets are balanced";
	}
	echo $message;
}catch(Exception $e){
	print_r($e->getMessage());
}