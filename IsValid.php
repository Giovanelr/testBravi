<?php
/*
*
* @author Giovane <giovanelr@gmail.com>
*/

class IsValid{

	private $arrayBrackets = array();

	public function isBracketsBalanced($stringBrackets)
	{
		if (!$stringBrackets) {
			throw new Exception("Var stringBrackets is empty");
		}

		for($iB = 0; $iB < strlen($stringBrackets); $iB++){
			$this->isBracket()
			$this->arrayBrackets[] = $stringBrackets[$iB];
			echo"<br>Item:" . $stringBrackets[$iB];
			$this->itsCloseItemBefore($stringBrackets[$iB]);
			echo"<br>arrayBrackets";
			print_r($this->arrayBrackets);
		}

		if (empty($this->arrayBrackets)) {
			return true;
		}
		return false;
	}

	private function itsCloseItemBefore($bracket)
	{
		$removeItem = false;

		$keyItemBefore = count($this->arrayBrackets) - 2;
		// echo"<br>KeyItemBefore:" . $keyItemBefore;
		if (isset($this->arrayBrackets[$keyItemBefore])) {
			$itemBefore = $this->arrayBrackets[$keyItemBefore];
			echo"<br>ItemBefore:" . $itemBefore;

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
		unset($this->arrayBrackets[$keyItemRemove + 1]);
		unset($this->arrayBrackets[$keyItemRemove]);
		echo"<br>Remove o Item";
		$this->arrayBrackets = array_filter($this->arrayBrackets);
		$this->arrayBrackets = array_values($this->arrayBrackets);
	}
}