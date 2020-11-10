<?php
namespace Quwius\Framework;
class RequestHandlerFactory implements RequestHandlerFactory_Interface{
	public static function makeRequestHandler(string $request = 'index'): AbstractCommandPageController{
		if (preg_match('/\W/', $request)) {
			throw new Exception("illegal characters in action");
		}
		$class = "Apps\\handlers\\" . UCFirst(strtolower($request)) . "Controller";
		if (! class_exists($class)) {
			throw new CommandNotFoundException("no '$class' class located");
		}
		$cmd = new $class(); // the receiver can go here
		return $cmd;
}
}
?>