<?php
require 'IsValid.php';

$stringBrackets = $_GET['stringBrackets'];

$isValid = new IsValid();

try{
	$isValid->isBracketsBalanced($stringBrackets);
}catch(Exception $e){
	print_r($e);
}