<?php
namespace Quwius\Framework;
class ResponseHeader extends AbstractResponse{
	
	public function setEntries(array $entires): bool{
		
		return false;

	}
	
	public function setEntry (int $start, int $end): string{

		return '';
	}

	public function getEntry(int $i): string {

		return '';
	}
}
?>