<?php
namespace Quwius\Framework;
class FrontController extends AbstractFrontController{
   
    

    public static function run(){
	$instance = new FrontController();
	$instance->init();
	 $instance->handleRequest();
	}

   public function init(){
	//$this->reg->getApplicationHelper()->init();
	 }
    protected function handleRequest(){
			$context = new CommandContext();
			$get = $context->get('get');
			$request = $get['controller'];

			if(empty($request)){
				$request = "index";
			}
			$handler = RequestHandlerFactory :: makeRequestHandler($request);
			
			if($handler->execute($context)===false){
				//add error message
			}


	} 
}

?>
