<?php
/*
*
* @author Giovane <giovanelr@gmail.com>
*/

class IsValid{

	private $arrayOfBrackets = array("{","}","[","]","(",")");
	private $bracketsBalanced = array();

	public function isBracketsBalanced($stringBrackets)
	{
		if (!$stringBrackets) {
			throw new Exception("Var stringBrackets is empty");
		}

		for($iB = 0; $iB < strlen($stringBrackets); $iB++){
			if ($this->isBracket($stringBrackets[$iB])) {
				$this->bracketsBalanced[] = $stringBrackets[$iB];
				$this->itsCloseItemBefore($stringBrackets[$iB]);
			}
		}

		if (empty($this->bracketsBalanced)) {
			return true;
		}
		return false;
	}

	private function isBracket($bracket)
	{
		if (!in_array($bracket, $this->arrayOfBrackets)) {
			throw new Exception("Char isn't a bracket");
		}

		return true;
	}

	private function itsCloseItemBefore($bracket)
	{
		$removeItem = false;

		$keyItemBefore = count($this->bracketsBalanced) - 2;

		if (isset($this->bracketsBalanced[$keyItemBefore])) {
			$itemBefore = $this->bracketsBalanced[$keyItemBefore];

			switch ($bracket) {
				case '}':
					if($itemBefore == "{"){
						$removeItem = true;
					}
					break;
				case ')':
					if($itemBefore == "("){
						$removeItem = true;
					}
					break;
				case ']':
					if($itemBefore == "["){
						$removeItem = true;
					}
					break;
			}

			if ($removeItem) {
				$this->removeItem($keyItemBefore);
			}
		}
	}

	private function removeItem($keyItemRemove)
	{
		unset($this->bracketsBalanced[$keyItemRemove + 1]);
		unset($this->bracketsBalanced[$keyItemRemove]);

		$this->bracketsBalanced = array_filter($this->bracketsBalanced);
		$this->bracketsBalanced = array_values($this->bracketsBalanced);
	}
}