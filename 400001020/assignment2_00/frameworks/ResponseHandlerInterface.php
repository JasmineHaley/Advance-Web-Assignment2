<?php
namespace Quwius\Framework;
interface ResponseHandlerInterface{
	public function getHeader(): ResponseHeader;
	public function getSystemState(): ResponseState;
	public function getLogger(): getLogger;
}
?>