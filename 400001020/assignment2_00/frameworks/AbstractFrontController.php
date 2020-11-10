<?php
namespace Quwius\Framework;

	abstract class AbstractFrontController{
		protected $request = null;

		abstract public static function run();
		abstract public function init();
		abstract protected function handleRequest();
	}
?>