<?php
namespace Quwius\Framework;

interface RequestHandlerFactory_Interface{
	public static function makeRequestHandler(string $request='default'):AbstractCommandPageController;
}
?>