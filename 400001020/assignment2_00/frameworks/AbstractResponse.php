<?php
namespace Quwius\Framework;
abstract class AbstractResponse{
	protected $data = [];

	public function showAllData(string $sep="<br>"): string{
		return implode($sep,$this->data);
	}

	abstract public function setEntries(array $entries): bool;
	abstract public function setEntry (int $i): string;
	abstract public function getEntries(int $start,int $end): string;
}
?>