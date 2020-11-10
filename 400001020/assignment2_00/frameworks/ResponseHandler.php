<?php
namespace Quwius\Framework;
class ResponseHandler implements ResponseHandlerInterface{
	
	protected $body = [];

	public function __construct(ResponseHeader $header, ResponseState $state, ResponseLogger $logger){
		$this->body['header']= $header;
		$this->body['state']= $state;
		$this->body['logger'] = $logger;
	}

	public function getHeader(): ResoponseHeader{
		return clone $this->body['header'];
	}

	public function getSystemState() : ResponseState{
		return clone $this->body['state'];
	}

	public function getLogger(): ResponseLogger {
		return clone $this->bosy['logger'];
	}
}